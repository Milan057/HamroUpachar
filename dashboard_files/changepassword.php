<?php
session_start();
include ('error.php');
include('../connection.php');
$hospital_id=$_SESSION['admin_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title> Hamro Upachar</title>
	<style type="text/css">
		.password{
			width: 400px;
			box-shadow: 0 10px 25px;
			border-radius: 10px;
			transform: translateX(500px);
			margin-top: 200px;
		}
		.user{
			width: 200px;
			height: 20px;
			transform: translateX(73px);
			border-radius:10px;
		}
		.pass{
			width: 200px;
			height: 20px;
			transform: translateX(40px);
			border-radius:10px;
		}
		.repass{
			width: 200px;
			height: 20px;
			transform: translateX(50px);
			border-radius:10px;
		}.oldpass{
			width: 200px;
			height: 20px;
			transform: translateX(50px);
			border-radius:10px;
		}
		body{
background-image: url(password.jpg);
 background-repeat: no-repeat;
    background-size: 100% 170%;
		}

	</style>
</head>
<body>
	<fieldset class="password">
		<form method="post" onsubmit="return formValidation()" name="adminloginform">
			<center><h2><legend>Change Password</legend></h2></center>
		<br>
			<label> Username:</label>
			<input type="text" name="username" required class="user"><br><br>
			<label>Oldpassword:</label>
			<input type="Password" name="oldpassword" class="oldpass"><br><br>
			<label>New-Password:</label>
			<input type="Password" name="newpassword"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="pass"><br><br>
			<label>Re-Password:</label>
			<input type="Password" name="repassword" class="repass"><br><br>
			<center><input type="submit" name="ok" value="Submit" onclick="change()"></center>
		</form>
	</fieldset>
		<script type="text/javascript">
		function formValidation(){
			var x = document.adminloginform.password.value;
			var y= document.adminloginform.repassword.value;
			var error=false;
			if (y !=x ) {
	  				error=true;
    			alert("Password doesnot matched");
			}
			if(error==true){
				return false;
			}else{
				return true;
			}
		}
</script>
</body>
</html>
<?php
if(isset($_POST['ok'])){
	$username=$_POST['username'];
	$oldpassword=$_POST['oldpassword'];
	$newpassword=$_POST['newpassword'];
$sqlcheck= "SELECT * from register where username='$username'&& userpassword='$oldpassword'";
	$checkresult= $con->query($sqlcheck);
if($checkresult->num_rows==1){
$updatequery="UPDATE  register set userpassword='$newpassword' where id='$hospital_id'";
$run=mysqli_query($con,$updatequery);
if(!$run){
die(mysqli_error($con));
}?>
<script type="text/javascript">
	function change(){
		alert("Password changed:");
	}
	</script>
	<?php
	header("location:dashboard.php");
}else{
	?>
	<script type="text/javascript">
		alert("Username/Password doesnot matched!");
	</script>

<?php	
}

}
?>