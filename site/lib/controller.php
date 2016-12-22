<?php

/**
* This is the main controller class
*/
class controller
{
	protected $view;
	
	function __construct()
	{
		$this->view=new view();
	}
}