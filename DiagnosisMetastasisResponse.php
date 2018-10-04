<?php  

	require('connection.php');
	
	// build JSON (a format) to return data to form 
	$JSON='{"t" : [';
	
	// get all body part name from tblzlubodyparts 	
	$query = "SELECT * FROM tblzlubodyparts";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
	$count = 0;
	for ($i=0; $i<$rows; $i++)
	{

		$row = mysqli_fetch_assoc($result);
		$BodyPart = $row["Name"];
		$BodyPartID = $row["id"];
 		$JSON.='{"BodyPartID" : "'.$BodyPartID.'",';
 		$JSON.='"BodyPart" : "'.$BodyPart.'"}';
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