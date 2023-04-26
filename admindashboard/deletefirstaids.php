<?php
include('error.php');
include('../connection.php');
if(isset($_POST['delete_btn'])){
	$id_to_delete=$_POST["id"];
	$deletefirstaids="DELETE from firstaids where id='$id_to_delete';";
	mysqli_query($con,$deletefirstaids);
	 header('location:addfirstaids.php');
}
?>