<?php
/**
* 
*/
class logout extends controller
{
	
	function __construct()
	{
		parent::__construct(__CLASS__);
		$this->signout();
	}

	private function signout(){
		//input will be user name or id session varriable
		//output will take the user to landing page and kill the session varriable
	} //end of function signout

	public function view_loader(){

		parent::view_loader();
	}
}

?>