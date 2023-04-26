<?php
include('error.php');
include('../connection.php');
if(isset($_POST['delete_btn'])){
	$id_to_delete=$_POST["doctor_id"];
	$doctor_table=$_POST["doctor_table"];
	$deletedoctor="DELETE from $doctor_table where id='$id_to_delete';";
	mysqli_query($con,$deletedoctor);
	 header('location:adddoctor.php');
}
?>