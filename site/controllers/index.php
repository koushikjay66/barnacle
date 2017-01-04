<?php
namespace controllers;
use  lib\controller as controller;
if (!defined('LANDING_PAGE')) exit('No direct script access allowed');
/**
* This is the Default Landing Page
*/
class index extends controller
{

	function __construct($arg=null)
	{

		parent::__construct(__CLASS__);
		//parent::set_view('index', __CLASS__.'/index.php');
		//$this->most_view_projects();
		$this->static_contents();
	}// End of constructor function

	public function _load_constroctor_details(){


	}

	private function most_view_projects(){

		parent::set_view(__FUNCTION__, __CLASS__.'/'.__FUNCTION__.'/index.php');
	}// End of function mose_view_projects
	
	private function static_contents(){
		$this->view->araf="Araf Iftekhar Adnan";
		parent::set_view(__FUNCTION__, __CLASS__.'/'.__FUNCTION__.'/index.php');
	}// End of function static contents

	/**
	*This must be present in all the things.
	*/
	public function view_loader(){

		parent::_view();

	}// End of view_loader
}