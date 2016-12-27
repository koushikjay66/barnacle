<?php


/**
* This session handler class handles all the session related work.
  Most Important usage is in setting session. and getting the user ID.
*/
class session
{
	public static $user_id;
	//$user_id, $user_name=null
	
	function __construct(){

		if (session_status() == PHP_SESSION_NONE) {
   			 session_start();

   			 echo "Session Started";
		}


	}// End of constructor function


	private function setSession(){


	}
}// End of class session

$session = new session();


