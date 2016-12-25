<?php 
/**
* 
*/
class notification extends controller
{
	//$sid = $_SESSION['id'];
	private $sid="abc";
	private $notificationCount;

	function __construct()
	{
		parent::__construct(__CLASS__);
	}// End of constructor function

	private function getNotificationCount(){
		$notificationCount = $this->model->notificationCount($this->sid);
	}

	/*
	* $offset is for recieved length from browser javascript where length is initially 0
	*/
	public function details($offset = 0){
		//calldetails from model notification
		// call methods per notification type to make notifications {following,story,comment,reply}
		$res = $this->model->{__FUNCTION__}($offset, "koushikjay66");


	}

	private function following($s_id,$time){
		//build string to show in notification
		return $s_id." started following you.";
	}
	private function story($s_id,$time){
		//build string to show in notification
		return $s_id." posted a new stroy.";		
	}
	private function comment($s_id,$time){
		//build string to show in notification
		return $s_id." commented on your post.";
	}
	private function reply($s_id,$time){
		//build string to show in notification
		return $s_id." replied on your comment.";
	}


}

