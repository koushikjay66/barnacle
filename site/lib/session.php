<?php


/**
* This session handler class handles all the session related work.
  Most Important usage is in setting session. and getting the user ID.
*/
class session
{
	public static $user_id;
	public static $user_name;

	//$user_id, $user_name=null
	
	function __construct(){

		if (session_status() == PHP_SESSION_NONE) {
   			 session_start();
		}


	}// End of constructor function


	private function setSession(){


	}

	public function set_credential_session($user_name, $user_id){
		if(isset($this->user_id) && $this->user_id!=null && $this->user_name!=null){

			return FALSE;
		}else{
			$_SESSION['id']=base64_encode($user_id);
			echo $_SESSION['id'];
			$_SESSION['user_name']=base64_encode();
			return true;

		}
	}// End of function set_credential_session

	public function 




}// End of class session

$session = new session();
$session->set_credential_session("koushikjay66", "13101206");
echo "<br>";
$session = new session()

