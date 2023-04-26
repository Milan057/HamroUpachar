<?php
include('error.php');
include('../connection.php');
if(isset($_POST['inactive'])){
	$id_to_active=$_POST["doctor_id"];
	$active="UPDATE Doctor SET active=0 where id='$id_to_active'";
	mysqli_query($con,$active);
	 header('location:adddoctor.php');
}
?>