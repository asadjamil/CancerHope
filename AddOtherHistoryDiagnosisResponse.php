<?php
	require('connection.php');
	
	$page = isset($_POST['p'])?$_POST['p']:'';
	if($page == 'add'){
		$pid = $_POST['pid'];
		$otherHealthId = $_POST['otherHealthId'];
		// Find OtherHistoryID  against Other Health name from form in $OtherHealth (lookup table:tblzluotherhealthproblems)
		/*$query1 = "SELECT tblzluotherhealthproblems.Name,tblzluotherhealthproblems.ID AS OtherHistoryID 
					FROM tblzluotherhealthproblems
					WHERE tblzluotherhealthproblems.Name='$otherHealthh'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_assoc($result1);
		$OtherHistoryID = $row1["OtherHistoryID"];
		*/
		$query3 = "INSERT INTO tblotherhistory(PatientID,OtherHistoryID) VALUES('$pid','$otherHealthId') ";         
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
		$query4 = "DELETE FROM tblotherhistory WHERE id = '$id' ";
		$result4 = mysqli_query($conn,$query4);
	}
	else{
		
		// get values from ajax POST method
		$pid = $_POST["pid"];

		$query = "SELECT * FROM tblotherhistory WHERE PatientID='$pid' ";
		$result = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($result);	
		for ($i=0; $i<$rows; $i++)
		{

			$row = mysqli_fetch_assoc($result);
			$id = $row["id"];
			$OtherHistoryID = $row["OtherHistoryID"];

			$query2 = "SELECT tblzluotherhealthproblems.ID,tblzluotherhealthproblems.Name AS OtherHealth FROM tblzluotherhealthproblems WHERE tblzluotherhealthproblems.id='$OtherHistoryID'";
			$result2 = mysqli_query($conn,$query2);
			$row2 = mysqli_fetch_assoc($result2);
			$OtherHealth = $row2["OtherHealth"];
		?>
		<tr>
			<td><?php echo $OtherHealth ?></td>

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
						<button type="submit" onclick="deleteDataOtherHistory(<?php echo $id ?>,<?php echo $pid ?>)" class="btn btn-danger">Delete</button>
					<td>
			<?php
				}
			?>			
		<tr>
		<?php		
		}
	}
?>