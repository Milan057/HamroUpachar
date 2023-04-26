<?php
include('error.php');
include('../connection.php');
if(isset($_POST['delete_btn'])){
	$id_to_delete=$_POST["service_id"];
	$service_table=$_POST["service_table"];
	$deleteServices="DELETE from $service_table where id='$id_to_delete';";
	mysqli_query($con,$deleteServices);
	 header('location:service.php');
}
?>