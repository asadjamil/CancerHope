<?php  

	require('connection.php');
	$id = $_POST["id"];
	// build JSON (a format) to return data to form 
	$JSON='{"t" : [';
	
	// get all cancers names from database against tblzlucancers 	
	$query = "SELECT * FROM tblpsychosocialissues WHERE PatientID = '$id' ";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
	$row = mysqli_fetch_assoc($result);
	$LanguageSelected = $row["LanguageSelected"];
	
	// get all cancers names from database against tblzlucancers 	
	$query = "SELECT * FROM tblzlulanguages WHERE id = '$LanguageSelected' ";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
	$row = mysqli_fetch_assoc($result);
	$LanguageName = $row["Name"];

	$JSON.='{"LanguageName" : "'.$LanguageName.'"}';
					
	$JSON.=']}';
	echo $JSON;
?>