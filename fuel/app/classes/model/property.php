<?php
use Orm\Model;
class Model_Property extends Model {
	protected static $_properties=array(
		'id',
		'user_id',
		'name',
		'price',
		'description',
		'beds',
		'baths',
		'type',
		'location',
		'maplat',
		'matlon',
		'propertyno',
		'area',
		'purpose',
		'view',
		'status',
		'package',
		'created_at',
		'updated_at',
	);
	protected static $_observers=array(
		'Orm\Observer_CreatedAt'=>array(
			'events'=>array('before_insert'),
			'mysql_timestamp'=>false,
		),
		'Orm\Observer_UpdatedAt'=>array(
			'events'=>array('before_save'),
			'mysql_timestamp'=>false,
		),
	);

	public static function validate($factory) {
		$val=Validation::forge($factory);
		$val->add_field('name','Name','required|max_length[255]');
//		$val->add_field('price','Price','required');
		$val->add_field('description','Description','required');
//		$val->add_field('beds','Beds','required|valid_string[numeric]');
//		$val->add_field('baths','Baths','required|valid_string[numeric]');
//		$val->add_field('type','Type','required|valid_string[numeric]');
		$val->add_field('location','Location','required');
		$val->add_field('maplat','Maplat','required|max_length[255]');
		$val->add_field('matlon','Matlon','required|max_length[255]');
		$val->add_field('propertyno','Propertyno','required|max_length[20]');
		$val->add_field('purpose','Purpose','required|valid_string[numeric]');
//		$val->add_field('view','View','required|valid_string[numeric]');
//		$val->add_field('status','Status','required|valid_string[numeric]');
//		$val->add_field('package','Package','required|valid_string[numeric]');

		return $val;
	}

	public static function get_property_by_id($id) {

		$sql="SELECT pro.*,pur.name as purpose_name from properties as pro
			INNER JOIN purposes as pur on pur.id = pro.purpose
			where pro.id= ".$id;


//		$sql="SELECT pro.*, pur.name as purpose_name, pkg.name as package_name, loc.name as location_name from properties as pro
//				INNER JOIN package as pkg on pkg.id = pro.package
//				INNER JOIN locations as loc on loc.id = pro.location
//				INNER JOIN purposes as pur on pur.id = pro.purpose				
//				WHERE pro.id =".$id;
		$result=DB::query($sql)->as_object('stdClass')->execute()->as_array();
		if($result){
			return $result[0];
		}else{
			return false;
		}
	}

	public static function get_property_counts($user_id) {
		$sql="Select Count(*) AS total,
					Count(CASE WHEN p.package = 1 THEN 1 END) AS global,
					Count(CASE WHEN p.package = 2 THEN 1 END) AS sliver,
					Count(CASE WHEN p.package = 3 THEN 1 END) AS free,
					Count(CASE WHEN p.status = 0 THEN 1 END) AS inactive,
					Count(CASE WHEN p.status = 1 THEN 1 END) AS active,
					Count(CASE WHEN p.status = 2 THEN 1 END) AS success
				FROM properties as p
				JOIN users as u ON u.id = p.user_id where u.id = ".$user_id;
		$result=DB::query($sql)->execute();
		if($result){
			return $result[0];
		}else{
			return false;
		}
	}

