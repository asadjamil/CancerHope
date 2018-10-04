<?php
	require('connection.php');
	
	$page = isset($_POST['p'])?$_POST['p']:'';
	if($page == 'add'){
		$pid = $_POST['pid'];
		$date = $_POST['date'];
		$cancerId = $_POST['cancerId'];

		// Find CancerId against Body Cancer came from form in $bodypart (lookup table:tblzlucancers)
		/*$query1 = "SELECT tblzlucancers.Name,tblzlucancers.ID AS CancerID FROM tblzlucancers
					WHERE tblzlucancers.Name='$cancer'";*/
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$CancerID = $row1["CancerID"];
		$query3 = "INSERT INTO tblcancerhistory(PatientID,CancerID,CancerDate) VALUES('$pid','$cancerId','$date') ";         
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
		$query4 = "DELETE FROM tblcancerhistory WHERE id = '$id' ";
		$result4 = mysqli_query($conn,$query4);
	}
	else{
		
		// get values from ajax POST method
		$pid = $_POST["pid"];
		$query = "SELECT * FROM tblcancerhistory WHERE PatientID='$pid' ";
		$result = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($result);	
		for ($i=0; $i<$rows; $i++)
		{

			$row = mysqli_fetch_assoc($result);
			$id = $row["id"];
			$CancerID = $row["CancerID"];
			$CancerDate = $row["CancerDate"];

			$query2 = "SELECT tblzlucancers.ID,tblzlucancers.Name AS CancerName FROM tblzlucancers WHERE tblzlucancers.ID='$CancerID'";
			$result2 = mysqli_query($conn,$query2);
			$row2 = mysqli_fetch_assoc($result2);
			$CancerName = $row2["CancerName"];
		?>
		<tr>
			
			<td><?php echo $CancerDate ?></td>
			<td><?php echo $CancerName ?></td>
			<?php 
				// It means View Flag is not set so enable delete button as it is add case
				$ViewFlag = $_POST['ViewFlag'];
				// It means EditFlag is set so enable delete button
				$EditFlag = $_POST['EditFlag'];
				if( $ViewFlag == 0 || $EditFlag == 1)
				{
			?>
					<td>
						<!-- Delete Button - Passing 'id' as paramater to delete function writton in javascript that deletes a row -->
						<button type="submit" onclick="deleteDataCancerHistory(<?php echo $id ?>,<?php echo $pid ?>)" class="btn btn-danger">Delete</button>
					<td>
			<?php 
				}
			?>			
		<tr>
		<?php		
		}
	}
?>