<?php  

	require('connection.php');
	
	// build JSON (a format) to return data to form 
	$JSON='{"t" : [';
	
	// get all cancerstage names from database against tblzlucancerstages 	
	$query = "SELECT tblzlucancerstages.Name AS CancerStage FROM tblzlucancerstages";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
	$count = 0;
	for ($i=0; $i<$rows; $i++)
	{

		$row = mysqli_fetch_assoc($result);
		$CancerStage = $row["CancerStage"];
 		$JSON.='{"CancerStage" : "'.$CancerStage.'"}';
 		$count++;
 		$tmp = $rows - $count;
 		if($i < $rows - 1)
 		{
 			$JSON.=',';	
 		}
			
	}				
	$JSON.=']}';
	echo $JSON;
?>