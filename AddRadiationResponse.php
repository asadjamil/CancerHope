<?php
	require('connection.php');
	
	$page = isset($_POST['p'])?$_POST['p']:'';
	if($page == 'add'){
		$pid = $_POST['pid'];
		$date = $_POST['date'];
		$typeId = $_POST['typeId'];
		$bodypartID = $_POST['bodypartID'];
		$sideEffect = $_POST['sideEffect'];
		$comments = $_POST['comments'];

	
		/*$query1 = "SELECT tblzluradiation.Name,tblzluradiation.id AS RadiationID
				 	FROM tblzluradiation WHERE tblzluradiation.Name='$type'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$RadiationID = $row1["RadiationID"]; */

		/*$query1 = "SELECT tblzlubodyparts.Name,tblzlubodyparts.id AS BodyPartID
				 	FROM tblzlubodyparts WHERE tblzlurbodyparts.Name='$bodypart'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$BodyPartID = $row1["BodyPartID"];*/

		$query1 = "SELECT tblzlusideeffects.Name,tblzlusideeffects.id AS SideEffectID 
					FROM tblzlusideeffects WHERE tblzlusideeffects.Name='$sideEffect'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$SideEffectID = $row1["SideEffectID"];


		$query3 = "INSERT INTO tblradiation(PatientID,TreatmentTypeID,BodyPartID,TreatmentDate,SideEffectID) 
					VALUES('$pid','$typeId','$bodypartID','$date','$SideEffectID')";
		$result3 = mysqli_query($conn,$query3);


		/*$query3 = "INSERT INTO tblradiationsideeffects(PatientID,SideEffectId) VALUES('$pid','$SideEffectID')";
		$result3 = mysqli_query($conn,$query3);
		*/
	}
	// Need to be done later
	/*elseif($page == 'edit'){
		$date = $_POST['date'];
		$stage = $_POST['stage'];
		$cancer = $_POST['cancer'];
		$id = $_POST['id'];
		$query3 = "UPDATE crud SET CancerID='$cancer',email='$email',phone='$phone',address='$address' WHERE id='$id' ";
		$result3 = mysqli_query($conn,$query3);
	}*/
	elseif ($page == 'del') {
		$id = $_POST['id'];
		$query4 = "DELETE FROM tblradiation WHERE id = '$id' ";
		$result4 = mysqli_query($conn,$query4);
	}
	else{
		
		// get values from ajax POST method
		$pid = $_POST['pid'];
		$query = "SELECT * FROM tblradiation WHERE PatientID='$pid' ";
		$result = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($result);	
		for ($i=0; $i<$rows; $i++)
		{
			$row = mysqli_fetch_assoc($result);
			$id = $row["id"];
			$TreatmentTypeID = $row["TreatmentTypeID"];
			$BodyPartID = $row["BodyPartID"];
			$TreatmentDate = $row["TreatmentDate"];
			$SideEffectID = $row["SideEffectID"];

			$query1 = "SELECT tblzlusideeffects.Name AS SideEffectName,tblzlusideeffects.id  
						FROM tblzlusideeffects WHERE tblzlusideeffects.id='$SideEffectID'";
			$result1 = mysqli_query($conn,$query1);
			$row1 = mysqli_fetch_assoc($result1);
			$SideEffectName = $row1["SideEffectName"];

			$query1 = "SELECT tblzluradiation.id,tblzluradiation.Name AS RadiationName FROM tblzluradiation
					WHERE tblzluradiation.id='$TreatmentTypeID'";
			$result1 = mysqli_query($conn,$query1);
			$row1 = mysqli_fetch_assoc($result1);
			$RadiationName = $row1["RadiationName"];
			
			$query1 = "SELECT tblzlubodyparts.id,tblzlubodyparts.Name AS BodyPartName FROM tblzlubodyparts
					WHERE tblzlubodyparts.id='$BodyPartID'";
			$result1 = mysqli_query($conn,$query1);
			$row1 = mysqli_fetch_assoc($result1);
			$BodyPartName = $row1["BodyPartName"];			
		?>
		<tr>
			
			<td><?php echo $TreatmentDate ?></td>
			<td><?php echo $RadiationName ?></td>
			<td><?php echo $BodyPartName ?></td>
			<td><?php echo $SideEffectName ?></td>
			<?php 
				$ViewFlag = $_POST["ViewFlag"];
				$EditFlag = $_POST["EditFlag"];
				if($ViewFlag == 0 || $EditFlag == 1)
				{
			?>
					<td>
						<!-- Delete Button - Passing 'id' as paramater to delete function writton in javascript that deletes a row -->
						<button type="submit" onclick="deleteDataRadiation(<?php echo $id ?>,<?php echo $pid ?>)" class="btn btn-danger">Delete</button>
					<td>	
			<?php
					}
			?>			
		</tr>
		<?php		
		}
	}
?>