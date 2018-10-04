<?php
	require('connection.php');
	
	$page = isset($_POST['p'])?$_POST['p']:'';
	if($page == 'add'){
		$pid = $_POST['pid'];
		$date = $_POST['date'];
		$typeId = $_POST['typeId'];
		$sideEffect = $_POST['sideEffect'];
		$comments = $_POST['comments'];

	
		/*$query1 = "SELECT tblzlusurgery.Name,tblzlusurgery.id AS SurgeryID
				 	FROM tblzlusurgery WHERE tblzlusurgery.Name='$type'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$SurgeryID = $row1["SurgeryID"];*/
		$query1 = "SELECT tblzlusideeffects.Name,tblzlusideeffects.id AS SideEffectID 
					FROM tblzlusideeffects WHERE tblzlusideeffects.Name='$sideEffect'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$SideEffectID = $row1["SideEffectID"];

		$query3 = "INSERT INTO tblsurgery(PatientID,TreatmentTypeID,TreatmentDate,SideEffectID) 
					VALUES('$pid','$typeId','$date',$SideEffectID)";
		$result3 = mysqli_query($conn,$query3);

		/*
		$query3 = "INSERT INTO tblsurgerysideeffects(PatientID,SideEffectId) VALUES('$pid','$SideEffectID')";
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
		$query4 = "DELETE FROM tblsurgery WHERE id = '$id' ";
		$result4 = mysqli_query($conn,$query4);

	}
	else{
		
		// get values from ajax POST method
		$pid = $_POST['pid'];
		$query = "SELECT * FROM tblsurgery WHERE PatientID='$pid' ";
		$result = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($result);	
		for ($i=0; $i<$rows; $i++)
		{
			$row = mysqli_fetch_assoc($result);
			$id = $row["id"];
			$TreatmentTypeID = $row["TreatmentTypeID"];
			$TreatmentDate = $row["TreatmentDate"];
			$SideEffectID = $row["SideEffectID"];

			$query1 = "SELECT tblzlusideeffects.Name AS SideEffectName,tblzlusideeffects.id  
						FROM tblzlusideeffects WHERE tblzlusideeffects.id='$SideEffectID'";
			$result1 = mysqli_query($conn,$query1);
			$row1 = mysqli_fetch_assoc($result1);
			$SideEffectName = $row1["SideEffectName"];

			$query1 = "SELECT tblzlusurgery.id,tblzlusurgery.Name AS SurgeryName FROM tblzlusurgery
					WHERE tblzlusurgery.id='$TreatmentTypeID'";
					$result1 = mysqli_query($conn,$query1);
					$row1 = mysqli_fetch_assoc($result1);
					$SurgeryName = $row1["SurgeryName"];
		?>
		<tr>
			
			<td><?php echo $TreatmentDate ?></td>
			<td><?php echo $SurgeryName ?></td>
			<td><?php echo $SideEffectName ?></td>
			<?php 
				$ViewFlag = $_POST["ViewFlag"];
				$EditFlag = $_POST["EditFlag"];
				if($ViewFlag == 0 || $EditFlag == 1)
				{
			?>
				<td>
					<!-- Delete Button - Passing 'id' as paramater to delete function writton in javascript that deletes a row -->
					<button type="submit" onclick="deleteDataSurgery(<?php echo $id ?>,<?php echo $pid?>)" class="btn btn-danger">Delete</button>
				<td>	
			<?php
				}
			?>		
		</tr>
		<?php		
		}
	}
?>