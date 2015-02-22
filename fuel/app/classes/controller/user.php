<?php
class Controller_User extends \Fuel\Core\Controller_Hybrid {

	public function action_register() {
		Auth::check() and Response::redirect('user/dashboard');
		$login_val=$val=\Fuel\Core\Validation::forge();

		if(\Input::method()=='POST'){
			// validate the input
			$val=Model_User::register_validate('create');

			// if validated, create the user
			if($val->run()){
				try{
					// call Auth to create this user
					$created=\Auth::create_user(Input::post('email'),Input::post('password'),Input::post('email'),1);
					// if a user was created succesfully
					if($created){

						$user=Model_User::find($created);
						$user->status=1;
						$registration_hash=$user->reg_hash=hash('md5',time());
						if($user->save()){

							$userProfile=Model_Profile::forge(array(
								'user_id'=>$created,
								'firstname'=>Input::post('firstname'),
								'lastname'=>Input::post('lastname'),
								'address'=>Input::post('address'),
								'phone'=>Input::post('phone'),
							));

							if($userProfile->save()){

								//Email Templating page section.
								//Utils_Mailer::email_trigger('register',Input::post('email'),array('firstname'=>Input::post('firstname'),'lastname'=>Input::post('lastname')),$registration_hash);

								Response::redirect('user/success_regration');

								// inform the user
//								Session::set_flash('success',"Created user sucessfully.");
//								// and go back to the previous page, or show the
//								// application dashboard if we don't have any
//								\Response::redirect_back('user/dashboard');
							}
						};
					}else{
						// oops, creating a new user failed?
						Session::set_flash('success',"Failed creating user.");
					}
				}

				// catch exceptions from the create_user() call
				catch(\SimpleUserUpdateException $e){
					// duplicate email address
					if($e->getCode()==2){
						Session::set_flash('error','Email address already exists.');
						//\Messages::error(__('login.email-already-exists'));
					}

					// duplicate username
//					elseif($e->getCode()==3){
//						\Messages::error(__('login.username-already-exists'));
//					}
					// this can't happen, but you'll never know...
					else{
						Session::set_flash('error',$e->getMessage());
						//\Messages::error($e->getMessage());
					}
				}
			}else{
				// validation failed, repopulate the form from the posted data
				Session::set_flash('error',$val->error());
			}
		}

//		var_dump($val);
//		exit;
		// pass the fieldset to the form, and display the new user registration view
		$this->template->title='User &raquo; Register';
		$this->template->content=View::forge('user/register',array('val'=>$val,'login_val'=>$login_val),false);
	}

	public function post_userregister() {
		$login_val=$val=\Fuel\Core\Validation::forge();

		if(\Input::method()=='POST'){
			// validate the input
			$val=Model_User::register_validate('create');

			// if validated, create the user
			if($val->run()){
				try{
					// call Auth to create this user
					$created=\Auth::create_user(Input::post('email'),Input::post('password'),Input::post('email'),1);
					// if a user was created succesfully
					if($created){

						$user=Model_User::find($created);
						$user->status=1;
						$registration_hash=$user->reg_hash=hash('md5',time());
						if($user->save()){

							$userProfile=Model_Profile::forge(array(
								'user_id'=>$created,
								'firstname'=>Input::post('firstname'),
								'lastname'=>Input::post('lastname'),
								'address'=>Input::post('address'),
								'phone'=>Input::post('phone'),
							));

							if($userProfile->save()){

								//Email Templating page section.
								//Utils_Mailer::email_trigger('register',Input::post('email'),array('firstname'=>Input::post('firstname'),'lastname'=>Input::post('lastname')),$registration_hash);

								return $this->response(array('success'=>1,'profile'=>$userProfile),200);

								
								//Response::redirect('user/success_regration');
								// inform the user
//								Session::set_flash('success',"Created user sucessfully.");
//								// and go back to the previous page, or show the
//								// application dashboard if we don't have any
//								\Response::redirect_back('user/dashboard');
							}
						};
					}else{
						// oops, creating a new user failed?
						Session::set_flash('success',"Failed creating user.");
					}
				}

				// catch exceptions from the create_user() call
				catch(\SimpleUserUpdateException $e){
					// duplicate email address
					if($e->getCode()==2){
						Session::set_flash('error','Email address already exists.');
						return $this->response(array('success'=>0,'error'=>'Email address already exists'),200);
						//\Messages::error(__('login.email-already-exists'));
					}

					// duplicate username
//					elseif($e->getCode()==3){
//						\Messages::error(__('login.username-already-exists'));
//					}
					// this can't happen, but you'll never know...
					else{
						Session::set_flash('error',$e->getMessage());
						return $this->response(array('success'=>0,'error'=>$e->getMessage()),200);
						//\Messages::error($e->getMessage());
					}
				}
			}else{
				// validation failed, repopulate the form from the posted data
				Session::set_flash('error',$val->error());
				return $this->response(array('success'=>0,'error'=>'validation error'),200);
			}
		}
	}

