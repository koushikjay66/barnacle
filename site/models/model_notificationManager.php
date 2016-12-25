<?php 

	/**
	* 
	*/
	class model_notificationManager extends model
	{
		
		function __construct()
		{
			parent::__construct();
		}// End of constructor function

		public function notificationCount($sid){
			$sql = "SELECT COUNT(*) from notifications WHERE r_status = 0 and reciever = '{$sid}'";
			return $this->database->fetch_result($this->database->perform_query($sql));
		}

	}

 ?>