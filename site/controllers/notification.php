<?php 
namespace controllers;
use lib\controller as controller;
/**
* 
*/
class notification extends controller
{


	private $className = 'notification';
	//$sid = $_SESSION['id'];
	private $sid="10013"; // Need session id ->user_name here
	private $notificationCount;

	function __construct()
	{
		
		parent::__construct($this->className);
		// echo $this->getNotificationCount();

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
		$_0=" ! Welcome to Barnacle.";
		$_1=" started following you.";
		$_2=" posted a new story.";
		$_3=" commented on your post.";
		$_4=" replied on your comment.";
		$sql="UPDATE notification SET send_status = 1 WHERE idNotification IN (";

		for ($i=0; $i < sizeof($res['idNotification']); $i++) { 
			array_push($notificationList, ($res['sender'][$i].${"_".$res['type'][$i]}));
			array_push($time, $res['time'][$i]);
			array_push($link, $res['ref_link'][$i]);
			// for making sql to change send_status 
			if ($i != sizeof($res['idNotification'])-1) {
				$sql.= $res['idNotification'][$i].",";
			}
			else{
				$sql.= $res['idNotification'][$i];
			}
		}
		$sql.=")";
		$this->model->change_send_status($sql);
		// Send variables to view
		$this->view->notificationList =& $notificationList;
		$this->view->time =& $time;
		$this->view->link =& $link;
		parent::set_view(__FUNCTION__, $this->className.'/'.__FUNCTION__.'/index.php');

	}



/**
	*This must be present in all the things.
	*/
	public function view_loader(){

		parent::_view();
	}
}

