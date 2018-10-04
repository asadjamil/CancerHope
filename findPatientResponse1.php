<?php 

	/*
		WHERE FirstName LIKE '%".$_POST["query"]."%'
	*/
	require('connection.php');
	$id = $_POST["id"];
	// build JSON (a format) to return data to form 
	$JSON='{"t" : [';
	if(isset($_POST["id"]))
	{
		$query = "SELECT * from tblinformation WHERE PatientID = '$id' ";
		$result = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($result);
		if($rows == 1)
		{
			//echo 'true';
			// Caller Details
			$CallerName = $rows["CallerName"];
			$CallerPhone = $rows["CallerPhone"];

			// RelationID is Primary Key to the table (tblzlurelationships) return name against that id
			$RelationID = $rows["RelationID"];
			// ReferralSourceID is Primary Key to the table (tblzlreferralsources) return name against that id
			$ReferralSourceID = $rows["ReferralSourceID"];
			// PatientID is Primary Key to the table (tblzlucallertype) return name against that id
			$PatientTypeID = $rows["PatientTypeID"];

			$query1 = "SELECT * from tblzlurelationships WHERE id = '$RelationID' ";
			$result1 = mysqli_query($conn,$query1);
			$rows1 = mysqli_num_rows($result1);

			if($rows1 == 1)
			{
				$RelationName = $rows1["Name"];
			}

			$query2 = "SELECT * from tblzlureferralsources WHERE id = '$ReferralSourceID' ";
			$result2 = mysqli_query($conn,$query2);
			$rows2 = mysqli_num_rows($result2);

			if($rows2 == 1)
			{
				$RelationName = $rows2["Name"];
			}

			$query3 = "SELECT * from tblzlurelationships WHERE id = '$RelationID' ";
			$result3 = mysqli_query($conn,$query3);
			$rows3 = mysqli_num_rows($result3);

			if($rows3 == 1)
			{
				$RelationName = $rows3["Name"];
			}
			// Patient Details
			$PatientID = $rows["PatientID"];
			$FirstName = $rows["FirstName"];
			$LastName = $rows["LastName"];
			$Address = $rows["Address"];
			$City = $rows["City"];
			$State = $rows["State"];
			$ZIP = $rows["ZIP"];
			$Country = $rows["Country"];
			$HomePhone = $rows["HomePhone"];
			$BusPhone = $rows["BusPhone"];

			$JSON.='{"CallerName" : "'.$CallerName.'",';
			$JSON.='{"CallerPhone" : "'.$CallerPhone.'",';
			$JSON.='{"" : "'.$img.'",';

		}
		else
		{
		 	echo 'false';	
		} 
	}		

?>