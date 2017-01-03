<?php 
/**
* 
*/
class notification extends controller
{
	//$sid = $_SESSION['id'];
	private $sid="10013"; // Need session id ->user_name here
	private $notificationCount;

	function __construct()
	{
		parent::__construct(__CLASS__);
		echo $this->getNotificationCount();
		$this->details();
	}// End of constructor function

	/*
	*This is the abstract method where constructor is called directly
	*/
	public function _load_constroctor_details(){
		
	}// End of _load_constroctor_details function

	/*
	* Ajax call
	* Output - Give the unread notification count
	*/
	private function getNotificationCount(){
		$notificationCount = $this->model->notificationCount($this->sid);
		return $notificationCount['COUNT(read_status)'];
	}

	/*
	* Ajax Call
	* $offset is for recieved length from browser javascript where length is initially 0
	*/
	public function details($offset = 0){
		//calldetails from model notification
		// call methods per notification type to make notifications {following,story,comment,reply}

		$res = $this->model->{__FUNCTION__}($offset, $this->sid);
		$notificationList = array();
		$time = array();
		$link = array();

		for ($i=0; $i < sizeof($res['idNotification']); $i++) { 
			if ($res['type'][$i] == "1") { // following -> 1
				array_push($notificationList, $this->following($res['sender'][$i]));
				array_push($time, $res['time'][$i]);
				array_push($link, $res['ref_link'][$i]);
			}
			elseif ($res['type'][$i] == "2") { // story -> 2
				array_push($notificationList, $this->story($res['sender'][$i]));
				array_push($time, $res['time'][$i]);
				array_push($link, $res['ref_link'][$i]);
			}
			elseif ($res['type'][$i] == "3") { // comment -> 3
				array_push($notificationList, $this->comment($res['sender'][$i]));
				array_push($time, $res['time'][$i]);
				array_push($link, $res['ref_link'][$i]);
			}
			elseif ($res['type'][$i] == "4") { // reply -> 4
				array_push($notificationList, $this->reply($res['sender'][$i]));
				array_push($time, $res['time'][$i]);
				array_push($link, $res['ref_link'][$i]);
			}
			
		}
		// Send variables to view
		$this->view->notificationList = $notificationList;
		$this->view->time = $time;
		$this->view->link = $link;
		parent::set_view(__FUNCTION__, __CLASS__.'/'.__FUNCTION__.'/index.php');

	}

	private function following($s_id){
		//build string to show in notification
		return $s_id." started following you.";
	}
	private function story($s_id){
		//build string to show in notification
		return $s_id." posted a new story.";		
	}
	private function comment($s_id){
		//build string to show in notification
		return $s_id." commented on your post.";
	}
	private function reply($s_id){
		//build string to show in notification
		return $s_id." replied on your comment.";
	}


/**
	*This must be present in all the things.
	*/
	public function view_loader(){

		parent::_view();
	}
}

