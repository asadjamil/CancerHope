<?php  

	require('connection.php');
	
	// build JSON (a format) to return data to form 
	$JSON='{"t" : [';
	
	// get all cancers names from database against tblzlucancers 	
	$query = "SELECT * FROM tblzluspecial";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
	$count = 0;
	for ($i=0; $i<$rows; $i++)
	{

		$row = mysqli_fetch_assoc($result);
		$SpecialName = $row["Name"];

 		$JSON.='{"SpecialName" : "'.$SpecialName.'"}';
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