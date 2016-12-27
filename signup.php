<?php include("config.php");

	function NewUser() 
	{ 
		$first_name = $_POST['first_name']; 
		$last_name = $_POST['last_name'];
		$user_name = $_POST['user_name']; 
		$email = $_POST['email']; 
		$password = $_POST['pass'];
		$dob  =  $_POST['dob'];
		$gender  =  $_POST['gender'];
		$inst  =  $_POST['inst_name'];
	 	$query = "INSERT INTO user (first_name,last_name,user_name,email,password,dob,gender,institution_idinstitution) VALUES ('$first_name','$last_name','$user_name','$email','$password','$dob','$gender',3)";
	  	$data = mysqli_query ($db,$query)or die(mysql_error());
	   	if($data) 
	   		{ 
	   			echo "YOUR REGISTRATION IS COMPLETED...";
	   	 	} 
	}

	function SignUp() 
	{ 
	if(!empty($_POST['user_name'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
	 { 
	 	$query = mysqli_query($db,"SELECT * FROM user WHERE user_name = '$_POST[user_name]' AND password = '$_POST[pass]'") or die(mysql_error());

	 if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	  { 
	  	newuser(); 
	  } 
	  else 
	  	{ 
	  		echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; 
	  	} 
	  } 
	} 
	if(isset($_POST['submit'])) 
		{ 
			SignUp();
	 }
