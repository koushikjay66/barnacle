<div>
	

<?php 

	for ($i=0; $i < sizeof($this->notificationList); $i++) { 
		echo "<a href='".$this->link[$i]."'>".$this->notificationList[$i]."</a>\n";
		echo "<p>".$this->time[$i]."</p>\n";
	}
?>
</div>
