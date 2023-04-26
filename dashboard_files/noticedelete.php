<?php
include('error.php');
include('../connection.php');
if(isset($_POST['delete_btn'])){
	$id_to_delete=$_POST["notice_id"];
	$notice_table=$_POST["notice_table"];
	$deletenotice="DELETE from $notice_table where id='$id_to_delete';";
	mysqli_query($con,$deletenotice);
	 header('location:addnotices.php');
}
?>