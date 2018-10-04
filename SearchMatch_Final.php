<?php
	require('connection.php');

	$pid = $_POST['id'];
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
	//$ST_ON=2;
	
	$qur="Select Age,gender,RelationID from tblInformation where PatientID='$pid'";
 	$result=mysqli_query($conn,$qur);
 	$row=mysqli_fetch_row($result);
 	$qurey1="";
 	if($ST_ON==2)
 	{
 		$qurey1="select dPID from baseview1 WHERE dpid!='$pid' ";
 	}
 	else if($ST_ON==3)
 	{
 		$qurey1="SELECT dPID FROM `baseview3`  WHERE dpid!='$pid' ";
 	}

 	else if($ST_ON==4)
 	{
 		$qurey1="SELECT dPID FROM `baseview4` WHERE dpid!='$pid' ";
 	}

 	
 	
 	if($Relationship_ON ==1){
 		$qurey1 .="AND RelationID='$row[2]' ";
 	}
 	if($Sex_ON ==1){
 		$qurey1 .="AND Gender='$row[1]' ";
 	}
 	if($Age_ON ==1){
 		$sp=$row[0]/10;
 	 	$ages=(int)$sp;
 	 	$ages=$ages*10;
 		$agee=$ages+9;
 		$qurey1 .="AND dAGE>='$ages' AND dAGE<='$agee' ";
 	}
 	

 	if($CC_ON== 1)
 	{
 		 $qurey1 .="AND diCF='1' ";
 	}

 	if ($MH_ON== 1)
 	{
 		 $qurey1 .="AND diMF='1' ";
 	}

 	if($CH_ON== 1)
 	{
 		$qurey1 .="AND dicHF='1' ";
 	}

 	if($CR_ON== 1)
 	{
 		$qurey1 .="AND diCRF='1' ";
 	}

 	if($OHP_ON== 1)
 	{
 		 $qurey1 .="AND diOHPF='1' ";
 	}

 	if($C_ON== 1)
 	{
 		$qurey1 .="AND tCS='1' ";
 	}

 	
 	if($CSE_ON== 1)
 	{
 		$qurey1 .="AND tCSEs='1' ";
 	} 	

	

 	if($OD_ON== 1)
 	{
 		$qurey1 .="AND tODS='1' ";
 	}
 	if($ODSE_ON== 1)
 	{
 		$qurey1 .="AND tODSEs='1' ";
 	}

	if($RAD_ON== 1)
 	{
 		$qurey1 .="AND tRS='1' ";
 	}

 	if($RSE_ON== 1)
 	{
 		 $qurey1 .="AND tRSEs='1' ";

 	}
 	if($SG_ON== 1)
 	{
 		 $qurey1 .="AND tSS='1' ";

 	}
 	if($SSE_ON== 1)
 	{
 		 $qurey1 .="AND tSSEs='1' ";
 	}



 	if($SP_ON== 1)
 	{
 		 $qurey1 .="AND tSpS='1' ";
 	}
	if($SPSE_ON== 1)
 	{
 		 $qurey1 .="AND tSpSEs='1' ";
 	}

	if($COMP_ON== 1)
 	{
 		 $qurey1 .="AND tCmpS='1' ";
 	}
	if($COMPSE_ON== 1)
 	{
 		 $qurey1 .="AND tCmpSEs='1' ";
 	}

 	if($LANG_ON== 1)
 	{
 		 $qurey1 .="AND pLS='1' ";
 	}
	if($MS_ON == 1)
	{
		 $qurey1 .="AND pMSID='1' ";
	}
	if($CHILD_ON == 1)
	{
		 $qurey1 .="AND pCS='1' ";
	}
	if($WS_ON == 1)
	{
		 $qurey1 .="AND pWF='1' ";
	}
	if($RACE_ON == 1)
	{
		$sql = "SELECT tblpsychosocialissues.RaceID FROM tblpsychosocialissues WHERE PatientID = '$pid' ";
		$r=mysqli_query($conn,$sql);
		$RaceID = mysqli_fetch_row($r);

		 $qurey1 .="AND pRID='$RaceID[0]' ";
	}
	if($REL_ON == 1)
	{
		$sql = "SELECT tblpsychosocialissues.ReligionID FROM tblpsychosocialissues WHERE PatientID = '$pid' ";
		$r=mysqli_query($conn,$sql);
		$ReligionID = mysqli_fetch_row($r);
		$qurey1 .="AND pRLID='$ReligionID[0]' ";
	}
	if($FTF_ON == 1) 
	{
		 $qurey1 .="AND pFFF='1' ";
	}
	//echo $qurey1;
	$counselID=array();
 	$x=0;
	$res2=mysqli_query($conn,$qurey1) or die ("QUREY FAILED!!!".mysqli_error());
 	
 	$data1=mysqli_fetch_all($res2);
 	if(empty($data1))
 	{
 		echo "NO RECORD FOUND";
 	}
 	
 	else
 	{
 		foreach($data1 as $i)
 		{
	 		$cancer=1;
	 		$meta=1;
	 		$canhis=1;
	 		$otherhis=1;
	 		$chemo=1;
	 		$otherd=1;
	 		$rad=1;
	 		$sur=1;
	 		$sp=1;
	 		$comp=1;
	 		$lang=1;
	 		$marital=1;
	 		$work=1;
	 		$f2f=1;
	 		$child=1;
	 		$race=1;
	 		$reg=1;
	 		$sid=$i[0];
	 		if($CC_ON==1 || $CS_ON==1)
	 		{
		 		
		 		$qur1="SELECT * FROM `tblcancers` WHERE PatientID='$pid';";

				$qur2="SELECT * FROM `tblcancers` WHERE PatientID='$sid';";

				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
					if($row1[$i][2]==$row2[$i][2] && $CS_ON!=1)
					{
						//echo "Cancer FOUND <br>";
						$cancer=1;
						//echo $sid;
					}
					else if($row1[$i][3]==$row2[$i][3] && $CC_ON!=1)
					{
							$cancer=1;
					}
					else if($row1[$i][2]==$row2[$i][2] && $row1[$i][3]==$row2[$i][3])
					{
						//echo "Cancer found with Cancer stage <br> ";
						$cancer=1;
						//echo $sid;
					}
					else
					{
						//echo "Cancer Dont match";
						$cancer=-1;
					}
					$i=$i+1;
				}
			}
			if($MBP_ON==1)
			{
				
		 		$qur1="SELECT * FROM `tblmetastasis` WHERE PatientID='$pid';";

				$qur2="SELECT * FROM `tblmetastasis` WHERE PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
					if($row1[$i][2]==$row2[$i][2])
					{
						$meta=1;
						//echo "Metastasis Body part matched";
						//echo $sid;
					}
					else
					{
						//echo "Metastasis body part not matched";
						$meta=-1;
					}
				}
			}
			if($CH_ON==1)
			{
				$qur1="SELECT * FROM `tblcancerhistory` WHERE PatientID='$pid';";

				$qur2="SELECT * FROM `tblcancerhistory` WHERE PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{

					if($row1[$i][2]==$row2[$i][2])
					{
						$canhis=1;
						//echo "Cancer History Cancer id matched";
						//echo $sid;
					}
					else
					{
						//echo "Cancer history Cancer id no matched";
						$canhis=-1;
					}
				}
			}
			if($OHP_ON==1)
			{
				$qur1="SELECT * FROM `tblotherhistory` WHERE PatientID='$pid';";

				$qur2="SELECT * FROM `tblotherhistory` WHERE  PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
					if($row1[$i][2]==$row2[$i][2])
					{
						$otherhis=1;
						//echo "Other History  matched";
						//echo $sid;
					}
					else
					{
						//echo "Other history  not matched";
						$otherhis=-1;
					}
				}
			}
			if($C_ON==1 || $CSE_ON==1)
			{
				$qur1="SELECT * FROM `tblchemotherapy` WHERE PatientID='$pid';";

				$qur2="SELECT * FROM `tblchemotherapy` WHERE  PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
					if($row1[$i][2]==$row2[$i][2]  && $CSE_ON!=1)
					{
						$CHemo=1;
						//echo "Chemotherapy Selected and matched";
						//echo $sid;
					}
					else if($row1[$i][4]==$row2[$i][4] && $CS_ON!=1)
					{
						$CHemo=1;
						//echo "Chemotherapy not Selected and Side effect matched";
						//echo $sid;
					}
					else if($row1[$i][2]==$row2[$i][2] && $row1[$i][4]==$row2[$i][4])
					{
						$CHemo=1;
						//echo "Chemotherapy Both selected";
						//echo $sid;
					}
					else
					{
						//echo "Chemotherapy not selected";
						$CHemo=-1;
					}
				}
			}

			if($OD_ON==1 || $ODSE_ON==1)
			{
				$qur1="SELECT * FROM `tblotherdrugs`  WHERE PatientID='$pid';";

				$qur2="SELECT * FROM `tblotherdrugs`  WHERE  PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
					if($row1[$i][2]==$row2[$i][2]  && $ODSE_ON!=1)
					{
						$otherd=1;
						//echo "otherdrugs Selected and matched";
						//echo $sid;
					}
					else if($row1[$i][4]==$row2[$i][4] && $OD_ON!=1)
					{
						$otherd=1;
						//echo "Cohterdrugs not Selected and Side effect matched";
						//echo $sid;
					}
					else if($row1[$i][2]==$row2[$i][2] && $row1[$i][4]==$row2[$i][4])
					{
						$otherd=1;
						//echo "otherdrugs Both selected";
						//echo $sid;
					}
					else
					{
						//echo "otherdrugs not selected";
						$otherd=-1;
					}
				}
			}

			if($RAD_ON==1 || $RSE_ON==1)
			{
				$qur1="SELECT * FROM `tblradiation`  WHERE PatientID='$pid';";

				$qur2="SELECT * FROM `tblradiation`  WHERE  PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
				if($row1[$i][2]==$row2[$i][2]  && $row1[$i][3]==$row2[$i][3] && $RSE_ON!=1)
				{
					$rad=1;
					//echo "rad Selected and matched";
					//echo $sid;
				}
				else if($row1[$i][5]==$row2[$i][5] && $row1[$i][3]==$row2[$i][3] && $RAD_ON!=1)
				{
					$rad=1;
					//echo "rad not Selected and Side effect matched";
					//echo $sid;
				}
				else if($row1[$i][2]==$row2[$i][2] && $row1[$i][5]==$row2[$i][5] && $row1[$i][3]==$row2[$i][3])
				{
					$rad=1;
					//echo "rad Both selected";
					//echo $sid;
				}
				else
				{
					//echo "rad not selected";
					$rad=-1;
				}
			}
			}

			if($SG_ON==1 || $SSE_ON==1)
			{
				$qur1="SELECT * FROM `tblsurgery`  WHERE PatientID='$pid';";

				$qur2="SELECT * FROM `tblsurgery` WHERE  PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
				if($row1[$i][2]==$row2[$i][2]  && $SSE_ON!=1)
				{
					//echo "Surgery Selected and matched";
					//echo $sid;
					$sur=1;
				}
				else if($row1[$i][4]==$row2[$i][4] && $SG_ON!=1)
				{
					//echo "Surgery not Selected and Side effect matched";
					//echo $sid;
					$sur=1;
				}
				else if($row1[$i][2]==$row2[$i][2] && $row1[$i][4]==$row2[$i][4])
				{
					//echo "Surgery Both selected";
					//echo $sid;
					$sur=1;
				}
				else
				{
					//echo "Surgery not selected";
					$sur=-1;
				}
			}

			}
			if($SP_ON==1 || $SPSE_ON==1)
			{
				$qur1="SELECT * FROM `tblspecial`  WHERE PatientID='$pid';";

				$qur2="SELECT * FROM `tblspecial` WHERE  PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
					if($row1[$i][2]==$row2[$i][2]  && $SPSE_ON!=1)
					{
						$sp=1;
						//echo "Special Selected and matched";
						//echo $sid;
					}
					else if($row1[$i][4]==$row2[$i][4] && $SP_ON!=1)
					{
						$sp=1;
						//echo "Special not Selected and Side effect matched";
						//echo $sid;
					}
					else if($row1[$i][2]==$row2[$i][2] && $row1[$i][4]==$row2[$i][4])
					{
						$sp=1;
						//echo "Specail Both selected";
						//echo $sid;
					}
					else
					{
						//echo "Special not selected";
						$sp=-1;
					}
				}
			}
			if($COMP_ON==1 || $COMPSE_ON==1)
			{
				$qur1="SELECT * FROM `tblcomplementary`  WHERE PatientID='$pid';";

				$qur2="SELECT * FROM `tblcomplementary` WHERE  PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
					if($row1[$i][2]==$row2[$i][2]  && $COMPSE_ON!=1)
					{
						//echo "COMP Selected and matched";
						//echo $sid;
						$comp=1;
					}
					else if($row1[$i][4]==$row2[$i][4] && $COMP_ON!=1)
					{
						//echo "COMP not Selected and Side effect matched";
						//echo $sid;
						$comp=1;
					}
					else if($row1[$i][2]==$row2[$i][2] && $row1[$i][4]==$row2[$i][4])
					{
						//echo "COMP Both selected";
						//echo $sid;
						$comp=1;
					}
					else
					{
						//echo "COMP not selected";
						$comp=-1;
					}
				}
			}

			if($LANG_ON ==1)
			{
				$qur1="SELECT * FROM `tblpsychosocialissues`  WHERE PatientID='$pid';";
				$qur2="SELECT * FROM `tblpsychosocialissues` WHERE  PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
					if($row1[$i][1]==$row2[$i][1])
					{
							$lang=1;
					}
					else
					{
						$lang=-1;
					}
				}
			}
			if( $MS_ON ==1)
			{
				$qur1="SELECT * FROM `tblpsychosocialissues`  WHERE PatientID='$pid';";
				$qur2="SELECT * FROM `tblpsychosocialissues` WHERE  PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
					 if($row1[$i][3]==$row2[$i][3] )
					{
						$marital=1;
					}
					else
					{
						$marital=-1;
					}
				}
			}
			if($CHILD_ON ==1)
			{
				$qur1="SELECT * FROM `tblpsychosocialissues`  WHERE PatientID='$pid';";
				$qur2="SELECT * FROM `tblpsychosocialissues` WHERE  PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
					if($row1[$i][4]==$row2[$i][4])
					{
						$child=1;
					}
					else
					{
						$child=-1;
					}
				}
			}
			if( $WS_ON ==1)
			{
				$qur1="SELECT * FROM `tblpsychosocialissues`  WHERE PatientID='$pid';";
				$qur2="SELECT * FROM `tblpsychosocialissues` WHERE  PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
					if($row1[$i][6]==$row2[$i][6] && $LANG_ON !=1 && $CHILD_ON !=1 && $MS_ON !=1 && $RACE_ON !=1 && $REL_ON !=1 && $FTF_ON !=1)
					{
						$work=1;
					}
					else
					{
						$work=-1;
					}
				}
			}
			/*if( $RACE_ON ==1)
			{
				$qur1="SELECT * FROM `tblpsychosocialissues`  WHERE PatientID='$pid';";
				$qur2="SELECT * FROM `tblpsychosocialissues` WHERE  PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
					 if($row1[$i][7]==$row2[$i][7])
					{
						$race=1;
					}
					else
					{
						$race=-1;
					}
				}
			}*/
			/*if( $REL_ON ==1)
			{
				$qur1="SELECT * FROM `tblpsychosocialissues`  WHERE PatientID='$pid';";
				$qur2="SELECT * FROM `tblpsychosocialissues` WHERE  PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
					 if($row1[$i][8]==$row2[$i][8] && $LANG_ON !=1 && $CHILD_ON !=1 && $WS_ON !=1 && $RACE_ON !=1 && $MS_ON !=1 && $FTF_ON !=1)
					{
						$reg=1;
					}
					else
					{
						$reg=-1;
					}
				}
			}*/
			if( $FTF_ON ==1)
			{
				$qur1="SELECT * FROM `tblpsychosocialissues`  WHERE PatientID='$pid';";
				$qur2="SELECT * FROM `tblpsychosocialissues` WHERE  PatientID='$sid';";
				$res1=mysqli_query($conn,$qur1);
				$res2=mysqli_query($conn,$qur2);
				$row1=mysqli_fetch_all($res1);
				$row2=mysqli_fetch_all($res2);
				for($i=0;!empty($row1[$i]) AND !empty($row2[$i]);$i=$i+1)
				{
					if($row1[$i][9]==$row2[$i][9] )
					{
						$f2f=1;
					}
					else
					{
						$f2f=-1;
					}
				}
			}

			if($cancer==1 && $meta==1 && $canhis==1 && $otherhis==1 && $chemo==1 && $otherd==1 && $rad==1 && $sur==1 && $sp==1 && $comp==1 && $lang==1 && $marital==1 && $work==1 && $f2f==1 && $child==1 && $race==1 && $reg==1)
			{
				$counselID[$x]=$sid;
				$x=$x+1;
			}
		}
	}

	foreach($counselID as $i)
	{
		//echo $i;
		$sql = "SELECT  tblinformation.PatientID, tblinformation.FirstName, tblinformation.LastName, tblinformation.PreferredActivityLevel FROM tblinformation WHERE tblinformation.PatientID = '$i' ";
		$res1=mysqli_query($conn,$sql);
		$row1=mysqli_fetch_row($res1);
		$CounselID = $row1[0];
		$SupportName = $row1[1] . ' ' . $row1[2]; 
		$PreferredActivityLevel = $row1[3];
		// Other Params
		$val = 0;
		//$val++;
	?>
	<tr>
		<td>
			<!--
			<div id="m_terminate<?php //echo $CounselID ?>" class="checkbox checkbox-replace color-blue"> 
                <label class="cb-wrapper">
                    <input type="checkbox" id="mc_terminate">
                    <div class="checked"></div>
                </label> 
            </div>
        	-->
        	<button id="addBtn" class="btn btn-info btn-sm" type="button">
            	<i class="entypo-plus-circled"></i>
            </button>
		</td>
		<td>
			<!--
			<div id="m_match<?php //echo $CounselID?>" class="checkbox checkbox-replace color-blue"> 
                <label class="cb-wrapper">
                    <input type="checkbox" id="mc_match">
                    <div class="checked"></div>
                </label> 
            </div>
        	-->
        	<!-- Send CounselID as $id in AddMatchFlag()-->
        	<button id="addBtn" class="btn btn-info btn-sm" type="button" onclick="AddMatchFlag(<?php echo $i ?>);">
            	<i class="entypo-plus-circled"></i>
            </button>

		</td>
		<td>
			<!--
			<div id="m_link<?php //echo $CounselID?>" class="checkbox checkbox-replace color-blue"> 
                <label class="cb-wrapper">
                    <input type="checkbox" id="mc_link">
                    <div class="checked"></div>
                </label>
            </div>
        	-->
        	<!-- Send CounselID as $id in AddMatchFlag()-->
        	<button id="addBtn" class="btn btn-info btn-sm" type="button" onclick="AddLinkFlag(<?php echo $i ?>);">
            	<i class="entypo-plus-circled"></i>
            </button>

		</td>
		<td><?php echo $SupportName ?></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td><?php echo $PreferredActivityLevel ?></td>
		<?php 
			// if ST_ON == 2 means PatientSupport so Display its View 
			if($ST_ON == 2)
			{ 
		?>		
			<td>	
				<button class="btn btn-info btn-sm" type="button" onclick="ViewDemographicsPatientSupport(<?php echo $CounselID ?>)">
		        	<i class="entypo-info"></i>
		    	</button>
			</td>
		<?php 
			}
		?>
		<?php 
			// if ST_ON == 3 means FamilySupport so Display its View 
			if($ST_ON == 3)
			{ 
		?>		
			<td>	
				<button class="btn btn-info btn-sm" type="button" onclick="ViewDemographicsFamilySupport(<?php echo $CounselID ?>)">
		        	<i class="entypo-info"></i>
		    	</button>
			</td>
		<?php 
			}
		?>
		<?php 
			// if ST_ON == 3 means FamilySupport so Display its View 
			if($ST_ON == 4)
			{ 
		?>		
			<td>	
				<button class="btn btn-info btn-sm" type="button" onclick="ViewDemographicsProfessionalSupport(<?php echo $CounselID ?>)">
		        	<i class="entypo-info"></i>
		    	</button>
			</td>
		<?php 
			}
		?>
	</tr>	
	<?php	
	  $val = $val + 1;
	}


