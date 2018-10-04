<?php 

	/*
		WHERE FirstName LIKE '%".$_POST["query"]."%'
	*/
	require('connection.php');
	$id = $_POST["id"];
	//$id = 136;
	// build JSON (a format) to return data to form 
	$JSON='{"t" : [';
	//echo $id;
	if(isset($_POST["id"]))
	{
		$query = "SELECT * FROM tblsetsearchoptions WHERE PatientID = '$id' ";
		$result = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($result);
		if($rows == 1)
		{
			
			$row = mysqli_fetch_assoc($result);
			// Caller Details
			$PatientID = $row['PatientID'];
			$Relationship_ON = $row['Relationship_ON'];
			$Sex_ON = $row['Sex_ON'];
			$Age_ON = $row['Age_ON'];
			$CurrentCancer_ON = $row['CurrentCancer_ON'];
			$CancerStage_ON = $row['CancerStage_ON'];
			$MetastasisHistory_ON = $row['MetastasisHistory_ON'];
			$MetastasisBodyPart_ON = $row['MetastasisBodyPart_ON'];
			$CancerRecurrance_ON = $row['CancerRecurrance_ON'];
			$CancerHistory_ON = $row['CancerHistory_ON'];
			$OtherHealthProblems_ON = $row['OtherHealthProblems_ON'];
			$Chemotherapy_ON = $row['Chemotherapy_ON'];
			$ChemotherapySE_ON = $row['ChemotherapySE_ON'];
			$OtherDrugs_ON = $row['OtherDrugs_ON'];
			$OtherDrugsSE_ON = $row['OtherDrugsSE_ON'];
			$Radiation_ON = $row['Radiation_ON'];
			$RadiationSE_ON = $row['RadiationSE_ON'];
			$Surgery_ON = $row['Surgery_ON'];
			$SurgerySE_ON = $row['SurgerySE_ON'];
			$Special_ON = $row['Special_ON'];
			$SpecialSE_ON = $row['SpecialSE_ON'];
			$Complementary_ON = $row['Complementary_ON'];
			$ComplementarySE_ON = $row['ComplementarySE_ON'];
			$Language_ON = $row['Language_ON'];
			$MaritalStatus_ON = $row['MaritalStatus_ON'];
			$Children_ON = $row['Children_ON'];
			$WorkStatus_ON = $row['WorkStatus_ON'];
			$Race_ON = $row['Race_ON'];
			$Religion_ON = $row['Religion_ON'];
			$Face2Face_ON = $row['Face2Face_ON'];
			$SupportType_ON = $row['SupportType_ON'];

			$JSON.='{"PatientID" : "'.$PatientID.'",';
			$JSON.='"Relationship_ON" : "'.$Relationship_ON.'",';
			$JSON.='"Sex_ON" : "'.$Sex_ON.'",';
			$JSON.='"Age_ON" : "'.$Age_ON.'",';
			$JSON.='"CurrentCancer_ON" : "'.$CurrentCancer_ON.'",';
			$JSON.='"CancerStage_ON" : "'.$CancerStage_ON.'",';
			$JSON.='"MetastasisHistory_ON" : "'.$MetastasisHistory_ON.'",';
			$JSON.='"MetastasisBodyPart_ON" : "'.$MetastasisBodyPart_ON.'",';
			$JSON.='"CancerRecurrance_ON" : "'.$CancerRecurrance_ON.'",';
			$JSON.='"CancerHistory_ON" : "'.$CancerHistory_ON.'",';
			$JSON.='"OtherHealthProblems_ON" : "'.$OtherHealthProblems_ON.'",';
			$JSON.='"Chemotherapy_ON" : "'.$Chemotherapy_ON.'",';
			$JSON.='"ChemotherapySE_ON" : "'.$ChemotherapySE_ON.'",';
			$JSON.='"OtherDrugs_ON" : "'.$OtherDrugs_ON.'",';
			$JSON.='"OtherDrugsSE_ON" : "'.$OtherDrugsSE_ON.'",';
			$JSON.='"Radiation_ON" : "'.$Radiation_ON.'",';
			$JSON.='"RadiationSE_ON" : "'.$RadiationSE_ON.'",';
			$JSON.='"Surgery_ON" : "'.$Surgery_ON.'",';
			$JSON.='"SurgerySE_ON" : "'.$SurgerySE_ON.'",';
			$JSON.='"Special_ON" : "'.$Special_ON.'",';
			$JSON.='"SpecialSE_ON" : "'.$SpecialSE_ON.'",';
			$JSON.='"Complementary_ON" : "'.$Complementary_ON.'",';
			$JSON.='"ComplementarySE_ON" : "'.$ComplementarySE_ON.'",';
			$JSON.='"Language_ON" : "'.$Language_ON.'",';
			$JSON.='"MaritalStatus_ON" : "'.$MaritalStatus_ON.'",';
			$JSON.='"Children_ON" : "'.$Children_ON.'",';
			$JSON.='"WorkStatus_ON" : "'.$WorkStatus_ON.'",';
			$JSON.='"Race_ON" : "'.$Race_ON.'",';
			$JSON.='"Religion_ON" : "'.$Religion_ON.'",';
			$JSON.='"Face2Face_ON" : "'.$Face2Face_ON.'",';
			$JSON.='"SupportType_ON" : "'.$SupportType_ON.'"}';
			$JSON.=']}';
			
			
			echo $JSON; 

		}
		else
		{
		 	echo 'false';	
		} 
	}		

?>