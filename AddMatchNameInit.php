<?php
	require('connection.php');
	session_start();
    
	$page = isset($_POST['p'])?$_POST['p']:'';
	if($page == 'add'){
		$pid = $_POST['pid'];
		// By default
		$BaseRecord = 1;
		$PrimaryBaseRecord = 0;
		$Initiate = 1;
		// get dateToday
		$timezone  = 4; //(GMT 4:00) EST (Pak) 
		$InitiateDateTime = gmdate("Y-m-j  H:i", time() + 3600*($timezone+date("I")));
		$LockedBy = $_SESSION["username"];
		$InitiatePSC = $LockedBy;
		/*$query = "SELECT tblpatient2counsel.PatientID AS PatientID
				 	FROM tblpatient2counsel WHERE PatientID='$pid'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		$rows = mysqli_num_rows($result);*/
		$query3 = "INSERT INTO tblpatient2counsel(PatientID,BaseRecord,PrimaryBaseRecord,Initiate,InitiateDateTime,InitiatePSC,LockedBy) 
				VALUES('$pid','$BaseRecord','$PrimaryBaseRecord','$Initiate','$InitiateDateTime','$InitiatePSC','$LockedBy')";
			$result3 = mysqli_query($conn,$query3);
			
	}
?>	