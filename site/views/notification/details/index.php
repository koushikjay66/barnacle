<div>
<?php 

	for ($i=0; $i < sizeof($this->notificationList); $i++) { 
		echo "<a href='".$this->link[$i]."'>".$this->notificationList[$i]."</a>";
		echo "<p>".$this->time[$i]."</p><br>";
	}
?>
</div>
