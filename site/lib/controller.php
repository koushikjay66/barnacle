<?php

/**
* This is the main controller class
*/
class controller
{
	protected $model;
	protected $view;
	protected $view_array;
	function __construct($model_name)
	{
		$str = "model_".$model_name;
		echo $str;
		$this->model = new $str();
		$this->view=new view();
	}

	protected function view_loader()
	{
		$this->view->render();
	}
}