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
		$str = "model_".$model_name;
		$this->model = new $str();
		$this->view=new view();
	}
}