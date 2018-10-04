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
	$JSON.=']}';
	echo $JSON;
?>