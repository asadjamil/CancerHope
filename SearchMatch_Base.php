<?php
	require('connection.php');
	$pid = $_POST['id'];
	/*$Relationship_ON = $_POST['Relationship_ON']; 
	$Sex_ON = $_POST['Sex_ON'];
	$Age_ON = $_POST['Age_ON'];*/

	//Variables for Diagnosis Options

	/*$CC_ON = $_POST['CurrentCancer_ON'];
	$CS_ON = $_POST['CancerStage_ON'];
	$MH_ON = $_POST['MetastasisHistory_ON'];
	$MBP_ON = $_POST['MetastasisBodyPart_ON'];
	$CR_ON = $_POST['CancerRecurrance_ON'];
	$CH_ON = $_POST['CancerHistory_ON'];
	$OHP_ON = $_POST['OtherHealthProblems_ON'];*/
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
	/*$LANG_ON = $_POST['Language_ON'];
	$MS_ON = $_POST['MaritalStatus_ON'];
	$CHILD_ON = $_POST['Children_ON'];
	$WS_ON = $_POST['WorkStatus_ON'];
	$RACE_ON = $_POST['Race_ON'];
	$REL_ON = $_POST['Religion_ON'];
	$FTF_ON = $_POST['Face2Face_ON'];
	$ST_ON = $_POST['SupportType_ON'];*/

	//$query4 = "SELECT tblchemotherapy.PatientID AS chPatientID, tblchemotherapy.TreatmentTypeID AS chTreatmentTypeID, tblchemotherapy.SideEffectID AS chSideEffectID, tblotherdrugs.PatientID AS odPatientID, tblotherdrugs.TreatmentTypeID AS odTreatmentTypeID, tblotherdrugs.SideEffectID AS odSideEffectID, tblradiation.PatientID AS radPatientID, tblradiation.TreatmentTypeID AS radTreatmentTypeID, tblradiation.SideEffectID AS radSideEffectID, tblsurgery.PatientID AS sgPatientID, tblsurgery.TreatmentTypeID AS sgTreatmentTypeID, tblsurgery.SideEffectID AS sgSideEffectID, tblspecial.PatientID AS spPatientID, tblspecial.TreatmentTypeID AS spTreatmentTypeID, tblspecial.SideEffectID AS spSideEffectID, tblcomplementary.PatientID AS cmpPatientID, tblcomplementary.TreatmentTypeID AS cmpTreatmentTypeID, tblcomplementary.SideEffectID AS cmpSideEffectID FROM tblchemotherapy, tblotherdrugs, tblradiation, tblsurgery, tblspecial, tblcomplementary WHERE tblchemotherapy.PatientID = '$pid' AND tblotherdrugs.PatientID = '$pid' AND tblradiation.PatientID = '$pid' AND tblsurgery.PatientID = '$pid' AND tblspecial.PatientID = '$pid' AND tblcomplementary.PatientID = '$pid'";
	$query4 = "SELECT tblchemotherapy.PatientID AS chPatientID, tblchemotherapy.TreatmentTypeID AS chTreatmentTypeID, tblchemotherapy.SideEffectID AS chSideEffectID, tblotherdrugs.PatientID AS odPatientID, tblotherdrugs.TreatmentTypeID AS odTreatmentTypeID, tblotherdrugs.SideEffectID AS odSideEffectID, tblradiation.PatientID AS radPatientID, tblradiation.TreatmentTypeID AS radTreatmentTypeID, tblradiation.SideEffectID AS radSideEffectID, tblsurgery.PatientID AS sgPatientID, tblsurgery.TreatmentTypeID AS sgTreatmentTypeID, tblsurgery.SideEffectID AS sgSideEffectID, tblspecial.PatientID AS spPatientID, tblspecial.TreatmentTypeID AS spTreatmentTypeID, tblspecial.SideEffectID AS spSideEffectID, tblcomplementary.PatientID AS cmpPatientID, tblcomplementary.TreatmentTypeID AS cmpTreatmentTypeID, tblcomplementary.SideEffectID AS cmpSideEffectID FROM tblchemotherapy, tblotherdrugs, tblradiation, tblsurgery, tblspecial, tblcomplementary WHERE tblchemotherapy.PatientID = '$pid'";
	$result4 = mysqli_query($conn,$query4);	
	$row4 = mysqli_fetch_assoc($result4);
	
	$chPatientID = $row4['chPatientID'];
	$chTreatmentTypeID = $row4['chTreatmentTypeID'];
	$chSideEffectID = $row4['chSideEffectID'];

	$odPatientID = $row4['odPatientID'];
	$odTreatmentTypeID = $row4['odTreatmentTypeID'];
	$odSideEffectID = $row4['odSideEffectID'];

	$radPatientID = $row4['radPatientID'];
	$radTreatmentTypeID = $row4['radTreatmentTypeID'];
	$radSideEffectID = $row4['radSideEffectID'];

	$sgPatientID = $row4['sgPatientID'];
	$sgTreatmentTypeID = $row4['sgTreatmentTypeID'];
	$sgSideEffectID = $row4['sgSideEffectID'];

	$spPatientID = $row4['spPatientID'];
	$spTreatmentTypeID = $row4['spTreatmentTypeID'];
	$spSideEffectID = $row4['spSideEffectID'];

	$cmpPatientID = $row4['cmpPatientID'];
	$cmpTreatmentTypeID = $row4['cmpTreatmentTypeID'];
	$cmpSideEffectID = $row4['cmpSideEffectID'];
	
	//TREATMENT SIDE EFFECTS Comparision Query
	$query5 = "SELECT tblinformation.PatientTypeID AS iPatientTypeID ";
	if($C_ON == 1)
	{
		$query5 .= ", tblchemotherapy.PatientID AS chPatientID, tblchemotherapy.TreatmentTypeID "; 
	}
	if($CSE_ON == 1)
	{
		$query5 .= ", tblchemotherapy.SideEffectID ";
	}
	if($OD_ON == 1)
	{
		$query5 .= ", tblotherdrugs.PatientID AS odPatientID, tblotherdrugs.TreatmentTypeID "; 
	}
	if($ODSE_ON == 1)
	{
		$query5 .= ", tblotherdrugs.SideEffectID ";
	}
	if($RAD_ON == 1)
	{
		$query5 .= ", tblradiation.PatientID AS radPatientID, tblradiation.TreatmentTypeID "; 
	}
	if($RSE_ON == 1)
	{
		$query5 .= ", tblradiation.SideEffectID ";
	}
	if($SG_ON == 1)
	{
		$query5 .= ", tblsurgery.PatientID AS sgPatientID, tblsurgery.TreatmentTypeID "; 
	}
	if($SSE_ON == 1)
	{
		$query5 .= ", tblsurgery.SideEffectID ";
	}
	if($SP_ON == 1)
	{
		$query5 .= ", tblspecial.PatientID AS spPatientID, tblspecial.TreatmentTypeID "; 
	}
	if($SPSE_ON == 1)
	{
		$query5 .= ", tblspecial.SideEffectID ";
	}
	if($COMP_ON == 1)
	{
		$query5 .= ", tblcomplementary.PatientID AS cmpPatientID, tblcomplementary.TreatmentTypeID "; 
	}
	if($COMPSE_ON == 1)
	{
		$query5 .= ", tblcomplementary.SideEffectID ";
	}

	$query5 .= "FROM tblinformation, tblchemotherapy, tblotherdrugs, tblradiation, tblsurgery, tblspecial, tblcomplementary WHERE tblinformation.PatientTypeID = 2 ";

	if($C_ON == 1)
	{
		$query5 .= "AND tblchemotherapy.TreatmentTypeID = $chTreatmentTypeID "; 
	}
	if($CSE_ON == 1)
	{
		$query5 .= "AND tblchemotherapy.SideEffectID = $chSideEffectID "; 
	}
	if($OD_ON == 1)
	{
		$query5 .= "AND tblotherdrugs.TreatmentTypeID = $odTreatmentTypeID "; 
	}
	if($ODSE_ON == 1)
	{
		$query5 .= "AND tblotherdrugs.SideEffectID = $odSideEffectID "; 
	}
	if($RAD_ON == 1)
	{
		$query5 .= "AND tblradiation.TreatmentTypeID = $radTreatmentTypeID "; 
	}
	if($RSE_ON == 1)
	{
		$query5 .= "AND tblradiation.SideEffectID = $radSideEffectID "; 
	}
	if($SG_ON == 1)
	{
		$query5 .= "AND tblsurgery.TreatmentTypeID = $sgTreatmentTypeID "; 
	}
	if($SSE_ON == 1)
	{
		$query5 .= "AND tblsurgery.SideEffectID = $sgSideEffectID "; 
	}
	if($SP_ON == 1)
	{
		$query5 .= "AND tblspecial.TreatmentTypeID = $spTreatmentTypeID "; 
	}
	if($SPSE_ON == 1)
	{
		$query5 .= "AND tblspecial.SideEffectID = $spSideEffectID "; 
	}
	if($COMP_ON == 1)
	{
		$query5 .= "AND tblcomplementary.TreatmentTypeID = $cmpTreatmentTypeID "; 
	}
	if($COMPSE_ON == 1)
	{
		$query5 .= "AND tblcomplementary.SideEffectID = $cmpSideEffectID "; 
	}

	echo $query5;
	/*$result5 = mysqli_query($conn,$query5);	
	$rows5 = mysqli_num_rows($result5);	
	for ($i=0; $i<$rows5; $i++)
	{
		$row5 = mysqli_fetch_assoc($result5);
		$SupportIDchm = $row5['chPatientID'];
		$SupportIDod = $row5['odPatientID'];
		$SupportIDrad = $row5['radPatientID'];
		$SupportIDsg = $row5['sgPatientID'];
		$SupportIDsp = $row5['spPatientID'];
		$SupportIDcmp = $row5['cmpPatientID'];
		
		echo $SupportIDchm;
		echo $SupportIDod;
		echo $SupportIDrad;
		echo $SupportIDsg;
		echo $SupportIDsp;
		echo $SupportIDcmp;
		
	}*/

	

	
	
?>