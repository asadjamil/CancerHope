<?php
	require('connection.php');
	// Get Data From tblzlurelationships table
	$query = "SELECT tblzlurelationships.Name AS RelationName FROM tblzlurelationships";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);	
	$JSON='{"t" : [';
	$count = 0;
	for ($i=0; $i<$rows; $i++)
	{

		$row = mysqli_fetch_assoc($result);
		$RelationName = $row["RelationName"];

 		$JSON.='{"RelationName" : "'.$RelationName.'"}';
 		$count++;
 		$tmp = $rows - $count;
 		// place comma in second last of JSON
 		if($i < $rows - 1)
 		{
 			$JSON.=',';	
 		}
			
	}
	$JSON.=',';
	$query1 = "SELECT tblzlureferralsources.Name AS ReferralName FROM tblzlureferralsources";
	$result1 = mysqli_query($conn,$query1);
	$rows1 = mysqli_num_rows($result1);	
	$count1 = 0;
	for ($i=0; $i<$rows1; $i++)
	{

		$row1 = mysqli_fetch_assoc($result1);
		$ReferralName = $row1["ReferralName"];
		// replace " with \"
		$ReferralName = str_replace('"','\\"',$ReferralName); 
 		$JSON.='{"ReferralName" : "'.$ReferralName.'"}';
 		$count1++;
 		$tmp = $rows - $count;
 		if($i < $rows1 - 1)
 		{
 			$JSON.=',';	
 		}
			
	}
	$JSON.=',';
	// get last PatientID from tblinformation
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