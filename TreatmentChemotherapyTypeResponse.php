<?php  

	require('connection.php');
	
	// build JSON (a format) to return data to form 
	$JSON='{"t" : [';
	
	// get all cancers names from database against tblzlucancers 	
	$query = "SELECT tblzluchemotherapy.id AS id ,tblzluchemotherapy.Name AS ChemotherapyName FROM tblzluchemotherapy WHERE id=1";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
	$count = 0;
	for ($i=0; $i<$rows; $i++)
	{

		$row = mysqli_fetch_assoc($result);
		$ChemotherapyName = $row["ChemotherapyName"];
 		$JSON.='{"ChemotherapyName" : "'.$ChemotherapyName.'"}';
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