<?php
	require('connection.php');
	// Get Data From tblzlurelationships table
	$JSON='{"t" : [';
	$query2 = "SELECT tblinformation.PatientID AS PatientID FROM tblinformation ORDER BY PatientID DESC LIMIT 1";
	$result2 = mysqli_query($conn,$query2);
	$rows2 = mysqli_num_rows($result2);
	$row2 = mysqli_fetch_assoc($result2);
	$PatientID = $row2["PatientID"];
	$JSON.='{"PatientID" : "'.$PatientID.'"}';
	
	$JSON.=']}';
	echo $JSON;
	//echo $rows;
?>