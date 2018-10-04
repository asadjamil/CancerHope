<?php
	require('connection.php');
	
	$page = isset($_POST['p'])?$_POST['p']:'';
	if($page == 'add'){
		$pid = $_POST['pid'];
		$date = $_POST['date'];
		$type = $_POST['type'];
		$sideEffect = $_POST['sideEffect'];
		$comments = $_POST['comments'];

	
		// Find CancerId against Body Cancer came from form in $ (lookup table:tblzluchemotherapy)
		$query1 = "SELECT tblzluchemotherapy.Name,tblzluchemotherapy.id AS ChemotherapyID
				 	FROM tblzluchemotherapy WHERE tblzluchemotherapy.Name='$type'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$ChemotherapyID = $row1["ChemotherapyID"];

		$query3 = "INSERT INTO tblchemotherapy(PatientID,TreatmentTypeID,TreatmentDate) VALUES('$pid','$ChemotherapyID','$date')";
		$result3 = mysqli_query($conn,$query3);

		$query1 = "SELECT tblzlusideeffects.Name,tblzlusideeffects.id AS SideEffectID 
					FROM tblzlusideeffects WHERE tblzlusideeffects.Name='$sideEffect'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$SideEffectID = $row1["SideEffectID"];

		$query3 = "INSERT INTO tblchemotherapysideeffects(PatientID,SideEffectId) VALUES('$pid','$SideEffectID')";
		$result3 = mysqli_query($conn,$query3);

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
		$query4 = "DELETE FROM tblchemotherapy WHERE id = '$id' ";
		$result4 = mysqli_query($conn,$query4);

		$query4 = "DELETE FROM tblchemotherapysideeffects WHERE id = '$id' ";
		$result4 = mysqli_query($conn,$query4);
	}
	else{
		
		// get values from ajax POST method
		$pid = $_POST['pid'];
		$query = "SELECT tblchemotherapy.id,tblchemotherapy.PatientID,tblchemotherapy.TreatmentTypeID AS TreatmentTypeID,tblchemotherapy.TreatmentDate AS TreatmentDate,tblchemotherapysideeffects.id,tblchemotherapysideeffects.PatientID,tblchemotherapysideeffects.SideEffectID AS ChemotherapySideEffectID 
					FROM tblchemotherapy,tblchemotherapysideeffects 
					WHERE tblchemotherapy.PatientID ='$pid' AND tblchemotherapysideeffects.PatientID = '$pid' ";
		$result = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($result);	
		for ($i=0; $i<$rows; $i++)
		{
			$row = mysqli_fetch_assoc($result);
			$id = $row["id"];
			$TreatmentTypeID = $row["TreatmentTypeID"];
			$TreatmentDate = $row["TreatmentDate"];
			$ChemotherapySideEffectID = $row["ChemotherapySideEffectID"];
			/*$query1 = "SELECT tblzluchemotherapy.id,tblzluchemotherapy.Name AS ChemotherapyName FROM tblzluchemotherapy
					WHERE tblzluchemotherapy.Name='$TreatmentTypeID'";
					$result1 = mysqli_query($conn,$query1);
					$row1 = mysqli_fetch_assoc($result1);
					$ChemotherapyName = $row1["ChemotherapyName"];
			*/				
			?>
		<tr>	
			<td><?php echo $TreatmentDate ?></td>
			<td><?php echo $TreatmentTypeID ?></td>
			<td><?php echo $ChemotherapySideEffectID ?></td>
			<!--
			<td><?php //echo $sideEffect ?></td>
			<td><?php //echo $comments ?></td>
			-->
			<?php 
				$ViewFlag = $_POST["ViewFlag"];
				if($ViewFlag == 0)
				{
			?>
					<td>
						<!-- Delete Button - Passing 'id' as paramater to delete function writton in javascript that deletes a row -->
						<button type="submit" onclick="deleteDataChemotherapy(<?php echo $id ?>,<?php echo $pid ?>)" class="btn btn-danger">Delete</button>
					<td>		
			<?php 
				}
			?>
		</tr>
		<?php		
		}
	}
?>