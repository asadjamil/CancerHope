<?php  

	require('connection.php');
	$pid = $_POST["pid"];
	// build JSON (a format) to return data to form 
	$JSON='{"t" : [';
	
	// get all cancers names from database against tblzlucancers 	
	$query = "SELECT * FROM tbldiagnosis WHERE PatientID = '$pid' ";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
	$row = mysqli_fetch_assoc($result);
	$CancerFlag = $row["CancerFlag"];
	$MetastasisFlag = $row["MetastasisFlag"];
	$CancerHistoryFlag = $row["CancerHistoryFlag"];
	$CancerRecurranceFlag = $row["CancerRecurranceFlag"];

	if($CancerFlag == 1)
	{
		$currentCancerFlag1 = 'Yes';
	}
	else
	{
		$currentCancerFlag1 = 'No';
	}
	if($MetastasisFlag == 1)
	{
		$MetastasisFlag1 = 'Yes';
	}
	else
	{
		$MetastasisFlag1 = 'No';
	}
	if($CancerHistoryFlag == 1)
	{
		$CancerFlag1 = 'Yes';
	}
	else
	{
		$CancerFlag1 = 'No';
	}
	if($CancerRecurranceFlag == 1)
	{
		$OtherFlag1 = 'Yes';
	}
	else
	{
		$OtherFlag1 = 'No';
	}
	$Comments = $row["Comments"];
	$JSON.='{"Comments" : "'.$Comments.'",';
	$JSON.='"currentCancerFlag1" : "'.$currentCancerFlag1.'",';
	$JSON.='"MetastasisFlag1" : "'.$MetastasisFlag1.'",';
	$JSON.='"CancerFlag1" : "'.$CancerFlag1.'",';
	$JSON.='"OtherFlag1" : "'.$OtherFlag1.'"}';

	$JSON.=']}';
	echo $JSON;
?>