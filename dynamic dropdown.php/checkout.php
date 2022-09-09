<?php
session_start();
$total = $_SESSION['total'];
$tot = 0;
if(isset($_POST['total']))
{
	// Getting the value of button
	$tot = $_POST['total'];
   
	//  Sending Response
	echo "Success: $tot";
}
?>

<div>
    Hello welcome tocheck out:
    <p>Your bill is <?php echo $total?></p>
</div>