<?php
	require('connection.php');
	//if(isset($_POST['pid']) && isset($_POST['diagnosisComments']))
	//{
		$pid = $_POST['pid'];
		$currentCancerFlag1 = $_POST['currentCancerFlag1'];
		$currentCancerSelected = $_POST['currentCancerSelected'];
		$MetastasisFlag1 = $_POST['MetastasisFlag1'];
		$MetastasisSelected = $_POST['MetastasisSelected'];
		$CancerFlag1 = $_POST['CancerFlag1'];
		$CancerSelected = $_POST['CancerSelected'];
		$OtherFlag1 = $_POST['OtherFlag1'];
		$OtherSelected = $_POST['OtherSelected'];
		$diagnosisComments = $_POST['diagnosisComments'];
		
		$query2 = "SELECT tbldiagnosis.PatientID FROM tbldiagnosis WHERE tbldiagnosis.PatientID='$pid'";
		$result2 = mysqli_query($conn,$query2);
		$row2 = mysqli_fetch_assoc($result2);
		$rows2 = mysqli_num_rows($result2);
		
		if($rows2 == 0)
		{
			$query = "INSERT INTO tbldiagnosis(PatientID,CancerFlag,CancerSelected,MetastasisFlag,MetastasisSelected,CancerHistoryFlag,CancerHistorySelected,CancerRecurranceFlag,OtherHealthProblemsSelected,Comments) VALUES('$pid','$currentCancerFlag1','$currentCancerSelected','$MetastasisFlag1','$MetastasisSelected','$CancerFlag1','$CancerSelected','$OtherFlag1','$OtherSelected','$diagnosisComments') ";        
			$result = mysqli_query($conn,$query);
		}
		else
		{
			$query6 = "UPDATE tbldiagnosis SET CancerFlag='$currentCancerFlag1', CancerSelected='$currentCancerSelected', MetastasisFlag='$MetastasisFlag1', MetastasisSelected='$MetastasisSelected', CancerHistoryFlag='$CancerFlag1', CancerHistorySelected='$CancerSelected', CancerRecurranceFlag='$OtherFlag1' , OtherHealthProblemsSelected='$OtherSelected',Comments='$diagnosisComments'  WHERE PatientID='$pid' ";
			$result6 = mysqli_query($conn,$query6);
		}	
	//}
?>