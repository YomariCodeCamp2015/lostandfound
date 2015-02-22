<?php
class Model_User extends \Orm\Model {
	protected static $_properties=array(
		'id',
		'username',
		'password',
		'group',
		'email',
		'last_login',
		'login_hash',
		'reset_hash',
		'reg_hash',
		'status',
		'profile_fields',
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
	protected static $_table_name='users';

	public static function register_validate($factory) {
		$val=Validation::forge($factory);
		$val->add_field('firstname','First Name','required|max_length[255]');
		$val->add_field('lastname','Last Name','required');
		$val->add_field('email','Email','required|valid_email');
		$val->add_field('re-password','Confirm password','required');
		$val->add_field('password','Password','match_field[re-password]|required');		
		$val->add_field('address','Address','required');
		return $val;
	}
//	public static function _validation_confirmpassword($confirmpassword, $password) {
//		if($confirmpassword == $password){
//			return false;
//		}else{
//			return true;
//		}
//	}
}