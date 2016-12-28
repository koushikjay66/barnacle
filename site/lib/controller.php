<?php

/**
* This is the main controller class
*/
class controller
{
	protected $model;
	protected $view;
	private $view_array;
	private $child;

	function __construct($model_name)
	{
		$str = "model_".$model_name;
		$this->model = new $str();
		$this->view_array= array();
		$this->view=new view();
		$this->child=$model_name;
	}// end of constructor function 


	/**
	* For Some page access we need to check if the user is loggen in . If not logged in we need to send user back to 
	* the login page. 
	*/
	protected function permission_checker(){
		if(!isset($_SESSION['id'])){

			// Then we need to redirect user to login page
			self::redirect(LANDING_PAGE);

		}

	}// End of function permission_checker

	protected static function redirect($url){
		header("Location: ".$url);

	}// ENd of function redirec5t

	protected function set_view($view_name){
		array_push($this->view_array, $view_name);

	}
	
	protected function view_loader()
	{	$this->set_view("footer/index.php");
		for ($i=0; $i < sizeof($this->view_array); $i++) { 
			$this->view->render($this->view_array[$i]);
		}
	}// End of function view_loader

}// End of class