<?php 
	require('connection.php');
	$pid = $_POST['pid'];
    $primaryLanguage = $_POST['primaryLanguage'];
    $maritalName = $_POST['maritalName'];
    $noOfChild = $_POST['noOfChild'];
    $childName = $_POST['childName'];
    $occupation = $_POST['occupation'];
    $workFlag = $_POST['workFlag'];
    $raceName = $_POST['raceName'];
    $religionName = $_POST['religionName'];
    $VisitFlag = $_POST['VisitFlag'];
    $comments = $_POST['comments'];

    // Select LanguageID
    $query1 = "SELECT tblzlulanguages.Name,tblzlulanguages.id AS LanguageID
				 	FROM tblzlulanguages WHERE tblzlulanguages.Name='$primaryLanguage'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$LanguageID = $row1["LanguageID"];

	
	// Select ChildID	
	$query1 = "SELECT tblzluchildren.Name,tblzluchildren.id AS ChildrenID
				 	FROM tblzluchildren WHERE tblzluchildren.Name='$childName'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$ChildrenID = $row1["ChildrenID"];
		
	// Select RaceID
	$query1 = "SELECT tblzluraces.Name,tblzluraces.id AS RaceID
				 	FROM tblzluraces WHERE tblzluraces.Name='$raceName'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$RaceID = $row1["RaceID"];
		
	// Select ReligionID
	$query1 = "SELECT tblzlureligions.Name,tblzlureligions.id AS ReligionID
				 	FROM tblzlureligions WHERE tblzlureligions.Name='$religionName'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$ReligionID = $row1["ReligionID"];

	// Select Marital ID 
	$query1 = "SELECT tblzlumaritalstatuses.Name,tblzlumaritalstatuses.ID AS MaritalID
				 	FROM tblzlumaritalstatuses WHERE tblzlumaritalstatuses.Name='$maritalName'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$MaritalID = $row1["MaritalID"];
			
	$workStatusFlag;
	$VisitStatusFlag;	
	if($workFlag == 'No')
	{
		$workStatusFlag = 2;
	}
	if($workFlag == 'Yes')
	{
		$workStatusFlag = 1;
	}
	if($workFlag == 'Unknown')
	{
		$workStatusFlag = 999;
	}
	if($VisitFlag == 'No')
	{
		$VisitStatusFlag = 2;
	}
	if($VisitFlag == 'Yes')
	{
		$VisitStatusFlag = 1;
	}
	if($VisitFlag == 'Unknown')
	{
		$VisitStatusFlag = 999;
	}
	
	$query1 = "SELECT tblpsychosocialissues.PatientID 
				 	FROM tblpsychosocialissues WHERE tblpsychosocialissues.PatientID='$pid'";
	$result1 = mysqli_query($conn,$query1);
	$row1 = mysqli_fetch_assoc($result1);
	$rows1 = mysqli_num_rows($result1);
	if($rows1 == 0)
	{
		$query3 = "INSERT INTO tblpsychosocialissues(PatientID,PrimaryLanguageID,LanguageSelected,MaritalStatusID,NumberChildren,ChildrenSelected,WorkFlag,RaceID,ReligionID,Face2FaceFlag,Comments,Occupation) 
					VALUES('$pid','1','$LanguageID','$MaritalID','$noOfChild','$ChildrenID','$workStatusFlag','$RaceID','$ReligionID','$VisitStatusFlag','$comments','$occupation')";
		$result3 = mysqli_query($conn,$query3);
	}
	else
	{
		
		$query6 = "UPDATE tblpsychosocialissues SET PrimaryLanguageID = 1,LanguageSelected='$LanguageID', MaritalStatusID='$MaritalID', NumberChildren='$noOfChild', ChildrenSelected='$ChildrenID', WorkFlag='$workStatusFlag' , RaceID='$RaceID', ReligionID='$ReligionID', Face2FaceFlag='$VisitStatusFlag', Comments='$comments', Occupation='$occupation' WHERE PatientID='$pid' ";
		$result6 = mysqli_query($conn,$query6);
	}
	
?>