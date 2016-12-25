<?php 

	/**
	* 
	*/
	class model_notification extends model
	{
		
		function __construct()
		{
			parent::__construct();
		}// End of constructor function

		public function notificationCount($sid){
			$sql = "SELECT COUNT(r_status) from notification WHERE read_status = 0 and reciever = '{$sid}'";
			return $this->database->fetch_result($this->database->perform_query($sql));
		}//end of notificationCount function

		public function details($offset=0,$r_id){
			$sql="SELECT * FROM notification WHERE receiver='{r_id}' AND read_status = 0";
			echo $sql;
			// return $this->database->fetch_multiple_result($sql);
		}//end of details function

	}

 ?>