<?php  

	require('connection.php');
	$pid = $_POST["pid"];
	//$pid = 113;
	// build JSON (a format) to return data to form 
	$JSON='{"t" : [';
	
	// get all cancers names from database against tblzlucancers 	
	$query = "SELECT * FROM tbltreatmentsideeffects WHERE PatientID = '$pid' ";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
	$row = mysqli_fetch_assoc($result);
	$ChemoFlag = $row['ChemotherapySelected'];
	$SupportFlag = $row['OtherDrugsSelected'];
	$RadiationFlag = $row['RadiationSelected'];
	$SurgeryFlag = $row['SurgerySelected'];
	$SpFlag = $row['SpecialSelected'];
	$CpFlag = $row['ComplementarySelected'];
	$ChemotherapyComments = $row['ChemotherapyComments'];
	$SupportComments = $row['OtherDrugsComments'];
	$RadiationComments = $row['RadiationComments'];
	$SurgeryComments = $row['SurgeryComments'];
	$SpecialComments = $row['SpecialComments'];
	$ComplementaryComments = $row['ComplementaryComments'];
	if($ChemoFlag == 1)
	{
		$ChemoFlag1 = 'Yes';
	}
	else
	{
		$ChemoFlag1 = 'No';
	}
	if($SupportFlag == 1)
	{
		$SupportFlag1 = 'Yes';
	}
	else
	{
		$SupportFlag1 = 'No';
	}
	if($RadiationFlag == 1)
	{
		$RadiationFlag1 = 'Yes';
	}
	else
	{
		$RadiationFlag1 = 'No';
	}
	if($SurgeryFlag == 1)
	{
		$SurgeryFlag1 = 'Yes';
	}
	else
	{
		$SurgeryFlag1 = 'No';
	}
	if($SpFlag == 1)
	{
		$SpFlag1 = 'Yes';
	}
	else
	{
		$SpFlag1 = 'No';
	}
	if($CpFlag == 1)
	{
		$CpFlag1 = 'Yes';
	}
	else
	{
		$CpFlag1 = 'No';
	}

	$JSON.='{"ChemoFlag1" : "'.$ChemoFlag1.'",';
	$JSON.='"SupportFlag1" : "'.$SupportFlag1.'",';
	$JSON.='"RadiationFlag1" : "'.$RadiationFlag1.'",';
	$JSON.='"SurgeryFlag1" : "'.$SurgeryFlag1.'",';
	$JSON.='"SpFlag1" : "'.$SpFlag1.'",';
	$JSON.='"CpFlag1" : "'.$CpFlag1.'",';
	$JSON.='"ChemotherapyComments" : "'.$ChemotherapyComments.'",';
	$JSON.='"SupportComments" : "'.$SupportComments.'",';
	$JSON.='"RadiationComments" : "'.$RadiationComments.'",';
	$JSON.='"SurgeryComments" : "'.$SurgeryComments.'",';
	$JSON.='"SpecialComments" : "'.$SpecialComments.'",';
	$JSON.='"ComplementaryComments" : "'.$ComplementaryComments.'"}';
	$JSON.=']}';
	echo $JSON;
?>