<?php

/**
* This is the main controller class
*/
class controller
{
	protected $model;
	protected $view;
	function __construct($model_name)
	{
		$this->model = new "model_".$model_name();
		$this->view=new view();
	}
}