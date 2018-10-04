<?php
	require('connection.php');
	//if(isset($_POST['pid']) && isset($_POST['diagnosisComments']))
	//{
		// Comments need be done so replace comments string in 
	/*  ChemoFlag represents ChemoSelected Flag in tbltreatmentsideeffects
		ChemoSelected represents ChemoSESelected and ChemoSEComments in tbltreatmentsideeffects
		So (Support,Radiation,Surgery,Sp,Cp)Flag represents (Support,Radiation,Surgery,Sp,Cp)Selected in tbltreatmentsideeffects
		(Support,Radiation,Surgery,Sp,Cp)Selected represents (Support,Radiation,Surgery,Sp,Cp)SESelected 
		and (Support,Radiation,Surgery,Sp,Cp)SEComments 
		if(Support,Radiation,Surgery,Sp,Cp)Selected = 1 then (Support,Radiation,Surgery,Sp,Cp)SESelected = 1 
		and (Support,Radiation,Surgery,Sp,Cp)SEComments = 1
	*/
		$pid = $_POST['pid'];
		$ChemoFlag = $_POST['ChemoFlag'];
		$SupportFlag = $_POST['SupportFlag'];
		$RadiationFlag = $_POST['RadiationFlag'];
		$SurgeryFlag = $_POST['SurgeryFlag'];
		$SpFlag = $_POST['SpFlag'];
		$CpFlag = $_POST['CpFlag'];
		$ChemoSelected = $_POST['ChemoSelected'];
		$SupportSelected = $_POST['SupportSelected'];
		$RadiationSelected = $_POST['RadiationSelected'];
		$SurgerySelected = $_POST['SurgerySelected'];	
		$SpSelected = $_POST['SpSelected'];
		$CpSelected = $_POST['CpSelected'];
		$ChemoComments = $_POST['ChemoComments'];
		$SupportComments = $_POST['SupportComments'];
		$RadiationComments = $_POST['RadiationComments'];
		$SurgeryComments = $_POST['SurgeryComments'];
		$SpComments = $_POST['SpComments'];
		$CpComments = $_POST['CpComments'];
		echo $ChemoFlag;
		$query2 = "SELECT tbltreatmentsideeffects.PatientID FROM tbltreatmentsideeffects 
					WHERE tbltreatmentsideeffects.PatientID='$pid'";
		$result2 = mysqli_query($conn,$query2);
		$row2 = mysqli_fetch_assoc($result2);
		$rows2 = mysqli_num_rows($result2);
		
		if($rows2 == 0)
		{
			$query = "INSERT INTO `tbltreatmentsideeffects`(`PatientID`, `ChemotherapySelected`, `ChemotherapySESelected`,
				 `ChemotherapyComments`, `OtherDrugsSelected`, `OtherDrugsSESelected`, `OtherDrugsComments`, `RadiationSelected`, 
			    `RadiationSESelected`, `RadiationComments`, `SurgerySelected`, `SurgerySESelected`, `SurgeryComments`, 
			    `SpecialSelected`, `SpecialSESelected`, `SpecialComments`, `ComplementarySelected`, `ComplementarySESelected`,
			  	`ComplementaryComments`) VALUES ('$pid','$ChemoFlag','$ChemoSelected','$ChemoComments','$SupportFlag',
			  	'$SupportSelected','$SupportComments','$RadiationFlag','$RadiationSelected','$RadiationComments','$SurgeryFlag',
			  	'$SurgerySelected','$SurgeryComments','$SpFlag','$SpSelected','$SpComments','$CpFlag','$CpSelected','$CpComments') ";        
			$result = mysqli_query($conn,$query);
		}
		else
		{
			$query6 = "UPDATE `tbltreatmentsideeffects` SET `ChemotherapySelected`='$ChemoFlag',
				`ChemotherapySESelected`='$ChemoSelected',`ChemotherapyComments`='$ChemoComments',
				`OtherDrugsSelected`='$SupportFlag',`OtherDrugsSESelected`='$SupportSelected',`OtherDrugsComments`='$SupportComments',`RadiationSelected`='$RadiationFlag',`RadiationSESelected`='$RadiationSelected',
					`RadiationComments`='$RadiationComments',`SurgerySelected`='$SurgeryFlag',
					`SurgerySESelected`='$SurgerySelected',`SurgeryComments`='$SurgeryComments',`SpecialSelected`='$SpFlag',
					`SpecialSESelected`='$SpSelected',`SpecialComments`='$SpComments',`ComplementarySelected`='$CpFlag',
					`ComplementarySESelected`='$CpSelected',`ComplementaryComments`='$CpComments' WHERE PatientID = '$pid' ";
			$result6 = mysqli_query($conn,$query6);
		}	
	//}
?>