	public function action_login() {
		Auth::check() and Response::redirect('user/dashboard');
		$login_val=$val=\Fuel\Core\Validation::forge();

		if(Input::method()=='POST'){
			$val->add('login_email','Email or Username')
			->add_rule('required');
			$val->add('login_password','Password')
			->add_rule('required');

			if($val->run()){
				$auth=Auth::instance();

				// check the credentials. This assumes that you have the previous table created
				if(Auth::check()or$auth->login(Input::post('login_email'),Input::post('login_password'))){
					$user_info=$auth->get_user_id();

					//check for the status of the user.
					$user=Model_User::find($user_info[1]);
					if($user->status==1){

						// credentials ok, go right in
						if(Config::get('auth.driver','Simpleauth')=='Ormauth'){
							$current_user=Model\Auth_User::find_by_username(Auth::get_screen_name());
						}else{
							$current_user=Model_User::find_by_username(Auth::get_screen_name());
						}
						Session::set_flash('success',e('Welcome, '.$current_user->username));
						Response::redirect('user/dashboard');
					}else{
						$auth->logout();
						$this->template->set_global('login_error','Non active user.');
					}
				}else{
					$this->template->set_global('login_error','Username or password error.');
				}
			}
		}



		$this->template->title='User &raquo; Login';
		$this->template->content=View::forge('user/register',array('val'=>$val,'login_val'=>$login_val),false);
	}

	public function get_userlogin() {
		$login_val=$val=\Fuel\Core\Validation::forge();
		if(Input::method()=='POST'){
			$val->add('login_email','Email or Username')
			->add_rule('required');
			$val->add('login_password','Password')
			->add_rule('required');

			if($val->run()){
				$auth=Auth::instance();

				// check the credentials. This assumes that you have the previous table created
				if(Auth::check()or$auth->login(Input::post('login_email'),Input::post('login_password'))){
					$user_info=$auth->get_user_id();

					//check for the status of the user.
					$user=Model_User::find($user_info[1]);
					if($user->status==1){

						// credentials ok, go right in
						if(Config::get('auth.driver','Simpleauth')=='Ormauth'){
							$current_user=Model\Auth_User::find_by_username(Auth::get_screen_name());
						}else{
							$current_user=Model_User::find_by_username(Auth::get_screen_name());
						}
						Session::set_flash('success',e('Welcome, '.$current_user->username));

						return $this->response(array('success'=>1,
							'profile'=>$user),200);
						//Response::redirect('user/dashboard');
					}else{
						$auth->logout();

						return $this->response(array('success'=>0,'error'=>'non active user'),200);
					}
				}else{
					return $this->response(array('success'=>0,'error'=>'username or password error'),200);
					//$this->template->set_global('login_error','Username or password error.');
				}

				return $this->response(array('success'=>0,'error'=>'validation error'),200);
			}
		}
		
		return $this->response(array('success'=>0,'error'=>'validation error'),200);
		
	}

	public function action_logout() {
		// remove the remember-me cookie, we logged-out on purpose
		//\Auth::dont_remember_me();
		// logout
		\Auth::logout();

		// inform the user the logout was successful
		//\Messages::success(__('login.logged-out'));
		// and go back to where you came from (or the application
		// homepage if no previous page can be determined)
		\Response::redirect();
//
//		$data["subnav"]=array('logout'=>'active');
//		$this->template->title='User &raquo; Logout';
//		$this->template->content=View::forge('user/logout',$data);
	}

	public function get_userlogout() {
		\Auth::logout();
		return $this->response(array('success'=>1),200);
	}

//	public function action_dashboard() {
//		$this->template->title='Dashboard';
//		$this->template->content=View::forge('user/dashboard');
//	}

	public function action_success_regration() {
		$this->template->title='Registration Success';
		$this->template->content=View::forge('user/register_success');
	}

	public function action_register_verification($verification_code) {
		$user=Model_User::query()->where('reg_hash',$verification_code)->get_one();
		if($user){
			$user->status=1;
			$user->reg_hash='';
			if($user->save()){
				$this->template->title="Verification";
				$this->template->content=View::forge('user/register_success');
			}else{
				var_dump("code error");
				exit;
				$this->template->title="Verification";
				$this->template->content=View::forge('user/register_success');
			}
		}else{
			var_dump("code error");
			exit;
//			$this->template->title="Verification";
//			$this->template->content=View::forge('user/register_success');
		}
	}
}
