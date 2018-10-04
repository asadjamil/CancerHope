<?php 

	/*
		WHERE FirstName LIKE '%".$_POST["query"]."%'
	*/
	require('connection.php');
	$id = $_POST["id"];
	//$id = 1;
	// build JSON (a format) to return data to form 
	$JSON='{"t" : [';
	//echo $id;
	if(isset($_POST["id"]))
	{
		//$query = "SELECT tblinformation.PatientID,tblinformation.PatientTypeID,tblinformation.CallerTypeID,tblinformation.CallerName,tblinformation.CallerPhone,tblinformation.RelationID,tblinformation.ReferralSourceID,tblinformation.FirstName,tblinformation.LastName,tblinformation.Address,tblinformation.City,tblinformation.State,tblinformation.ZIP,tblinformation.County,tblinformation.HomePhone,tblinformation.BusPhone,tblinformation.DOB,tblinformation.Age,tblinformation.Gender,tblinformation.Comments,tblzlurelationships.Name AS RelationName,tblzlureferralsources.Name AS ReferralName,tblzlucallertype.Name AS CallerTypeName FROM tblinformation,tblzlurelationships,tblzlureferralsources,tblzlucallertype WHERE PatientID = 1 AND tblzlurelationships.id = tbinformation.RelationID AND tblzlureferralsources.id = tbinformation.ReferralSourceID AND tblzlucallertype.id = tbinformation.PatientTypeID";
		//$query = "SELECT tblinformation.PatientID,tblinformation.PatientTypeID,tblinformation.CallerTypeID,tblinformation.CallerName,tblinformation.CallerPhone,tblinformation.RelationID,tblinformation.ReferralSourceID,tblinformation.FirstName,tblinformation.LastName,tblinformation.Address,tblinformation.City,tblinformation.State,tblinformation.ZIP,tblinformation.County,tblinformation.HomePhone,tblinformation.BusPhone,tblinformation.DOB,tblinformation.Age,tblinformation.Gender,tblzlurelationships.id, tblzlurelationships.Name AS RelationName,tblzlureferralsources.id AS refid,tblzlureferralsources.Name AS ReferralName,tblzlucallertype.id,tblzlucallertype.Name AS CallerTypeName FROM tblinformation,tblzlurelationships,tblzlureferralsources,tblzlucallertype  WHERE PatientID = '$id' AND  tblinformation.RelationID = tblzlurelationships.id AND tblinformation.ReferralSourceID = tblzlureferralsources.id AND tblinformation.PatientTypeID = tblzlucallertype.id";
		//$query = "SELECT tblinformation.PatientID,tblinformation.PatientTypeID,tblinformation.CallerTypeID,tblinformation.CallerName,tblinformation.CallerPhone,tblinformation.RelationID,tblinformation.ReferralSourceID,tblinformation.FirstName,tblinformation.LastName,tblinformation.Address,tblinformation.City,tblinformation.State,tblinformation.ZIP,tblinformation.County,tblinformation.HomePhone,tblinformation.BusPhone,DATE(tblinformation.DOB) AS DateofBirth,tblinformation.Age,tblinformation.Gender,tblzlurelationships.id, tblzlurelationships.Name AS RelationName,tblzlureferralsources.id AS refid,tblzlureferralsources.Name AS ReferralName,tblzlucallertype.id,tblzlucallertype.Name AS CallerTypeName,tblzlupatienttype.ID,tblzlupatienttype.PatientType AS PatientTypeName,tblzlusexes.ID,tblzlusexes.Name AS GenderName FROM tblinformation,tblzlurelationships,tblzlureferralsources,tblzlucallertype,tblzlupatienttype,tblzlusexes  WHERE PatientID = '$id' AND  tblinformation.RelationID = tblzlurelationships.id AND tblinformation.ReferralSourceID = tblzlureferralsources.id AND tblinformation.PatientTypeID = tblzlupatienttype.id AND tblinformation.Gender = tblzlusexes.ID ";
		$query = "SELECT tblinformation.PatientID,tblinformation.PatientTypeID,tblinformation.CallerTypeID,tblinformation.CallerName,tblinformation.CallerPhone,tblinformation.RelationID,tblinformation.ReferralSourceID,tblinformation.FirstName,tblinformation.LastName,tblinformation.Address,tblinformation.City,tblinformation.State,tblinformation.ZIP,tblinformation.County,tblinformation.HomePhone,tblinformation.BusPhone,DATE(tblinformation.DOB) AS DateofBirth,tblinformation.Age,tblinformation.Gender,tblinformation.Comments,tblzlurelationships.id, tblzlurelationships.Name AS RelationName,tblzlureferralsources.id AS refid,tblzlureferralsources.Name AS ReferralName,tblzlucallertype.id,tblzlucallertype.Name AS CallerTypeName,tblzlupatienttype.ID,tblzlupatienttype.PatientType AS PatientTypeName,tblzlusexes.ID,tblzlusexes.Name AS GenderName FROM tblinformation,tblzlurelationships,tblzlureferralsources,tblzlucallertype,tblzlupatienttype,tblzlusexes  WHERE PatientID = '$id' AND  tblinformation.RelationID = tblzlurelationships.id AND tblinformation.ReferralSourceID = tblzlureferralsources.id AND tblinformation.CallerTypeID = tblzlucallertype.id AND tblinformation.Gender = tblzlusexes.ID ";
		//$query = "SELECT tblinformation.PatientID,tblinformation.PatientTypeID,tblinformation.CallerTypeID,tblinformation.CallerName,tblinformation.CallerPhone,tblinformation.RelationID,tblinformation.ReferralSourceID,tblinformation.FirstName,tblinformation.LastName,tblinformation.Address,tblinformation.City,tblinformation.State,tblinformation.ZIP,tblinformation.County,tblinformation.HomePhone,tblinformation.BusPhone,DATE(tblinformation.DOB) AS DateofBirth,tblinformation.Age,tblinformation.Gender,tblinformation.Comments,tblzlurelationships.id, tblzlurelationships.Name AS RelationName,tblzlureferralsources.id AS refid,tblzlureferralsources.Name AS ReferralName,tblzlucallertype.id,tblzlucallertype.Name AS CallerTypeName,tblzlupatienttype.ID,tblzlupatienttype.PatientType AS PatientTypeName,tblzlusexes.ID,tblzlusexes.Name AS GenderName FROM tblinformation,tblzlurelationships,tblzlureferralsources,tblzlucallertype,tblzlupatienttype,tblzlusexes  WHERE PatientID = '$id' OR  tblinformation.RelationID = tblzlurelationships.id OR tblinformation.ReferralSourceID = tblzlureferralsources.id OR tblinformation.CallerTypeID = tblzlucallertype.id OR tblinformation.Gender = tblzlusexes.ID ";
		$result = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($result);
		if($rows != 1)
		{
			
			$row=mysqli_fetch_assoc($result);
			// Caller Details
			$CallerName = $row["CallerName"];
			$CallerPhone = $row["CallerPhone"];

			/*
			// RelationID is Primary Key to the table (tblzlurelationships) return name against that id
			$RelationID = $row["RelationID"];
			// ReferralSourceID is Primary Key to the table (tblzlreferralsources) return name against that id
			$ReferralSourceID = $row["ReferralSourceID"];
			// PatientID is Primary Key to the table (tblzlucallertype) return name against that id
			$PatientTypeID = $row["PatientTypeID"];
			*/

			// 
			$RelationName = $row["RelationName"];
			$RefferalName = $row["ReferralName"];
			$CallerTypeName = $row["CallerTypeName"];
			//$PatientTypeName = $row["PatientTypeName"];
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
			$DateofBirth = $row["DateofBirth"];
			$GenderFlag = $row["Gender"];
			$Age = $row["Age"];
			$Comments = $row["Comments"];

			if($GenderFlag == 1)
			{
				$GenderName = 'Male';
			}
			elseif($GenderFlag == 2)
			{
				$GenderName = 'Female';
			}
			else
			{
				$GenderName = 'Unknown';
			}
			$JSON.='{"CallerName" : "'.$CallerName.'",';
			$JSON.='"CallerPhone" : "'.$CallerPhone.'",';
			$JSON.='"RelationName" : "'.$RelationName.'",';
			$JSON.='"RefferalName" : "'.$RefferalName.'",';
			$JSON.='"CallerTypeName" : "'.$CallerTypeName.'",';
			$JSON.='"PatientID" : "'.$PatientID.'",';
			$JSON.='"FirstName" : "'.$FirstName.'",';
			$JSON.='"LastName" : "'.$LastName.'",';
			$JSON.='"Address" : "'.$Address.'",';
			$JSON.='"City" : "'.$City.'",';
			$JSON.='"State" : "'.$State.'",';
			$JSON.='"ZIP" : "'.$ZIP.'",';
			$JSON.='"County" : "'.$County.'",';
			$JSON.='"HomePhone" : "'.$HomePhone.'",';
			$JSON.='"DateofBirth" : "'.$DateofBirth.'",';
			$JSON.='"Age" : "'.$Age.'",';
			$JSON.='"GenderName" : "'.$GenderName.'",';
			$JSON.='"BusPhone" : "'.$BusPhone.'",';
			$JSON.='"Comments" : "'.$Comments.'"}';

			$JSON.=']}';
			

			
			echo $JSON; 

		}
		else
		{
		 	echo 'false';	
		} 
	}		

?>