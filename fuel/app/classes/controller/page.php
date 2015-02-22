<?php
class Controller_Page extends Controller_Sitebase {

	public function action_index() {
		$this->template->title='Lost & Found';
		$data['lost_properties']=Model_Property::get_lost_properties();
		$data['found_properties']=Model_Property::get_found_properties();
		$this->template->content=View::forge('pages/home',$data);
	}

	public function get_page() {

//		$this->template->title='Lost & Found';
		$data['lost_properties']=Model_Property::get_lost_properties();
		$data['found_properties']=Model_Property::get_found_properties();
		//$this->template->content=View::forge('pages/home',$data);

		return $this->response(array(
			'data'=>$data),200);
	}

	public function action_properties($i=NULL) {
		$this->template->title='Lost & Found';

		//pagination section
		$config=array(
			'pagination_url'=>Uri::create('page/properties/'),
			'total_items'=>Model_Property::count(),
			'per_page'=>12,
			'uri_segment'=>3,
		// or if you prefer pagination by query string
		//'uri_segment'    => 'page',
		);

		$pagination=Pagination::forge('mypagination',$config);

//		var_dump($pagination->offset);
//		var_dump($pagination->per_page);
//		exit;
		$data['lost_properties']=Model_Property::get_property($pagination->offset,$pagination->per_page);

// we pass the object, it will be rendered when echo'd in the view
		$data['pagination']=$pagination->render();

// return the view
//		$data['sliver_properties']=Model_Property::get_featuredsliver_properties(0,0);
		$this->template->content=View::forge('property/listproperties',$data);
	}

	public function get_listproperties() {
		$config=array(
			'pagination_url'=>Uri::create('page/properties/'),
			'total_items'=>Model_Property::count(),
			'per_page'=>12,
			'uri_segment'=>3,
		// or if you prefer pagination by query string
		//'uri_segment'    => 'page',
		);

		$pagination=Pagination::forge('mypagination',$config);

//		var_dump($pagination->offset);
//		var_dump($pagination->per_page);
//		exit;
		$data['total_properties']=Model_Property::count();
		$data['properties']=Model_Property::get_property($pagination->offset,$pagination->per_page);

		return $this->response(array(
			'data'=>$data),200);
	}

	public function action_property($id) {
		if(!$data['property']=Model_Property::get_property_by_id($id)){
			Session::set_flash('error','Could not find property #'.$id);
			Response::redirect('property');
		}
		$data['property_img']='';
		$path='uploads/users/user_'.$data['property']->user_id.'/property/property_'.$data['property']->id.'/';

		$upload_path=DOCROOT.$path;
		$imagefile=Utils_Readfile::getFiles($path);

		if($imagefile){
			$data['property_img']=$imagefile;
		}


		$data['user_profile_img']='';
		$path='uploads/users/user_'.$data['property']->user_id.'/profile/';
		$upload_path=DOCROOT.$path;
		$imagefile=Utils_Readfile::getFile($path);

		if($imagefile){
			$data['user_profile_img']=$imagefile;
		}
		$data['user_profile']=Model_Profile::get_profile($data['property']->user_id);
		$this->template->title="Property";
		$this->template->content=View::forge('property/singleproperty',$data);
	}

	// API to get specific page.

	public function get_listproperty($id) {
		
//		if(!$data['property']=Model_Property::get_property_by_id($id)){
//			Session::set_flash('error','Could not find property #'.$id);
//			Response::redirect('property');
//		}
		
		$data['property']=Model_Property::get_property_by_id($id);
		$data['property_img']='';
		$path='uploads/users/user_'.$data['property']->user_id.'/property/property_'.$data['property']->id.'/';

		$upload_path=DOCROOT.$path;
		$imagefile=Utils_Readfile::getFiles($path);

		if($imagefile){
			$data['property_img']=$imagefile;
		}


		$data['user_profile_img']='';
		$path='uploads/users/user_'.$data['property']->user_id.'/profile/';
		$upload_path=DOCROOT.$path;
		$imagefile=Utils_Readfile::getFile($path);

		if($imagefile){
			$data['user_profile_img']=$imagefile;
		}
		$data['user_profile']=Model_Profile::get_profile($data['property']->user_id);


		return $this->response(array(
			'data'=>$data),200);
	}

	
	public function action_search() {
		$this->template->title='Lost & Found';

		$key=$_POST['search_key'];
		$type=$_POST['type'];
		//pagination section
		$config=array(
			'pagination_url'=>Uri::create('page/search/'),
			'total_items'=>Model_Property::count(),
			'per_page'=>12,
			'uri_segment'=>3,
		// or if you prefer pagination by query string
		//'uri_segment'    => 'page',
		);

		$pagination=Pagination::forge('mypagination',$config);

//		var_dump($pagination->offset);
//		var_dump($pagination->per_page);
//		exit;
		$data['lost_properties']=Model_Property::get_property_search($pagination->offset,$pagination->per_page,$key,$type);

// we pass the object, it will be rendered when echo'd in the view
		$data['pagination']=$pagination->render();

// return the view
//		$data['sliver_properties']=Model_Property::get_featuredsliver_properties(0,0);
		$this->template->content=View::forge('property/listproperties',$data);
	}
	
	
	//Search Query Pattern
	//localhost/yomarihakathan/public/page/search.json?type=1&search_key=mobile
	
	
		public function get_listsearch() {
		$this->template->title='Lost & Found';

		$key=Input::get('search_key');
		$type=Input::get('type');
		//pagination section
		$config=array(
			'pagination_url'=>Uri::create('page/search/'),
			'total_items'=>Model_Property::count(),
			'per_page'=>12,
			'uri_segment'=>3,
		// or if you prefer pagination by query string
		//'uri_segment'    => 'page',
		);

		$pagination=Pagination::forge('mypagination',$config);

//		var_dump($pagination->offset);
//		var_dump($pagination->per_page);
//		exit;
		$data['properties']=Model_Property::get_property_search($pagination->offset,$pagination->per_page,$key,$type);

// we pass the object, it will be rendered when echo'd in the view
		$data['pagination']=$pagination->render();

// return the view
//		$data['sliver_properties']=Model_Property::get_featuredsliver_properties(0,0);
		//$this->template->content=View::forge('property/listproperties',$data);
		
		return $this->response(array(
			'data'=>$data),200);
		
	}
	
}
