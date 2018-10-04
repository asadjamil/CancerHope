<?php
	require('connection.php');
	$query = "SELECT Name FROM tblzlusexes";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);	
	$JSON='{"t" : [';
	$count = 0;
	for ($i=0; $i<$rows; $i++)
	{

		$row = mysqli_fetch_assoc($result);
		$name = $row["Name"];	
 		$JSON.='{"name" : "'.$name.'"}';
 		$count++;
 		if($i < $rows - 1)
 		{
 			$JSON.=',';	
 		}
			
	}
	$JSON.=']}';
	echo $JSON;
	//echo $rows;
?>