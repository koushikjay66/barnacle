<?php 
/**
* 
*/
class notificationManager extends controller
{
	$sid = $_SESSION['id'];
	$notificationCount;

	function __construct()
	{
		parent::__construct(__CLASS__);
	}// End of constructor function

	private function getNotificationCount(){
		$notificationCount = $this->model->notificationCount($this->sid);
	}
}



 ?>