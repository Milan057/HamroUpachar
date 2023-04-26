<?php
session_start();
include('connection.php');
$username=$_POST['username'];
$password=$_POST['password'];
/*
$sql="select * from adminlogin where username= '$username' and password='$password'";
$result=$con->query($sql);

$row=$result->fetch_assoc();
if($result->num_rows==1){

	$_SESSION['admin_id']=$row['id'];
	$_SESSION['admin_username']=$row['username'];
	$_SESSION['admin_password']=$row['password'];

	header('location:dashboard.php');

}else{
	echo("Login Credential Not Matched!!");
}
*/
$operation=executeQuery(selectQuery("register",["username"=>$username,"userpassword"=>$password]));
$result=mysqli_fetch_assoc($operation);
$status=executeQuery(selectQuery("register",["username"=>$username,"userpassword"=>$password,"status"=>1]));
$active=executeQuery(selectQuery("register",["username"=>$username,"userpassword"=>$password,"active"=>1]));

if($operation->num_rows==1){

	$_SESSION['admin_id']=$result['id'];
	$_SESSION['admin_username']=$result['username'];
	$_SESSION['admin_password']=$result['password'];
	$_SESSION['hospital_name']=$result['hospital'];
	if($status->num_rows==1){
		if($active->num_rows==1){
		header('location:dashboard_files/dashboard.php');	
		}else{
			header('location:formvalidation.php?err=4');
		}
		}else{
			header('location:formvalidation.php?err=3');
		}
}else{
header('location:formvalidation.php?err=2');
}
?>