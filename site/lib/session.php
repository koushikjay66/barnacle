<?php


/**
* This session handler class handles all the session related work.
  Most Important usage is in setting session. and getting the user ID.
*/
final class session
{
	public static $user_id;
	public static $user_name;
	private $session_vars;
	//$user_id, $user_name=null
	
	function __construct(){

		if (session_status() == PHP_SESSION_NONE) {
   			 session_start();
		}
		else if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
			$this->_decrypt_user();
		}


	}// End of constructor function


	public function set_session($session_name, $session_value){
		$_SESSION[$session_name]=$session_value;
		$this->session_vars[$session_name]=$session_value;

	}// End of function setSession

	public function get_session($session_name){
		if(isset($_SESSION[$session_name])){

			return $_SESSION[$session_name];
		}
		return null;

	}// End of 

	private function _decrypt_user(){
		self::$user_name=base64_decode($_SESSION['id']);
		self::$user_id= base64_decode($_SESSION['user_name']);
	}

	public function set_credential_session($user_name, $user_id){
		if(isset($this->user_id) && $this->user_id!=null && $this->user_name!=null){

			return FALSE;
		}else{
			self::$user_name=$user_name; 
			self::$user_id=$user_id;
			$_SESSION['id']=base64_encode($user_id);
		
			$_SESSION['user_name']=base64_encode($user_name);
			return true;

		}
	}// End of function set_credential_session





}// End of class session


$session = new session();


