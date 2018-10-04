<?php
	require('connection.php');

	// get values from demographics tab via ajax(index.php) 
	$radioBtnValue = $_POST["radioBtnValue"];
	$CallerName = $_POST["CallerName"];
	$CallerPhone = $_POST["CallerPhone"];
	$RelationName = $_POST["RelationName"];
	$ReferralName = $_POST["ReferralName"];
	$FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];
	$Address = $_POST["Address"];
	$City = $_POST["City"];
	$State = $_POST["State"];
	$ZIP = $_POST["ZIP"];
	$Country = $_POST["Country"];
	$HomePhone = $_POST["HomePhone"];
	$BusPhone = $_POST["BusPhone"];
	$Age = $_POST['Age'];
	$GenderName = $_POST["GenderName"];
	$Comments = $_POST["Comments"];
	$PatientID = $_POST["PatientID"];

	// get CallerTypeID from tblzlucallertype that is to be inserted in tblinformation against CallerTypeID 
	// CallerTypeID is get by comparing radioBtnValue passed from demographics form with tbzlucallertype
	$query1 = "SELECT * FROM tblzlucallertype WHERE Name ='$radioBtnValue' ";
	$result1 = mysqli_query($conn,$query1);
	$rows1 = mysqli_num_rows($result1);
	$row1 = mysqli_fetch_assoc($result1);
	$CallerTypeID = $row1["ID"];
	//echo $CallerTypeID;

	// get RelationID from tblzlurelationships that is to be inserted in tblinformation against RelationID 
	// RelationID is get by comparing RelationName passed from demographics form with tbzlurelationships
	$query2 = "SELECT * FROM tblzlurelationships WHERE Name ='$RelationName' ";
	$result2 = mysqli_query($conn,$query2);
	$rows2 = mysqli_num_rows($result2);
	$row2 = mysqli_fetch_assoc($result2);
	$RelationID = $row2["id"];
	//echo $RelationID;
	// get ReferralID from tblzlureferralsources that is to be inserted in tblinformation against ReferralSourceID 
	// ReferralID is get by comparing RelationName passed from demographics form with tbzlurelationships
	$query3 = "SELECT * FROM tblzlureferralsources WHERE Name ='$ReferralName' ";
	$result3 = mysqli_query($conn,$query3);
	$rows3 = mysqli_num_rows($result3);
	$row3 = mysqli_fetch_assoc($result3);
	$ReferralSourceID = $row3["id"];
	//echo $ReferralSourceID;
	// Using PatientTypeID = 1 as current Section under process is Patient Information refer tblzlupatienttype 
	// ID = 1 is for Patient 
	$PatientTypeID = 1;

	if($GenderName == 'Male')
	{
		$GenderID = 1;
	}
	if($GenderName == 'Female')
	{
		$GenderID = 2;
	}
	// fix unknown gender
	if($GenderName == 'Unknown')
	{
		$GenderID = 999;
	}
	// Unknown
	if($Age == '')
	{
		$Age == 999;
	}
	//echo $GenderID;
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
		$query5 = "INSERT INTO tblinformation(PatientTypeID,CallerTypeID,CallerName,CallerPhone,RelationID,ReferralSourceID,FirstName,LastName,Address,City,State,ZIP,County,HomePhone,BusPhone,Age,Gender,Comments) VALUES('$PatientTypeID','$CallerTypeID','$CallerName','$CallerPhone','$RelationID','$ReferralSourceID','$FirstName','$LastName','$Address','$City','$State','$ZIP','$Country','$HomePhone','$BusPhone','$Age','$GenderID','$Comments') ";
		//echo $query5;
		$result5 = mysqli_query($conn,$query5);
		//echo 'if';
	}
	
	// Record already exists so update
	else 	
	{
		$query6 = "UPDATE tblinformation SET PatientTypeID='$PatientTypeID', CallerTypeID='$CallerTypeID', CallerName='$CallerName', CallerPhone='$CallerPhone', RelationID='$RelationID' , ReferralSourceID='$ReferralSourceID', FirstName='$FirstName', LastName='$LastName', Address='$Address', City='$City', State='$State', ZIP='$ZIP', County='$Country', HomePhone='$HomePhone', BusPhone='$BusPhone',Age='$Age',Gender='$GenderID',Comments='$Comments' WHERE PatientID='$PatientID' ";
		$result6 = mysqli_query($conn,$query6);
	}
?>