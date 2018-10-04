<?php
	require('connection.php');
	session_start();
    
	$page = isset($_POST['p'])?$_POST['p']:'';
	if($page == 'add'){
		$pid = $_POST['pid'];
		// By default
		$BaseRecord = 1;
		$PrimaryBaseRecord = 1;
		// get dateToday
		$timezone  = 4; //(GMT 4:00) EST (Pak) 
		$InitiateDateTime = gmdate("Y-m-j  H:i", time() + 3600*($timezone+date("I")));
		$LockedBy = $_SESSION["username"];
		$InitiatePSC = $LockedBy;
		$query = "SELECT tblpatient2counsel.PatientID AS PatientID
				 	FROM tblpatient2counsel WHERE PatientID='$pid'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		$rows = mysqli_num_rows($result);
		if($rows == 0)
		{
			$query3 = "INSERT INTO tblpatient2counsel(PatientID,BaseRecord,PrimaryBaseRecord,InitiateDateTime,InitiatePSC,LockedBy) 
				VALUES('$pid','$BaseRecord','$PrimaryBaseRecord','$InitiateDateTime','$InitiatePSC','$LockedBy')";
			$result3 = mysqli_query($conn,$query3);
		}
			
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
		$query4 = "DELETE FROM tblpatient2counsel WHERE id = '$id' ";
		$result4 = mysqli_query($conn,$query4);
	}
	else{
		
		// get values from ajax POST method
		$pid = $_POST['pid'];
		$query = "SELECT * 
					FROM tblpatient2counsel
					WHERE PatientID ='$pid' ";
		$result = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($result);	
		for ($i=0; $i<$rows; $i++)
		{
			$row = mysqli_fetch_assoc($result);
			$id = $row["id"];
			$InitiateDateTime = $row['InitiateDateTime'];
			$LockedBy = $row['LockedBy'];				
			?>
		<tr>	
			<td><?php echo $InitiateDateTime ?></td>
			<td><?php echo $LockedBy ?></td>
			
			<?php 
				/*$ViewFlag = $_POST["ViewFlag"];
				if($ViewFlag == 0)
				{*/
			?>
				
					<td>
						
						<button type="submit" onclick="viewMatchName(<?php echo $id ?>,<?php echo $pid ?>)" class="btn btn-danger">View</button>
						<button type="submit" onclick="editMatchName(<?php echo $id ?>,<?php echo $pid ?>)" class="btn btn-danger">Edit</button>
						<button type="submit" onclick="deleteMatchName(<?php echo $id ?>,<?php echo $pid ?>)" class="btn btn-danger">Delete</button>
					<td>	

					
			<?php 
				//}
			?>
		</tr>
		<?php		
		}
	}
?>