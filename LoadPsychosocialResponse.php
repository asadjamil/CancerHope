<?php  

	require('connection.php');
	
	// build JSON (a format) to return data to form 
	$JSON='{"t" : [';
	// get PatientID
	$pid = $_POST["pid"];
	// get all cancers names from database against tblzlucancers
	//$pid = 35;
	//echo $pid1; 	
	$query = "SELECT * FROM tblpsychosocialissues WHERE PatientID = '$pid' ";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
	$count = 0;
	for ($i=0; $i<$rows; $i++)
	{

		$row = mysqli_fetch_assoc($result);
		// get values from database against given PatientID 
		$LanguageSelected = $row["LanguageSelected"];
		$MaritalStatusID = $row["MaritalStatusID"];
		$NumberChildren = $row["NumberChildren"];
		$ChildrenID = $row["ChildrenSelected"];
		$WorkFlag = $row["WorkFlag"];
		$RaceID = $row["RaceID"];
		$ReligionID = $row["ReligionID"];
		$FaceFlag = $row["Face2FaceFlag"];
		$Comments = $row["Comments"];
		$Occupation = $row["Occupation"];
		
	

		// Select LanguageName
   		$query1 = "SELECT tblzlulanguages.id,tblzlulanguages.Name AS LanguageName
				 	FROM tblzlulanguages WHERE tblzlulanguages.id ='$LanguageSelected'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$LanguageName = $row1["LanguageName"];
		
		// Select MaritalName
		$query1 = "SELECT tblzlumaritalstatuses.ID,tblzlumaritalstatuses.Name AS MaritalName
				 	FROM tblzlumaritalstatuses WHERE tblzlumaritalstatuses.ID='$MaritalStatusID'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$MaritalName = $row1["MaritalName"];
		
		// Select ChildName
		$query1 = "SELECT tblzluchildren.id,tblzluchildren.Name AS ChildrenName
				 	FROM tblzluchildren WHERE tblzluchildren.id='$ChildrenID'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$ChildrenName = $row1["ChildrenName"];
		
		// Select RaceID
		$query1 = "SELECT tblzluraces.id,tblzluraces.Name AS RaceName
				 	FROM tblzluraces WHERE tblzluraces.id ='$RaceID'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$RaceName = $row1["RaceName"];

		// Select ReligionID
		$query1 = "SELECT tblzlureligions.id,tblzlureligions.Name AS ReligionName
				 	FROM tblzlureligions WHERE tblzlureligions.id ='$ReligionID'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$ReligionName = $row1["ReligionName"];

		
		if($FaceFlag == 1)
		{
			$FaceFlagStatus = 'Yes';
		}
		else
		{
			$FaceFlagStatus = 'No';
		}
		
		if($WorkFlag == 1)
		{
			$WorkFlagStatus = 'Yes';
		}
		else
		{
			$WorkFlagStatus = 'No';
		}
		//echo $WorkFlagStatus;
		// Build JSON
 		$JSON.='{"LanguageName" : "'.$LanguageName.'",';
 		$JSON.='"MaritalName" : "'.$MaritalName.'",';
 		$JSON.='"NumberChildren" : "'.$NumberChildren.'",';
 		$JSON.='"ChildrenName" : "'.$ChildrenName.'",';
 		$JSON.='"WorkFlagStatus" : "'.$WorkFlagStatus.'",';
 		$JSON.='"RaceName" : "'.$RaceName.'",';
 		$JSON.='"ReligionName" : "'.$ReligionName.'",';
 		$JSON.='"FaceFlagStatus" : "'.$FaceFlagStatus.'",';
 		$JSON.='"Comments" : "'.$Comments.'",';
 		$JSON.='"Occupation" : "'.$Occupation.'"}';
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