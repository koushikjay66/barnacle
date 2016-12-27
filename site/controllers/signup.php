<?php 

/**
* 
*/
class signup extends controller
{
	
	function __construct()
	{
		parent::__construct(__CLASS__);
		if(isset($_POST['submit'])) 
		{ 
			$this->checkUser();
	    }

	}

	private function newUser(){

		//input will be the fields of registration
		// output will be the link to the user's homepage or error message otherwise

	} //end of function newUser

	private function checkUser(){

		//input is the user name
		$this->newUser();
		//output : "you are already registered"

	} //end of function checkUser


	public function view_loader(){

		parent::view_loader();
	}  
}
?>