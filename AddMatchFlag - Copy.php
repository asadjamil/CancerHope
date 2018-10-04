<?php
	require('connection.php');
	session_start();
    
	$page = isset($_POST['p'])?$_POST['p']:'';
	if($page == 'add'){
		$cid = $_POST['cid'];
		$pid = $_POST['pid'];
		$Match = $_POST['Match'];
		
		$Relationship_ON = $_POST['Relationship_ON']; 
		$Sex_ON = $_POST['Sex_ON'];
		$Age_ON = $_POST['Age_ON'];
		// echo $Sex_ON;
		//Variables for Diagnosis Options
		$CC_ON = $_POST['CurrentCancer_ON'];
		$CS_ON = $_POST['CancerStage_ON'];
		$MH_ON = $_POST['MetastasisHistory_ON'];
		$MBP_ON = $_POST['MetastasisBodyPart_ON'];
		$CR_ON = $_POST['CancerRecurrance_ON'];
		$CH_ON = $_POST['CancerHistory_ON'];
		$OHP_ON = $_POST['OtherHealthProblems_ON'];
		//Variables for Treatment Side Effects
		$C_ON = $_POST['Chemotherapy_ON'];
		$CSE_ON = $_POST['ChemotherapySE_ON'];
		$OD_ON = $_POST['OtherDrugs_ON'];
		$ODSE_ON = $_POST['OtherDrugsSE_ON'];
		$RAD_ON = $_POST['Radiation_ON'];
		$RSE_ON = $_POST['RadiationSE_ON'];
		$SG_ON = $_POST['Surgery_ON'];
		$SSE_ON = $_POST['SurgerySE_ON'];
		$SP_ON = $_POST['Special_ON'];
		$SPSE_ON = $_POST['SpecialSE_ON'];
		$COMP_ON = $_POST['Complementary_ON'];
		$COMPSE_ON = $_POST['ComplementarySE_ON'];
		//Variables for Psychosocial Issues
		$LANG_ON = $_POST['Language_ON'];
		$MS_ON = $_POST['MaritalStatus_ON'];
		$CHILD_ON = $_POST['Children_ON'];
		$WS_ON = $_POST['WorkStatus_ON'];
		$RACE_ON = $_POST['Race_ON'];
		$REL_ON = $_POST['Religion_ON'];
		$FTF_ON = $_POST['Face2Face_ON'];
		$ST_ON = $_POST['SupportType_ON'];
		// By default
		//$BaseRecord = 1;
		//$PrimaryBaseRecord = 1;
		$Initiate = 1;
		// get dateToday
		$timezone  = 4; //(GMT 4:00) EST (Pak) 
		$InitiateDateTime = gmdate("Y-m-j  H:i", time() + 3600*($timezone+date("I")));
		$LockedBy = $_SESSION["username"];
		$InitiatePSC = $LockedBy;
		// Match = 1 because Match Click
		
		$MatchDateTime = $InitiateDateTime;
		$MatchPSC = $LockedBy;
		// For Match Click Link = 0 and LinkDateTime = 0
		//$Link = 0;
		//$LinkDateTime = NULL;
		$query = "SELECT tblpatient2counsel.CounselID AS CID, tblpatient2counsel.PatientID AS PID
				 	FROM tblpatient2counsel WHERE tblpatient2counsel.CounselID ='$cid' AND tblpatient2counsel.PatientID='$pid' ";
		$result = mysqli_query($conn,$query);
		//$row = mysqli_fetch_assoc($result);
		$rows = mysqli_num_rows($result);
		//echo $rows;
		if($rows == 0)
		{
			$query3 = "INSERT INTO tblpatient2counsel(PatientID,CounselID,Initiate,InitiateDateTime,InitiatePSC,`Match`,MatchDateTime,MatchPSC,LockedBy) 
				VALUES('$pid','$cid','$Initiate','$InitiateDateTime','$InitiatePSC','$Match','$MatchDateTime','$MatchPSC',
					'$LockedBy')";
			//echo $query3;		
			$result3 = mysqli_query($conn,$query3);
		}
		else
		{
			$query3 = "UPDATE tblpatient2counsel SET `Match` = '$Match' WHERE tblpatient2counsel.CounselID ='$cid' AND tblpatient2counsel.PatientID='$pid' ";
			//echo $query3;
			$result3 = mysqli_query($conn,$query3);
		}
			
	}
	// Need to be done later
	/*elseif($page == 'edit'){
		$date = $_POST['date'];
		$stage = $_POST['stage'];
		$cancer = $_POST['cancer'];
		$id = $_POST['id'];
		$query3 = "UPDATE crud SET CancerID='$cancer',email='$email',phone='$phone',address='$address' WHERE id='$id' ";
		$result3 = mysqli_query($conn,$query3);
	}*/
	elseif ($page == 'del') {
		$id = $_POST['id'];
		$query4 = "DELETE FROM tblpatient2counsel WHERE id = '$id' ";
		$result4 = mysqli_query($conn,$query4);
	}
	
?>