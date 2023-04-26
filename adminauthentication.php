<?php
session_start();
include('connection.php');
$username=$_POST['username'];
$password=$_POST['password'];
$sql="SELECT * from admin where username= '$username' and password='$password'";
$result=$con->query($sql);
$row=$result->fetch_assoc();
if($result->num_rows==1){

	$_SESSION['admin_id']=$row['id'];
	$_SESSION['admin_username']=$row['username'];
	$_SESSION['admin_password']=$row['password'];

	header('location:admindashboard/admindashboard.php');

}else{
	header('location:admin.php?err=2');
}


?>