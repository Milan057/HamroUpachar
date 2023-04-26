<?php
include('error.php');
include('../connection.php');
if(isset($_POST['ok'])){
	$id_to_active=$_POST["hospital_id"];
	$active="UPDATE register SET active=0 where id='$id_to_active'";
	mysqli_query($con,$active);
	 header('location:list.php');
}
?>
