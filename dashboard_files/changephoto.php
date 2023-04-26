<?php
session_start();
include ('error.php');
include('../connection.php');
$hospital_id=$_SESSION['admin_id'];
$data_hospital_name=mysqli_fetch_assoc(executeQuery(selectQuery("register",["id"=>$hospital_id])));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hamro Upachar</title>
</head>
<style >
	.insertphoto{
		width: 400px;
			box-shadow: 0 10px 25px;
			border-radius: 10px;
			transform: translateX(500px);
			margin-top: 200px;
	}
</style>
<body>
	<fieldset class="insertphoto">
<form method="post" enctype="multipart/form-data">
	<h1><label> Insert Photo:</label></h1>
	<input type="file" name="photo" accept="image/x-png,image/jpeg" required><br><br><br>
	<input type="submit" name="ok" value="Enter">
</form>
</fieldset>
 	
</body>
</html>
 <?php
$path = __DIR__;
if(isset($_POST['ok'])){
move_uploaded_file($_FILES["photo"]["tmp_name"], $path ."/hospital_images". "/".$_FILES["photo"]["name"]);
	$file_path = '/hamroupachar/dashboard_files/hospital_images/'.$_FILES["photo"]["name"];
$photo=$file_path;
$insertquery=executeQuery(insertQuery("photo",["photos","hospitalid"],
								[$file_path,$hospital_id]));
$run=mysqli_query($con,$insertquery);
header("location:dashboard.php");	
}
?> 