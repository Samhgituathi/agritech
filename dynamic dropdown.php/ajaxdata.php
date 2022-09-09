<?php 
include_once 'config.php';

if (isset($_POST['county_id'])) {
	$query = "SELECT * FROM pickup_point where c_id=".$_POST['county_id'];
	$result = $conn->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select Pickup Point</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['id'].'>'.$row['pick'].'</option>';
		 }
	}else{

		echo '<option>No Pickup Point Found!</option>';
	}

}


?>