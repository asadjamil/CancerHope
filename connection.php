<?php						

	//set up mysql connection
	$conn = mysqli_connect("localhost", "root", "") or die(mysql_error());
	//select database
	mysqli_select_db($conn,"chnms2") or die(mysql_error());

?>