<?php 
	require('connection.php');

	// Delete from tblinformation (Demographics form)
	$pid = $_POST['pid'];
	$query1 = "DELETE FROM tblinformation WHERE PatientID = '$pid' ";
	$result1 = mysqli_query($conn,$query1);

	// Delete from tbldiagnosis (Diagnosis form)
	$query2 = "DELETE FROM tbldiagnosis WHERE PatientID = '$pid' ";
	$result2 = mysqli_query($conn,$query2);	

	// Delete from tblcancers (Diagnosis form)
	$query3 = "DELETE FROM tblcancers WHERE PatientID = '$pid' ";
	$result3 = mysqli_query($conn,$query3);

	// Delete from tblmetastasis (Diagnosis form)
	$query4 = "DELETE FROM tblmetastasis WHERE PatientID = '$pid' ";
	$result4 = mysqli_query($conn,$query4);

	// Delete from tblcancerhistory (Diagnosis form)
	$query5 = "DELETE FROM tblcancerhistory WHERE PatientID = '$pid' ";
	$result5 = mysqli_query($conn,$query5);

	// Delete from tblotherhistory (Diagnosis form)
	$query6 = "DELETE FROM tblotherhistory WHERE PatientID = '$pid' ";
	$result6 = mysqli_query($conn,$query6);

	// Delete from tbltreatmentsideeffects (Treatment form)
	$query7 = "DELETE FROM tbltreatmentsideeffects WHERE PatientID = '$pid' ";
	$result7 = mysqli_query($conn,$query7);

	// Delete from tblchemotherapy (Treatment form)
	$query8 = "DELETE FROM tblchemotherapy WHERE PatientID = '$pid' ";
	$result8 = mysqli_query($conn,$query8);

	// Delete from tblotherdrugs (Treatment form)
	$query9 = "DELETE FROM tblotherdrugs WHERE PatientID = '$pid' ";
	$result9 = mysqli_query($conn,$query9);

	// Delete from tblradiation (Treatment form)
	$query10 = "DELETE FROM tblradiation WHERE PatientID = '$pid' ";
	$result10 = mysqli_query($conn,$query10);

	// Delete from tblsurgery (Treatment form)
	$query11 = "DELETE FROM tblsurgery WHERE PatientID = '$pid' ";
	$result11 = mysqli_query($conn,$query11);	

	// Delete from tblspecial (Treatment form)
	$query12 = "DELETE FROM tblspecial WHERE PatientID = '$pid' ";
	$result12 = mysqli_query($conn,$query12);

	// Delete from tblcomplementary (Treatment form)
	$query13 = "DELETE FROM tblcomplementary WHERE PatientID = '$pid' ";
	$result13 = mysqli_query($conn,$query13);

	// Delete from tblpsychosocialissues (psychosocialissues form)
	$query14 = "DELETE FROM tblpsychosocialissues WHERE PatientID = '$pid' ";
	$result14 = mysqli_query($conn,$query14);

	// Delete from tblsetsearchoptions
	$query15 = "DELETE FROM tblsetsearchoptions WHERE PatientID = '$pid' ";
	$result15 = mysqli_query($conn,$query15);

	// Delete from tblpatient2counsel
	$query16 = "DELETE FROM tblpatient2counsel WHERE PatientID = '$pid' ";
	$result16 = mysqli_query($conn,$query16);

	// Delete from tblinactivedates
	$query17 = "DELETE FROM tblinactivedates WHERE PatientID = '$pid' ";
	$result17 = mysqli_query($conn,$query17);


?>