<?php
	require('connection.php');
	$pid = $_POST['id'];
	$Relationship_ON = $_POST['Relationship_ON']; 
	$Sex_ON = $_POST['Sex_ON'];
	$Age_ON = $_POST['Age_ON'];
	//Variables for Diagnosis Options
	$CC_ON = $_POST['CurrentCancer_ON'];
	$CS_ON = $_POST['CancerStage_ON'];
	$MH_ON = $_POST['MetastasisHistory_ON'];
	$MBP_ON = $_POST['MetastasisBodyPart_ON'];
	$CR_ON = $_POST['CancerRecurrance_ON'];
	$CH_ON = $_POST['CancerHistory_ON'];
	$OHP_ON = $_POST['OtherHealthProblems_ON'];
	$LANG_ON = $_POST['Language_ON'];
	$MS_ON = $_POST['MaritalStatus_ON'];
	$CHILD_ON = $_POST['Children_ON'];
	$WS_ON = $_POST['WorkStatus_ON'];
	$RACE_ON = $_POST['Race_ON'];
	$REL_ON = $_POST['Religion_ON'];
	$FTF_ON = $_POST['Face2Face_ON'];
	$ST_ON = $_POST['SupportType_ON'];
	echo $ST_ON;
	/*$filter = array('pid' => $_POST['id']);
	$query_array = array();

	foreach ($filter as $key => $value)
	{
	    if ($value != '')
	    { $query_array[] = $key.' = '.$value;}
	}
	//print_r($query_array);
	$query = 'SELECT * FROM tblsetsearchoptions WHERE '.implode(' AND ', $query_array);
	echo $query;
	//$result = mysqli_query($conn,$query);
	//$rows = mysqli_num_rows($result);
	//$row = mysqli_fetch_assoc($result);
	*/
	/*$query = "SELECT tblcancers.PatientID AS cpatientID, tblcancers.CancerID AS cCancerID, tblcancers.StageID AS StageID, tblmetastasis.PatientID AS mbpPatientID, tblmetastasis.BodyPartID AS mbpBodyPartID, tblcancerhistory.PatientID AS chPatientID, tblcancerhistory.CancerID AS chCancerID, tblotherhistory.PatientID AS ohpPatientID, tblotherhistory.OtherHistoryID AS ohpOtherHistoryID  FROM tblcancers, tblmetastasis, tblcancerhistory, tblotherhistory WHERE tblcancers.PatientID = '$pid' AND tblmetastasis.PatientID = '$pid' AND tblcancerhistory.PatientID = '$pid' AND tblotherhistory.PatientID = '$pid' ";
		
	*/
	/*function roundToTheNearestAnything($value, $roundTo)
	{
    	$mod = $value%$roundTo;
    	return $value+($mod<($roundTo/2)?-$mod:$roundTo-$mod);
	}
	$query1 = "SELECT tblinformation.PatientID AS PatientID,tblinformation.PatientTypeID AS PatientTypeID,tblinformation.RelationID AS RelationID,tblinformation.Age AS Age,tblinformation.Gender AS Gender
				FROM tblinformation WHERE PatientID = '$pid' AND PatientTypeID = 1 ";
	$result1 = mysqli_query($conn,$query1);	
	$row1 = mysqli_fetch_assoc($result1);
	$PatientRelationID = $row1['RelationID'];
	$PatientGender = $row1['Gender'];	
	$PatientAge = $row1['Age'];	
	$query2 = "SELECT tblinformation.PatientID AS SupportID,tblinformation.PatientTypeID AS PatientTypeID,tblinformation.RelationID AS RelationID,tblinformation.Age AS Age,tblinformation.Gender AS Gender
				FROM tblinformation WHERE PatientTypeID = 2  ";		
	if($Relationship_ON == 1)
	{
		$query2 .= "AND RelationID=$PatientRelationID "; 
	}
	if($Sex_ON == 1)
	{
		$query2 .= "AND Gender=$PatientGender "; 
	}
	//echo $PatientAge;
	$AgeLength = strlen($PatientAge);
	//$AgeMod = $PatientAge % pow(10 ,($AgeLength - 1));
	//$AgeUnit  = $PatientAge % pow(10 ,($AgeLength - 2));
	$AgeUnit = $PatientAge % 10;
	//echo $AgeUnit;
	$AgeStart = $PatientAge -  $AgeUnit;
	$AgeEnd = ($PatientAge + $AgeUnit) - 1;

	//echo $AgeStart;
	//echo $AgeEnd;
	$AgeStart = $PatientAge;
	if($Age_ON == 1)
	{
		// Will be modify later
		//$query2 .= "AND Age>=$AgeStart AND Age<=$AgeEnd "; 
		$query2 .= "AND Age=$PatientAge "; 
	}
	//echo $query2;
	$result2 = mysqli_query($conn,$query2);	
	$rows2 = mysqli_num_rows($result2);	
	for ($i=0; $i<$rows2; $i++)
	{
		$row2 = mysqli_fetch_assoc($result2);
		$SupportID = $row2['SupportID'];
		//echo $SupportID;
	}
	

	// Query for Diagnosis
	$query3 = "SELECT tblinformation.PatientID AS PatientID, tblinformation.PatientTypeID AS PatientTypeID,tblcancer.id AS cID, tblcancers.PatientID AS cPatientID, tblcancers.PatientID AS cCancerID,tblcancers.StageID AS cStageID
				FROM tblinformation,tblcancers WHERE tblinformation.PatientID = '$pid' AND tblcancers.PatientID = '$pid' AND PatientTypeID = 1 ";
	echo $query3;
	$result3 = mysqli_query($conn,$query3);	
	$row3 = mysqli_fetch_assoc($result3);
	echo $row3['cID'];
	$cID = $row3['cid'];		
	echo $cID;
	*/
?>