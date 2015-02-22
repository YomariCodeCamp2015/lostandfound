<?php
class Controller_User_Property extends Controller_Sitebase {
	protected $property_id;

	public function action_index() {
		$data['properties']=Model_Property::find('all');
		$this->template->title="Properties";
		$this->template->content=View::forge('property/index',$data);
	}

	public function action_preview($id=null) {
		is_null($id) and Response::redirect('property');

//		var_dump(Model_Property::get_property_by_id($id));
//		exit;
		
		if(!$data['property']=Model_Property::get_property_by_id($id)){
			Session::set_flash('error','Could not find property #'.$id);
			Response::redirect('property');
		}

		$this->property_id=$id;

		//set in session the current_product;
		Session::set('current_property',$this->property_id);

		$data['property_img']='';
		$path='uploads/users/user_'.$this->current_user->id.'/property/property_'.$this->property_id.'/';
//		var_dump($path);
//		exit;

		$upload_path=DOCROOT.$path;
		$imagefile=Utils_Readfile::getFiles($path);

		if($imagefile){
			$data['property_img']=$imagefile;
		}


		$this->template->title="Property";
		$this->template->content=View::forge('property/view',$data);
	}

	public function action_create() {
		$user_id = $this->current_user->id;			
		$val=Validation::forge();
		if(Input::method()=='POST'){
			$val=Model_Property::validate('create');

			if($val->run()){
				$property=Model_Property::forge(array(
					'user_id'=>$user_id,
					'name'=>Input::post('name'),
					'price'=>Input::post('price'),
					'description'=>Input::post('description'),
					'beds'=>Input::post('beds'),
					'baths'=>Input::post('baths'),
					'type'=>Input::post('type'),
					'location'=>Input::post('location'),
					'maplat'=>Input::post('maplat'),
					'matlon'=>Input::post('matlon'),
					'propertyno'=>Input::post('propertyno'),
					'area'=>Input::post('area'),
					'purpose'=>Input::post('purpose'),
					'view'=>Input::post('view'),
					'status'=>1,
					'package'=>Input::post('package'),
				));

//				var_dump($property);
//				exit;
//				
				if($property and $property->save()){
					
//					var_dump('user/property/preview/'.$property->id);
//					exit;
					
					Session::set_flash('success','Added property #'.$property->id.'.');
					Response::redirect('user/property/preview/'.$property->id);
				}else{
					Session::set_flash('error','Could not save property.');
					var_dump("error foound");
					exit;
				}
			}else{
				var_dump($val->error_message());
				exit;
				Session::set_flash('error',$val->error());
			}
		}

		$data['val']=$val;
		$data['purposes']=Model_Purpose::query()->select('id','name')->get();
		$this->template->title="Properties";
		$this->template->content=View::forge('property/create',$data,false);
	}
	
	public function post_properycreate() {
		$user_id = $this->current_user->id;			
		$val=Validation::forge();
		if(Input::method()=='POST'){
			$val=Model_Property::validate('create');

			if($val->run()){
				$property=Model_Property::forge(array(
					'user_id'=>$user_id,
					'name'=>Input::post('name'),
					'price'=>Input::post('price'),
					'description'=>Input::post('description'),
					'beds'=>Input::post('beds'),
					'baths'=>Input::post('baths'),
					'type'=>Input::post('type'),
					'location'=>Input::post('location'),
					'maplat'=>Input::post('maplat'),
					'matlon'=>Input::post('matlon'),
					'propertyno'=>Input::post('propertyno'),
					'area'=>Input::post('area'),
					'purpose'=>Input::post('purpose'),
					'view'=>Input::post('view'),
					'status'=>1,
					'package'=>Input::post('package'),
				));

//				var_dump($property);
//				exit;
//				
				if($property and $property->save()){
					
//					var_dump('user/property/preview/'.$property->id);
//					exit;
					return $this->response(array(
			'success'=>1),200);
					
					Session::set_flash('success','Added property #'.$property->id.'.');
					Response::redirect('user/property/preview/'.$property->id);
				}else{
					Session::set_flash('error','Could not save property.');
					
					return $this->response(array(
			'success'=>0,'message'=>$val->error_message()),200);
					
					var_dump("error foound");
					exit;
				}
			}else{
				
				return $this->response(array(
			'success'=>0,'message'=>$val->error_message()),200);
				var_dump($val->error_message());
				exit;
				Session::set_flash('error',$val->error());
			}
		}

	}

	public function action_edit($id=null) {
		is_null($id) and Response::redirect('property');

		if(!$property=Model_Property::find($id)){
			Session::set_flash('error','Could not find property #'.$id);
			Response::redirect('user/dashboard');
		}

		$val=Model_Property::validate('edit');

		if($val->run()){
			$property->name=Input::post('name');
			$property->price=Input::post('price');
			$property->description=Input::post('description');
			$property->beds=Input::post('beds');
			$property->baths=Input::post('baths');
			$property->type=Input::post('type');
			$property->location=Input::post('location');
			$property->maplat=Input::post('maplat');
			$property->matlon=Input::post('matlon');
			$property->propertyno=Input::post('propertyno');
			$property->area=Input::post('area');
			$property->purpose=Input::post('purpose');
			$property->view=Input::post('view');
			$property->status=Input::post('status');
			$property->package=Input::post('package');

			if($property->save()){
				Session::set_flash('success','Updated property #'.$id);

				Response::redirect('property');
			}else{
				Session::set_flash('error','Could not update property #'.$id);
			}
		}else{
			if(Input::method()=='POST'){
				$property->name=$val->validated('name');
				$property->price=$val->validated('price');
				$property->description=$val->validated('description');
				$property->beds=$val->validated('beds');
				$property->baths=$val->validated('baths');
				$property->type=$val->validated('type');
				$property->location=$val->validated('location');
				$property->maplat=$val->validated('maplat');
				$property->matlon=$val->validated('matlon');
				$property->propertyno=$val->validated('propertyno');
				$property->area=$val->validated('area');
				$property->purpose=$val->validated('purpose');
				$property->view=$val->validated('view');
				$property->status=$val->validated('status');
				$property->package=$val->validated('package');

				Session::set_flash('error',$val->error());
			}

			$this->template->set_global('property',$property,false);
		}

		$data['purposes']=Model_Purpose::query()->select('id','name')->get();
		$this->template->title="Properties";
		$this->template->content=View::forge('property/edit',$data);
	}

	public function action_delete($id=null) {
		is_null($id) and Response::redirect('property');

		if($property=Model_Property::find($id)){
			$property->delete();

			Session::set_flash('success','Deleted property #'.$id);
		}else{
			Session::set_flash('error','Could not delete property #'.$id);
		}

		Response::redirect('property');
	}

	public function action_postPropertyImage() {
//		var_dump($_FILES["profile-img"]);
//		exit;

		$current_property=Session::get('current_property');

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
			$path='uploads/users/user_'.$this->current_user->id.'/property/property_'.$current_property.'/';
			$upload_path=DOCROOT.$path;
			$imagefile=Utils_Readfile::getFile($path);

//			if($imagefile){
//				File::delete(DOCROOT.'/'.$imagefile);
//			}

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
}