	public static function get_property_list($user_id) {

		$sql="SELECT pur.name as purpose_name, pro.id, pro.propertyno, pro.name, pro.propertyno, status.name as status FROM properties as pro
					JOIN purposes as pur on pur.id = pro.purpose
					JOIN status ON pro.status = status.id
					JOIN users as u ON u.id = pro.user_id where u.id = ".$user_id;


//		$sql="SELECT pro.id, pro.propertyno, pro.name, pack.name as package,pro.propertyno, status.name as status FROM properties as pro
//					JOIN package as pack ON pro.package = pack.id
//					JOIN status ON pro.status = status.id
//					JOIN users as u ON u.id = pro.user_id where u.id = ".$user_id;

		$result=DB::query($sql)->as_object('stdClass')->execute()->as_array();
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	public static function get_property($offset,$limit) {
//		$sql="SELECT pro.id as id, pro.user_id, pur.name as purpose_name, pkg.name as package_name,pro.propertyno, pro.name, pro.price, pro.beds, pro.baths, pro.area, loc.name as location_name from properties as pro
//				JOIN package as pkg on pkg.id = pro.package
//				JOIN locations as loc on loc.id = pro.location
//				JOIN purposes as pur on pur.id = pro.purpose
//				ORDER BY pro.package,pro.created_at
//				LIMIT ".$limit.
//		" OFFSET ".$offset;

		$sql="SELECT pro.*,pur.name as purpose_name from properties as pro
			INNER JOIN purposes as pur on pur.id = pro.purpose
			ORDER BY pro.package,pro.created_at
			LIMIT ".$limit.
			" OFFSET ".$offset;


		$result=DB::query($sql)->as_object('stdClass')->execute()->as_array();
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	public static function get_featured_properties() {
//		$sql="SELECT pur.name as purpose_name, pkg.name as package_name,pro.propertyno, pro.name, pro.price, pro.beds, pro.baths, pro.area, loc.name as location_name from properties as pro
//				JOIN package as pkg on pkg.id = pro.package
//				JOIN locations as loc on loc.id = pro.location
//				JOIN purposes as pur on pur.id = pro.purpose
//				WHERE pkg.name = 'Gold'
//				ORDER BY pro.created_at";

		$result=\DB::query('CALL getFealturedProperties(@silvertotals, @freetotals)',\DB::SELECT)->as_object('stdClass')->execute()->as_array();
		;

		//$result=DB::query($sql)->as_object('stdClass')->execute()->as_array();
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	public static function get_featuredsliver_properties() {
//		$sql="SELECT pur.name as purpose_name, pkg.name as package_name, pro.name, pro.price, pro.beds, pro.baths, pro.area, loc.name as location_name, pro.propertyno from properties as pro
//				JOIN package as pkg on pkg.id = pro.package
//				JOIN locations as loc on loc.id = pro.location
//				JOIN purposes as pur on pur.id = pro.purpose				
//				ORDER BY pro.created_at";
//		$result=DB::query($sql)->as_object('stdClass')->execute()->as_array();
		$result=\DB::query('CALL recentProperties(@silvertotals, @freetotals)',\DB::SELECT)->as_object('stdClass')->execute()->as_array();
		;

		if($result){
			return $result;
		}else{
			return false;
		}
	}

	public static function get_lost_properties() {
		$sql="SELECT pro.*,pur.name as purpose_name from properties as pro
			INNER JOIN purposes as pur on pur.id = pro.purpose
			where pur.name = 'lost'";


		$result=DB::query($sql)->as_object('stdClass')->execute()->as_array();
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	public static function get_found_properties() {
		$sql="SELECT pro.*,pur.name as purpose_name from properties as pro
			INNER JOIN purposes as pur on pur.id = pro.purpose
			where pur.name = 'found'";


		$result=DB::query($sql)->as_object('stdClass')->execute()->as_array();
		if($result){
			return $result;
		}else{
			return false;
		}
	}
	
	
	public static function get_property_search($offset,$limit,$key,$type) {
//		$sql="SELECT pro.id as id, pro.user_id, pur.name as purpose_name, pkg.name as package_name,pro.propertyno, pro.name, pro.price, pro.beds, pro.baths, pro.area, loc.name as location_name from properties as pro
//				JOIN package as pkg on pkg.id = pro.package
//				JOIN locations as loc on loc.id = pro.location
//				JOIN purposes as pur on pur.id = pro.purpose
//				ORDER BY pro.package,pro.created_at
//				LIMIT ".$limit.
//		" OFFSET ".$offset;

		$sql="SELECT pro.*,pur.name as purpose_name from properties as pro
			INNER JOIN purposes as pur on pur.id = pro.purpose
			WHERE pur.id = ".$type." AND (
			pro.name  LIKE '%".$key."%' OR
		    pro.description  LIKE '%".$key."%' ) 
			ORDER BY pro.package,pro.created_at
			LIMIT ".$limit.
			" OFFSET ".$offset;


		$result=DB::query($sql)->as_object('stdClass')->execute()->as_array();
		if($result){
			return $result;
		}else{
			return false;
		}
	}
}
