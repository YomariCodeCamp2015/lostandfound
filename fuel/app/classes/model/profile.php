<?php
class Model_Profile extends \Orm\Model {
	protected static $_properties=array(
		'id',
		'user_id',
		'firstname',
		'lastname',
		'address',
		'phone',
		'created_at',
		'updated_at',
	);
	protected static $_observers=array(
		'Orm\Observer_CreatedAt'=>array(
			'events'=>array('before_insert'),
			'mysql_timestamp'=>false,
		),
		'Orm\Observer_UpdatedAt'=>array(
			'events'=>array('before_update'),
			'mysql_timestamp'=>false,
		),
	);
	protected static $_table_name='profiles';

	public static function validate($factory) {
		$val=Validation::forge($factory);
		$val->add_field('firstname','First Name','required|max_length[255]');
		$val->add_field('lastname','Last Name','required|max_length[255]');
		$val->add_field('address','Country','required');
		$val->add_field('phone','State','required|max_length[25]');
		return $val;
	}

	public static function get_profile($user_id) {
		$sql="SELECT users.email, CONCAT(profiles.firstname,' ',profiles.lastname) as name, address, phone from users 
			  JOIN profiles ON users.id = profiles.user_id where users.id = ".$user_id;
		$result=DB::query($sql)->as_object('stdClass')->execute()->as_array();
		if($result){
			return $result[0];
		}else{
			return false;
		}
	}
}
