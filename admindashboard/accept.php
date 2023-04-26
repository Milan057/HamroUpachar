<?php
include('error.php');
include('../connection.php');
if(isset($_POST['accept'])){
	$id_to_accept=$_POST["newentry_id"];
$acceptquery="UPDATE register set status=1  where id= '$id_to_accept'";
	mysqli_query($con,$acceptquery);
	 header('location:newentry.php');
}
?>