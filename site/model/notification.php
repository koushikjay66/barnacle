<?php 
namespace model;
 use lib\model as model;
	/**
	* 
	*/
	class notification extends model
	{
		
		function __construct()
		{
			parent::__construct();
		}// End of constructor function

		public function notificationCount($sid){
			$sql = "SELECT COUNT(read_status) from notification WHERE read_status = 0 and receiver = '{$sid}'";
			// echo $sql;
			return $this->database->fetch_result($sql);
		}//end of notificationCount function

		public function details($offset=0,$r_id){
			$sql= "SELECT * FROM notification WHERE receiver='{$r_id}' AND read_status = 0";
			// echo $sql;
			return $this->database->fetch_multiple_result($sql);
		}//end of details function

	}

 ?>