<?php 
namespace controllers;
/**
* tHIS IS THE DEFAULT join
*/
class join extends controller
{
	
	function __construct()
	{	
		parent::__construct(__CLASS__);
		

	}
	public function _load_constroctor_details(){


	}// End of default _load_construcot

	private function newUser(){

		//input will be the fields of registration
		// output will be the link to the user's homepage or error message otherwise

	} //end of function newUser

	private function checkUser(){

		//input is the user name
		$this->newUser();
		//output : "you are already registered"

	} //end of function checkUser

	public function submit(){
		if(!isset($_POST['join_submit'])){

			parent::redirect(LANDING_PAGE."/join");
		}
		

	}// End of function submit

	public function view_loader(){

		parent::_view();
	}  
}// End of class
?>