<?php
if (!defined('LANDING_PAGE')) exit('No direct script access allowed');
/**
* This is the Default Landing Page
*/
class index extends controller
{

	function __construct($arg=null)
	{

		parent::__construct(__CLASS__);
		parent::set_view("index.php");
		$this->most_view_projects();
		$this->static_contents();
	}// End of constructor function

	private function most_view_projects(){

		parent::set_view("most_view.php");
	}// End of function mose_view_projects
	
	private function static_contents(){
		$this->view->araf="Araf Iftekhar Adnan";
		parent::set_view("static_things.php");
	}// End of function static contents

	/**
	*This must be present in all the things.
	*/
	public function view_loader(){

		parent::view_loader();
	}
}