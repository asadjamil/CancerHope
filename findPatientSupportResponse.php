<?php 

	/*
		WHERE FirstName LIKE '%".$_POST["query"]."%'
	*/
	require('connection.php');
	$id = $_POST["id"];
	//$id = 1;
	//$id = 89;
	// build JSON (a format) to return data to form 
	$JSON='{"t" : [';
	//echo $id;
	//if(isset($_POST["id"]))
	//{
		//$query = "SELECT tblinformation.PatientID,tblinformation.PatientTypeID,tblinformation.CallerTypeID,tblinformation.CallerName,tblinformation.CallerPhone,tblinformation.RelationID,tblinformation.ReferralSourceID,tblinformation.FirstName,tblinformation.LastName,tblinformation.Address,tblinformation.City,tblinformation.State,tblinformation.ZIP,tblinformation.County,tblinformation.HomePhone,tblinformation.BusPhone,tblinformation.DOB,tblinformation.Age,tblinformation.Gender,tblinformation.Comments,tblzlurelationships.Name AS RelationName,tblzlureferralsources.Name AS ReferralName,tblzlucallertype.Name AS CallerTypeName FROM tblinformation,tblzlurelationships,tblzlureferralsources,tblzlucallertype WHERE PatientID = 1 AND tblzlurelationships.id = tbinformation.RelationID AND tblzlureferralsources.id = tbinformation.ReferralSourceID AND tblzlucallertype.id = tbinformation.PatientTypeID";
		//$query = "SELECT tblinformation.PatientID,tblinformation.PatientTypeID,tblinformation.CallerTypeID,tblinformation.CallerName,tblinformation.CallerPhone,tblinformation.RelationID,tblinformation.ReferralSourceID,tblinformation.FirstName,tblinformation.LastName,tblinformation.Address,tblinformation.City,tblinformation.State,tblinformation.ZIP,tblinformation.County,tblinformation.HomePhone,tblinformation.BusPhone,tblinformation.DOB,tblinformation.Age,tblinformation.Gender,tblzlurelationships.id, tblzlurelationships.Name AS RelationName,tblzlureferralsources.id AS refid,tblzlureferralsources.Name AS ReferralName,tblzlucallertype.id,tblzlucallertype.Name AS CallerTypeName FROM tblinformation,tblzlurelationships,tblzlureferralsources,tblzlucallertype  WHERE PatientID = '$id' AND  tblinformation.RelationID = tblzlurelationships.id AND tblinformation.ReferralSourceID = tblzlureferralsources.id AND tblinformation.PatientTypeID = tblzlucallertype.id";
		//$query = "SELECT tblinformation.PatientID,tblinformation.PatientTypeID,tblinformation.CallerTypeID,tblinformation.CallerName,tblinformation.CallerPhone,tblinformation.RelationID,tblinformation.ReferralSourceID,tblinformation.FirstName,tblinformation.LastName,tblinformation.Address,tblinformation.City,tblinformation.State,tblinformation.ZIP,tblinformation.County,tblinformation.HomePhone,tblinformation.BusPhone,DATE(tblinformation.DOB) AS DateofBirth,tblinformation.Age,tblinformation.Gender,tblzlurelationships.id, tblzlurelationships.Name AS RelationName,tblzlureferralsources.id AS refid,tblzlureferralsources.Name AS ReferralName,tblzlucallertype.id,tblzlucallertype.Name AS CallerTypeName,tblzlupatienttype.ID,tblzlupatienttype.PatientType AS PatientTypeName,tblzlusexes.ID,tblzlusexes.Name AS GenderName FROM tblinformation,tblzlurelationships,tblzlureferralsources,tblzlucallertype,tblzlupatienttype,tblzlusexes  WHERE PatientID = '$id' AND  tblinformation.RelationID = tblzlurelationships.id AND tblinformation.ReferralSourceID = tblzlureferralsources.id AND tblinformation.PatientTypeID = tblzlupatienttype.id AND tblinformation.Gender = tblzlusexes.ID ";
		// Load In active Dates
		$query = "SELECT * FROM tblinactivedates WHERE PatientID = '$id' ";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		$StartDate = $row["StartDate"];
		$EndDate = $row["EndDate"];

		$query = "SELECT * FROM tblinformation WHERE PatientID = '$id' ";
		$result = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($result);
		if($rows == 1)
		{
			
			$row = mysqli_fetch_assoc($result);
			// Patient Details
			$PatientID = $row["PatientID"];
			$FirstName = $row["FirstName"];
			$LastName = $row["LastName"];
			$Address = $row["Address"];
			$City = $row["City"];
			$State = $row["State"];
			$ZIP = $row["ZIP"];
			$County = $row["County"];
			$HomePhone = $row["HomePhone"];
			$BusPhone = $row["BusPhone"];
			$OtherPhone = $row["OtherPhone"];
			$EmailAddr = $row["EmailAddr"]; 
			$DateofBirth = $row["DOB"];
			$GenderFlag = $row["Gender"];
			$AgeAtIlliness = $row["AgeAtIlliness"]; 
			$Age = $row["Age"];
			$PreferredActivityLevel = $row["PreferredActivityLevel"]; 
			$DateOfInitialTraining = $row["DateOfInitialTraining"];
			$SupportPersonStatusID = $row["SupportPersonStatusID"];
			$Comments = $row["Comments"];
			// get RelationID
			$RelationID = $row["RelationID"];
			// get RelationName against RelationID from tblzlurelationships
			$query1 = "SELECT * FROM tblzlurelationships WHERE id = '$RelationID' ";
			$result1 = mysqli_query($conn,$query1);
			$row1 = mysqli_fetch_assoc($result1);
			$RelationName = $row1["Name"];
			
			$PatientStatusID = $row["PatientStatusID"];

			if($GenderFlag == 1)
			{
				$GenderName = 'Male';
			}
			elseif($GenderFlag == 2)
			{
				$GenderName = 'Female';
			}
			elseif($GenderFlag == 999) 
			{
				$GenderName = 'Unknown';
			}
			
			if($SupportPersonStatusID == 1)
			{
				$SupportPersonStatusName = 'Active';
			}
			elseif($SupportPersonStatusID == 2)
			{
				$SupportPersonStatusName = 'Inactive';
			}
			elseif($SupportPersonStatusID == 999)
			{
				$SupportPersonStatusName = 'Unknown';
			}
			$PatientStatusName = '';
			if($PatientStatusID == 1)
			{
				$PatientStatusName = 'Living';
			}
			if($PatientStatusID == 2)
			{
				$PatientStatusName = 'Deceased';
			}
			$JSON.='{"PatientID" : "'.$PatientID.'",';
			$JSON.='"FirstName" : "'.$FirstName.'",';
			$JSON.='"LastName" : "'.$LastName.'",';
			$JSON.='"Address" : "'.$Address.'",';
			$JSON.='"City" : "'.$City.'",';
			$JSON.='"State" : "'.$State.'",';
			$JSON.='"ZIP" : "'.$ZIP.'",';
			$JSON.='"County" : "'.$County.'",';
			$JSON.='"HomePhone" : "'.$HomePhone.'",';
			$JSON.='"BusPhone" : "'.$BusPhone.'",';
			$JSON.='"OtherPhone" : "'.$OtherPhone.'",';
			$JSON.='"EmailAddr" : "'.$EmailAddr.'",';
			$JSON.='"DateofBirth" : "'.$DateofBirth.'",';
			$JSON.='"Age" : "'.$Age.'",';
			$JSON.='"GenderName" : "'.$GenderName.'",';
			$JSON.='"AgeAtIlliness" : "'.$AgeAtIlliness.'",';
			$JSON.='"PreferredActivityLevel" : "'.$PreferredActivityLevel.'",';
			$JSON.='"DateOfInitialTraining" : "'.$DateOfInitialTraining.'",';
			$JSON.='"SupportPersonStatusName" : "'.$SupportPersonStatusName.'",';
			$JSON.='"StartDate" : "'.$StartDate.'",';
			$JSON.='"EndDate" : "'.$EndDate.'",';
			$JSON.='"Comments" : "'.$Comments.'",';
			$JSON.='"RelationName" : "'.$RelationName.'",';
			$JSON.='"PatientStatusName" : "'.$PatientStatusName.'"}';
			$JSON.=']}';
			
			
			echo $JSON; 

		}
		else
		{
		 	echo 'false';	
		} 
	//}		

?>