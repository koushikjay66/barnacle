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
	protected function view_loader()
	{
		$this->view->render();
	}// End of function view_loader
}