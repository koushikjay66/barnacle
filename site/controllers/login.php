<?php


/**
* This is the default Login page Controller, User can log in or User can be redirected to login page
*/
class login extends controller
{
	

	
	function __construct()
	{

		parent::__construct(__CLASS__);
		
	}

	public function _load_constroctor_details(){

	}
	private function signin() {

	} //end of function signin

	public function submit(){
		if(!isset($_POST['submit_login'])){
			annonymus_functions::redirect(LANDING_PAGE);

		}// End of !isset($_POST['submit_login'])

	}// End of function submit

	public function view_loader(){

		parent::_view();
	}

	
}

?>