/*$query = "CREATE VIEW baseview AS 
	SELECT tblInformation.PatientID AS dPID, tblInformation.PatientTypeID AS dPTID, tblInformation.FirstName AS dNAME, tblInformation.SupportPersonStatusID AS dSPSID, tblInformation.Age AS dAGE,tblInformation.RelationID ,tblInformation.Gender, tblDiagnosis.PatientID AS diPID, tblDiagnosis.CancerFlag AS diCF, tblDiagnosis.MetastasisFlag AS diMF, tblDiagnosis.CancerHistoryFlag AS diCHF, tblDiagnosis.CancerRecurranceFlag AS diCRF,tblDiagnosis.OtherHealthProblemsSelected AS diOHPF, tblTreatmentSideEffects.PatientID AS tPID, tblTreatmentSideEffects.ChemotherapySelected AS tCS, tblTreatmentSideEffects.ChemotherapySESelected AS tCSEs, tblTreatmentSideEffects.OtherDrugsSelected AS tODS, tblTreatmentSideEffects.OtherDrugsSESelected AS tODSEs, tblTreatmentSideEffects.RadiationSelected AS tRS, tblTreatmentSideEffects.RadiationSESelected AS tRSEs, tblTreatmentSideEffects.SurgerySelected AS tSS, tblTreatmentSideEffects.SurgerySESelected AS tSSEs, tblTreatmentSideEffects.SpecialSelected AS tSpS, tblTreatmentSideEffects.SpecialSESelected AS tSpSEs,tblTreatmentSideEffects.ComplementarySelected AS tCmpS, tblTreatmentSideEffects.ComplementarySESelected AS tCmpSEs, tblPsychosocialIssues.PatientID AS pPID, tblPsychosocialIssues.LanguageSelected AS pLS, tblPsychosocialIssues.PrimaryLanguageID AS pPLID, tblPsychosocialIssues.MaritalStatusID AS pMSID, tblPsychosocialIssues.ChildrenSelected AS pCS, tblPsychosocialIssues.WorkFlag AS pWF, tblPsychosocialIssues.RaceID AS pRID, tblPsychosocialIssues.ReligionID AS pRLID, tblPsychosocialIssues.Face2FaceFlag AS pFFF 
	FROM tblInformation, tblDiagnosis, tblTreatmentSideEffects, tblPsychosocialIssues 
	WHERE tblInformation.PatientTypeID = 2 
	AND tblInformation.SupportPersonStatusID = 1 
	AND tblDiagnosis.PatientID = tblInformation.PatientID
	AND tblTreatmentSideEffects.PatientID = tblDiagnosis.PatientID
	AND tblPsychosocialIssues.PatientID = tblTreatmentSideEffects.PatientID";*/


	/*$result = mysqli_query($conn,$query0);	
	$row = mysqli_fetch_assoc($result);
	$PatientRelationID = $row['RelationID'];
	$PatientGender = $row['Gender'];	
	$PatientAge = $row['Age'];	


	$query = "CREATE VIEW baseview AS 
	SELECT tblInformation.PatientID AS dPID, tblInformation.PatientTypeID AS dPTID, tblDiagnosis.PatientID AS diPID 
	FROM tblInformation, tblDiagnosis 
	WHERE tblInformation.PatientTypeID = 2 AND tblInformation.SupportPersonStatusID = 1 AND tblDiagnosis.PatientID = tblInformation.PatientID";*/

 	//-------------------------------------------------------

	//Select Relation, Gender & Age  (of PATIENT) from tblinformation to compare with Relation, Gender & Age from tblInformation against PatientTypeID = 2, 3 or 4
	//Select all related fields (of PATIENT) from tblInformation AS BASE VALUES for comparision
	/*$query0 = "SELECT tblinformation.PatientID AS PatientID,tblinformation.PatientTypeID AS PatientTypeID,tblinformation.RelationID AS RelationID,tblinformation.Age AS Age,	tblinformation.Gender AS Gender FROM tblinformation WHERE PatientID = '$pid' ";
	$result = mysqli_query($conn,$query0);	
	$row = mysqli_fetch_assoc($result);
	$PatientRelationID = $row['RelationID'];
	$PatientGender = $row['Gender'];	
	$PatientAge = $row['Age'];	
	$query1 = "SELECT tblinformation.PatientID AS SupportID,tblinformation.PatientTypeID AS PatientTypeID,tblinformation.RelationID AS RelationID,tblinformation.Age AS Age,tblinformation.Gender AS Gender
				FROM tblinformation WHERE PatientTypeID = 2  ";
			
	if($Relationship_ON == 1)
	{
		$query1 .= "AND RelationID=$PatientRelationID "; 
	}
	if($Sex_ON == 1)
	{
		$query1 .= "AND Gender=$PatientGender "; 
	}
	$AgeLength = strlen($PatientAge);
	//$AgeMod = $PatientAge % pow(10 ,($AgeLength - 1));
	//$AgeUnit  = $PatientAge % pow(10 ,($AgeLength - 2));
	$AgeUnit = $PatientAge % 10;
	$AgeStart = $PatientAge -  $AgeUnit;
	$AgeEnd = ($PatientAge + $AgeUnit) - 1;
	//echo $AgeStart;
	//echo $AgeEnd;
	$AgeStart = $PatientAge;
	if($Age_ON == 1)
	{
		$query1 .= "AND Age>=$AgeStart AND Age<=$AgeEnd "; 
	}
	echo $query1;
	$result1 = mysqli_query($conn,$query1);	
	$rows1 = mysqli_num_rows($result1);	
	for ($i=0; $i<$rows1; $i++)
	{
		$row1 = mysqli_fetch_assoc($result1);
		$SupportID = $row1['SupportID'];
		echo $SupportID;
	}
	
	$query3="SELECT `CancerID`, `StageID` FROM `tblcancers` WHERE PatientID='$pid'";
	$query2="SELECT `CancerID`, `StageID` FROM `tblcancers` WHERE PatientID='$SupportID'";
	$res= mysqli_query($conn,$query3);
	$res1=mysqli_query($conn,$query2);

	$datap=mysqli_fetch_all($res);
	$datas=mysqli_fetch_all($res1);
	if(!empty($datap) AND !empty($datas))
	{
		if($)
	}*/

		
?>