<?php
	
	// require database connection file
	require('connection.php');
	// session Start
	session_start(); 
	// Get username and password from login.html from string that was passed in Ajax hit on line 81
	$username = $_POST["username"];
	$password = $_POST["password"];
	$sql = "SELECT Alias,Password FROM tbllogin WHERE Alias = '$username' && Password = '$password' ";
	$result = mysqli_query($conn,$sql);
	$rows = mysqli_num_rows($result);
	
	if($rows == 1)
	{
		$row=mysqli_fetch_assoc($result);
		$username=$row["Alias"];
		// Add username in session
		$_SESSION["username"]=$username;
		//return true if username and password is correct
		echo "true";
	}
	else
	{
		//return true if username and password is incorrect
		echo  'false';
	}
	
?>