<?php
class Controller_User_Dashboard extends Controller_Sitebase {

	public function action_index() {
		$this->template->title='Dashboard';

		$user_info=$this->current_user;
		//$data['user_info']=$this->current_user;

		$data['user_profile_img']='';
		$path='uploads/users/user_'.$this->current_user->id.'/profile/';
		$upload_path=DOCROOT.$path;
		$imagefile=Utils_Readfile::getFile($path);

		if($imagefile){
			$data['user_profile_img']=$imagefile;
		}

		$data['user_profile']=Model_Profile::get_profile($user_info->id);
		//$data['property_counts']=Model_Property::get_property_counts($user_info->id);
		$data['properties']=Model_Property::get_property_list($user_info->id);
//		
//		var_dump($data['properties']);
//		exit;

		$this->template->content=View::forge('user/dashboard',$data);
	}
	
		public function get_userdashboard() {
		$this->template->title='Dashboard';

		$user_info=$this->current_user;
		//$data['user_info']=$this->current_user;

		$data['user_profile_img']='';
		$path='uploads/users/user_'.$this->current_user->id.'/profile/';
		$upload_path=DOCROOT.$path;
		$imagefile=Utils_Readfile::getFile($path);

		if($imagefile){
			$data['user_profile_img']=$imagefile;
		}

		$data['user_profile']=Model_Profile::get_profile($user_info->id);
		//$data['property_counts']=Model_Property::get_property_counts($user_info->id);
		$data['properties']=Model_Property::get_property_list($user_info->id);
//		
//		var_dump($data['properties']);
//		exit;

		return $this->response(array(
			'data'=>$data),200);
	}

	
	public function action_postProfileImage() {
//		var_dump($_FILES["profile-img"]);
//		exit;


		$config=array(
			//'path' => DOCROOT . 'uploads/trainee/trainee_' . $this->current_user->id . '/advert_' . $advert,
			'randomize'=>true,
			'ext_whitelist'=>array('jpg','jpeg','gif','png'),
			'auto_rename'=>false,
			'overwrite'=>false,
		);

		Upload::process($config);

		if(!Upload::is_valid()){
			if($_FILES["profile-img"]['name']!=""){
				$error="";
				foreach(Upload::get_errors() as $file){
					$error="<ul><li>".$file ["errors"][0]["message"]."</li></ul>";
				}
				$response=array(
					'success'=>false,
					'error'=>$error,
				);
				$data['response']=json_encode($response);
				return Response::forge($data);
				exit;
			}
		}else{
			$path='uploads/users/user_'.$this->current_user->id.'/profile/';
			$upload_path=DOCROOT.$path;
			$imagefile=Utils_Readfile::getFile($path);

			if($imagefile){
				File::delete(DOCROOT.'/'.$imagefile);
			}

			$uploadpath=DOCROOT.$path;
			Upload::save($upload_path);

			//$html=View::forge('content/trainee/profile',array('trainee'=>$fitner))->render();
			$response=array(
				'success'=>true,
			);
			return Response::forge(json_encode($response));
			exit;
		}
	}

	public function action_profileEdit() {
		$id=$this->current_user->id;

		if(!$fitner=Model_Profile::find_by_user_id($id)){
			Session::set_flash('error','Could not find fitner #'.$id);
			Response::redirect('fitner');
		}

		$val=Model_Profile::validate('edit');

		if($val->run()){
			$fitner->firstname=Input::post('firstname');
			$fitner->lastname=Input::post('lastname');
			$fitner->address=Input::post('address');
			$fitner->phone=Input::post('phone');

			if($fitner->save()){
				Session::set_flash('success','Updated fitner #'.$id);
				return Response::forge(json_encode(array('success'=>true)));
			}else{
				Session::set_flash('error','Could not update fitner #'.$id);
			}
		}else{
						
			if(Input::method()=='POST'){
				$fitner->firstname=$val->validated('firstname');
				$fitner->lastname=$val->validated('lastname');
				$fitner->address=$val->validated('address');
				$fitner->phone=$val->validated('phone');
				Session::set_flash('error',$val->error());
			}

			$this->template->set_global('fitner',$fitner,false);
		}

		return Response::forge(View::forge('user/profile_edit'));
	}
}
