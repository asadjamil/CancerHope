<?php
	require('connection.php');
	
	$page = isset($_POST['p'])?$_POST['p']:'';
	if($page == 'add'){
		$pid = $_POST['pid'];
		$date = $_POST['date'];
		$typeId = $_POST['typeId'];
		$sideEffect = $_POST['sideEffect'];
		$comments = $_POST['comments'];

	
		/*$query1 = "SELECT tblzluspecial.Name,tblzluspecial.id AS SpecialID
				 	FROM tblzluspecial WHERE tblzluspecial.Name='$type'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$SpecialID = $row1["SpecialID"];
		*/
		$query1 = "SELECT tblzlusideeffects.Name,tblzlusideeffects.id AS SideEffectID 
					FROM tblzlusideeffects WHERE tblzlusideeffects.Name='$sideEffect'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$SideEffectID = $row1["SideEffectID"];

		$query3 = "INSERT INTO tblspecial(PatientID,TreatmentTypeID,TreatmentDate,SideEffectID) 
					VALUES('$pid','$typeId','$date','$SideEffectID')";
		$result3 = mysqli_query($conn,$query3);

		

		/*
		$query3 = "INSERT INTO tblspecialsideeffects(PatientID,SideEffectId) VALUES('$pid','$SideEffectID')";
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
		$query4 = "DELETE FROM tblspecial WHERE id = '$id' ";
		$result4 = mysqli_query($conn,$query4);
	}
	else{
		
		// get values from ajax POST method
		$pid = $_POST['pid'];
		$query = "SELECT * FROM tblspecial WHERE PatientID='$pid' ";
		$result = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($result);	
		for ($i=0; $i<$rows; $i++)
		{
			$row = mysqli_fetch_assoc($result);
			$id = $row["id"];
			$TreatmentTypeID = $row["TreatmentTypeID"];
			$TreatmentDate = $row["TreatmentDate"];
			$SideEffectID = $row["SideEffectID"];

			$query1 = "SELECT tblzluspecial.id,tblzluspecial.Name AS SpecialName FROM tblzluspecial
					WHERE tblzluspecial.id='$TreatmentTypeID'";
					$result1 = mysqli_query($conn,$query1);
					$row1 = mysqli_fetch_assoc($result1);
					$SpecialName = $row1["SpecialName"];
					
			$query1 = "SELECT tblzlusideeffects.Name AS SideEffectName,tblzlusideeffects.id  
						FROM tblzlusideeffects WHERE tblzlusideeffects.id='$SideEffectID'";
			$result1 = mysqli_query($conn,$query1);
			$row1 = mysqli_fetch_assoc($result1);
			$SideEffectName = $row1["SideEffectName"];
		?>
		<tr>
			
			<td><?php echo $TreatmentDate ?></td>
			<td><?php echo $SpecialName ?></td>
			<td><?php echo $SideEffectName ?></td>
			<?php 
				$ViewFlag = $_POST["ViewFlag"];
				$EditFlag = $_POST["EditFlag"];
				if($ViewFlag == 0 || $EditFlag == 1)
				{
			?>
				<td>
					<!-- Delete Button - Passing 'id' as paramater to delete function writton in javascript that deletes a row -->
					<button type="submit" onclick="deleteDataSpecialProcedures(<?php echo $id ?>,<?php echo $pid ?>)" class="btn btn-danger">Delete</button>
				<td>	
			<?php
				}
			?>		
		</tr>
		<?php		
		}
	}
?>