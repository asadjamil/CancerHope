<?php
	require('connection.php');

	// get values from demographics tab via ajax(index.php) 
	
	$FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];
	$Address = $_POST["Address"];
	$City = $_POST["City"];
	$State = $_POST["State"];
	$ZIP = $_POST["ZIP"];
	$Country = $_POST["Country"];
	$HomePhone = $_POST["HomePhone"];
	$BusPhone = $_POST["BusPhone"];
	$GenderName = $_POST["GenderName"];
	$Comments = $_POST["Comments"];
	$PatientID = $_POST["PatientID"];
	$OtherPhone = $_POST["OtherPhone"];
	$EmailAddr = $_POST["EmailAddr"];
	$DOB = $_POST["DOB"];
	$Age = $_POST["Age"];
	$AgeAtIlliness = $_POST["AgeAtIlliness"];
	$SupportPersonStatusName = $_POST["SupportPersonStatusName"];
	$StartDate = $_POST["StartDate"];
	$EndDate = $_POST["EndDate"];
	$DateOfInitialTraining = $_POST["DateOfInitialTraining"];
	$PreferredActivityLevel = $_POST["PreferredActivityLevel"];
	$RelationName = $_POST["RelationName"];
	$PatientStatusName = $_POST["PatientStatusName"];
	// get RelationName against RelationID from tblzlurelationships
	$query1 = "SELECT * FROM tblzlurelationships WHERE Name = '$RelationName' ";
	$result1 = mysqli_query($conn,$query1);
	$row1 = mysqli_fetch_assoc($result1);
	$RelationID = $row1["id"];
	if($PatientStatusName == 'Living')
	{
		$PatientStatusID = 1;
	}
	if($PatientStatusName == 'Deceased')
	{
		$PatientStatusID = 2;
	}
	if($PatientStatusName = 'Unknown')
	{
		$PatientStatusID = 999;
	}
	//echo $PatientStatusName;
	// Using PatientTypeID = 3 as current Section under process is Patient Support Information refer tblzlupatienttype 
	// ID = 3 is for Patient Support
	$PatientTypeID = $_POST["PatientTypeID"];
	
	if($GenderName == 'Male')
	{
		$GenderID = 1;
	}
	elseif($GenderName == 'Female')
	{
		$GenderID = 2;
	}
	elseif ($GenderName == 'Unknown')
	{
		$GenderID = 999;
	}
	if($SupportPersonStatusName == 'Active')
	{
		$SupportPersonStatusID = 1;
	}
	elseif($SupportPersonStatusName == 'Inactive')
	{
		$SupportPersonStatusID = 2;
	}
	elseif ($SupportPersonStatusName == 'Unknown') 
	{
		$SupportPersonStatusID = 999;
	}

	// check if record already exists
	$query4 = "SELECT tblinformation.PatientID AS PatientID FROM  tblinformation WHERE tblinformation.PatientID ='$PatientID' ";
	$result4 = mysqli_query($conn,$query4);
	// get no of rows against PatientID 	
	$rows4 = mysqli_num_rows($result4);
	//$row4 = mysqli_fetch_assoc($result4);
	// If Record found from above query then Insert
	if($rows4 == 0)
	{
		// Insert in tblinformation data of patient 
		$query5 = "INSERT INTO tblinformation(PatientTypeID,RelationID,FirstName,LastName,Address,City,State,ZIP,County,HomePhone,BusPhone,OtherPhone,EmailAddr,DOB,Age,Gender,Comments,SupportPersonStatusID,DateOfInitialTraining,PreferredActivityLevel,PatientStatusID,AgeAtIlliness)
				 VALUES('$PatientTypeID','$RelationID','$FirstName','$LastName','$Address','$City','$State','$ZIP','$Country','$HomePhone','$BusPhone','$OtherPhone','$EmailAddr','$DOB','$Age','$GenderID','$Comments','$SupportPersonStatusID','$DateOfInitialTraining','$PreferredActivityLevel','$PatientStatusID','$AgeAtIlliness') ";
		$result5 = mysqli_query($conn,$query5);
		$query5 = "INSERT INTO tblinactivedates(PatientID,StartDate,EndDate) VALUES('$PatientID','$StartDate','$EndDate')";
		$result5 = mysqli_query($conn,$query5);
	}
	
	// Record already exists so update
	else 	
	{
		$query6 = "UPDATE tblinformation SET PatientTypeID='$PatientTypeID',RelationID='$RelationID',FirstName='$FirstName', LastName='$LastName', Address='$Address', City='$City', State='$State', ZIP='$ZIP', County='$Country', HomePhone='$HomePhone', BusPhone='$BusPhone', OtherPhone='$OtherPhone',EmailAddr='$EmailAddr',DOB='$DOB',Age='$Age',Gender='$GenderID',Comments='$Comments',SupportPersonStatusID='$SupportPersonStatusID',DateOfInitialTraining='$DateOfInitialTraining',PreferredActivityLevel='$PreferredActivityLevel',PatientStatusID='$PatientStatusID',AgeAtIlliness='$AgeAtIlliness' WHERE PatientID='$PatientID' ";
		$result6 = mysqli_query($conn,$query6);

		$query6 = "UPDATE tblinactivedates SET StartDate='$StartDate',EndDate='$EndDate'";
		$result6 = mysqli_query($conn,$query6); 
	}
	
?>