<?php 

	/*
		WHERE FirstName LIKE '%".$_POST["query"]."%'
	*/
	require('connection.php');
	if(isset($_POST["query"]))
	{
		$ouput = '';
		$query = "SELECT * from tblinformation WHERE PatientTypeID = 1 AND (FirstName LIKE '%".$_POST["query"]."%' OR LastName LIKE '%".$_POST["query"]."%') ";
		$result = mysqli_query($conn,$query);
		$output = '<ul class="list-unstyled"> ';
		$rows = mysqli_num_rows($result);
		if($rows > 0)
		{
			while($row = mysqli_fetch_array($result))
			{
				$output .= '<li class="patient-names">'.$row["PatientID"].'  '.$row["FirstName"].' '.$row["LastName"].'</li>';

			}
		}	
		else
		{
			$output .= '<li> Name Not Found </li>';
		}
		$output .= '</ul>';
		echo $output;
	}
?>