<?php
class Utils_Mailer {

	public static function sendmail($email_to,$email_from,$email_subject,$email_body) {
		$email=Email::forge();
// Set the from address
		$email->from($email_from);
// Set the to address
		$email->to($email_to);
// Set a subject
		$email->subject($email_subject);
		$email->html_body(\View::forge('email/template',array('email_body'=>$email_body)));
		$email->send();
	}

	public static function email_trigger($action_name,$email_to,$user_info,$registration_hash) {
		$email_from='hamrokinbech@gmail.com';
		self::$action_name($email_to,$email_from,$user_info,$registration_hash);
	}

	public static function register($email_to,$email_from,$user_info,$registration_hash) {
		$email_subject="Thankyou for successful registration in Hamrokinbech.com.";
		$email_body=View::forge('email/register',array('user_info'=>$user_info,'reg_hash'=>$registration_hash));
		self::sendmail($email_to,$email_from,$email_subject,$email_body);
	}
}
