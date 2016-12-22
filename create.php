<!DOCTYPE html>
<html>
<head>
	<title>create</title>
</head>
<body>
	<div style="background-color: #e37293">
		<form method="POST" action="editPage.php">
		<p>Below is the file</p>
		<?php
			
			$homepage = file_get_contents('server/file.txt');
			echo $homepage;

		?>
		<button name="submitbtn" >Edit</button>
		</form>
	</div>

</body>
</html>