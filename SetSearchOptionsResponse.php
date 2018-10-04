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
		$Relationship_ON = $_POST['Relationship_ON'];
		$Sex_ON = $_POST['Sex_ON'];
		$Age_ON = $_POST['Age_ON'];
		$CurrentCancer_ON = $_POST['CurrentCancer_ON'];
		$CancerStage_ON = $_POST['CancerStage_ON'];
		$MetastasisHistory_ON = $_POST['MetastasisHistory_ON'];
		$MetastasisBodyPart_ON = $_POST['MetastasisBodyPart_ON'];
		$CancerRecurrance_ON = $_POST['CancerRecurrance_ON'];
		$CancerHistory_ON = $_POST['CancerHistory_ON'];
		$OtherHealthProblems_ON = $_POST['OtherHealthProblems_ON'];
		$Chemotherapy_ON = $_POST['Chemotherapy_ON'];
		$ChemotherapySE_ON = $_POST['ChemotherapySE_ON'];
		$OtherDrugs_ON = $_POST['OtherDrugs_ON'];
		$OtherDrugsSE_ON = $_POST['OtherDrugsSE_ON'];
		$Radiation_ON = $_POST['Radiation_ON'];
		$RadiationSE_ON = $_POST['RadiationSE_ON'];
		$Surgery_ON = $_POST['Surgery_ON'];
		$SurgerySE_ON = $_POST['SurgerySE_ON'];
		$Special_ON = $_POST['Special_ON'];
		$SpecialSE_ON = $_POST['SpecialSE_ON'];
		$Complementary_ON = $_POST['Complementary_ON'];
		$ComplementarySE_ON = $_POST['ComplementarySE_ON'];
		$Language_ON = $_POST['Language_ON'];
		$MaritalStatus_ON = $_POST['MaritalStatus_ON'];
		$Children_ON = $_POST['Children_ON'];
		$WorkStatus_ON = $_POST['WorkStatus_ON'];
		$Race_ON = $_POST['Race_ON'];
		$Religion_ON = $_POST['Religion_ON'];
		$Face2Face_ON = $_POST['Face2Face_ON'];
		$SupportType_ON = $_POST['SupportType_ON'];
		$query2 = "SELECT tblsetsearchoptions.PatientID FROM tblsetsearchoptions 
					WHERE tblsetsearchoptions.PatientID='$pid'";
		$result2 = mysqli_query($conn,$query2);
		$row2 = mysqli_fetch_assoc($result2);
		$rows2 = mysqli_num_rows($result2);
		//echo $rows2;
		if($rows2 == 0)
		{
			$query = "INSERT INTO `tblsetsearchoptions`(`PatientID`, `Relationship_ON`, `Sex_ON`, `Age_ON`, `CurrentCancer_ON`, `CancerStage_ON`, `MetastasisHistory_ON`, `MetastasisBodyPart_ON`, `CancerRecurrance_ON`, `CancerHistory_ON`, `OtherHealthProblems_ON`, `Chemotherapy_ON`, `ChemotherapySE_ON`, `OtherDrugs_ON`, `OtherDrugsSE_ON`, `Radiation_ON`, `RadiationSE_ON`, `Surgery_ON`, `SurgerySE_ON`, `Special_ON`, `SpecialSE_ON`, `Complementary_ON`, `ComplementarySE_ON`, `Language_ON`, `MaritalStatus_ON`, `Children_ON`, `WorkStatus_ON`, `Race_ON`, `Religion_ON`, `Face2Face_ON`, `SupportType_ON`) VALUES ('$pid','$Relationship_ON','$Sex_ON','$Age_ON',
			'$CurrentCancer_ON','$CancerStage_ON','$MetastasisHistory_ON','$MetastasisBodyPart_ON','$CancerRecurrance_ON',
			'$CancerHistory_ON','$OtherHealthProblems_ON','$Chemotherapy_ON','$ChemotherapySE_ON','$OtherDrugs_ON',
			'$OtherDrugsSE_ON','$Radiation_ON','$RadiationSE_ON','$Surgery_ON','$SurgerySE_ON','$Special_ON','$SpecialSE_ON',
			'$Complementary_ON','$ComplementarySE_ON','$Language_ON','$MaritalStatus_ON','$Children_ON','$WorkStatus_ON',
			'$Race_ON','$Religion_ON','$Face2Face_ON','$SupportType_ON') ";        
			$result = mysqli_query($conn,$query);
			//echo 'if';
		}
		else
		{
			$query6 = "UPDATE `tblsetsearchoptions` SET `Relationship_ON`='$Relationship_ON',`Sex_ON`='$Sex_ON',`Age_ON`='$Age_ON',`CurrentCancer_ON`='$CurrentCancer_ON',`CancerStage_ON`='$CancerStage_ON',`MetastasisHistory_ON`='$MetastasisHistory_ON',`MetastasisBodyPart_ON`='$MetastasisBodyPart_ON',`CancerRecurrance_ON`='$CancerRecurrance_ON',`CancerHistory_ON`='$CancerHistory_ON',`OtherHealthProblems_ON`='$OtherHealthProblems_ON',`Chemotherapy_ON`='$Chemotherapy_ON',`ChemotherapySE_ON`='$ChemotherapySE_ON',`OtherDrugs_ON`='$OtherDrugs_ON',`OtherDrugsSE_ON`='$OtherDrugsSE_ON',`Radiation_ON`='$Radiation_ON',`RadiationSE_ON`='$RadiationSE_ON',`Surgery_ON`='$Surgery_ON',`SurgerySE_ON`='$SurgerySE_ON',`Special_ON`='$Special_ON',`SpecialSE_ON`='$SpecialSE_ON',`Complementary_ON`='$Complementary_ON',`ComplementarySE_ON`='$ComplementarySE_ON',`Language_ON`='$Language_ON',`MaritalStatus_ON`='$MaritalStatus_ON',`Children_ON`='$Children_ON',`WorkStatus_ON`='$WorkStatus_ON',`Race_ON`='$Race_ON',`Religion_ON`='$Religion_ON',`Face2Face_ON`='$Face2Face_ON',`SupportType_ON`='$SupportType_ON'  WHERE PatientID = '$pid' ";
			$result6 = mysqli_query($conn,$query6);
		}	
	//}
?>