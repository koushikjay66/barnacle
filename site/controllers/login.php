<?php

/**
* 
*/
class login extends controller
{
	
	function __construct()
	{
		parent::__construct(__CLASS__);
		$this->signin();
	}

	private function signin() {
		//input will be user_name and password

		//output will either user's homepage or landing page with error message

	} //end of function signin

	public function view_loader(){

		parent::view_loader();
	}
}

?>