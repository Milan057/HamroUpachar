<?php
session_start();
include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
        body{
            background-image:url("registerimage.jpg");
  background-size: cover;
        }
		#border{
			width: 400px;
			height: 450px;
			margin: auto;
			transform: translatex(400px);
			margin-top:60px;
			padding: 10px;
			box-shadow: 0 10px 25px;
		}
		.user{
			width: 200px;
			height: 20px;
			transform: translateX(73px);
			border-radius:10px;
		}
		.email{
			width: 200px;
			height: 20px;
			transform: translateX(103px);
			border-radius:10px;
		}
		.phone{
			width: 200px;
			height: 20px;
			transform: translateX(40px);
			border-radius:10px;
		}
		.code{
			width: 200px;
			height: 20px;
			transform: translateX(107px);
			border-radius:10px;
		}
		.pass{
			width: 200px;
			height: 20px;
			transform: translateX(75px);
			border-radius:10px;
		}
		.repass{
			width: 200px;
			height: 20px;
			transform: translateX(50px);
			border-radius:10px;
		}
		.hospital{
			width: 200px;
			height: 20px;
			transform: translateX(35px);
			border-radius:10px;
		}.address{
	        width: 200px;
			height: 20px;
			transform: translateX(85px);
			border-radius:10px;
		}
	</style>
</head>
<body>
	<form method="post" onsubmit="return formValidation()" action="Register.php" name="adminloginform">
		<div id="border">
			<h1>Hospital SignUp form</h1>
<label><b>Username</b>:</label>	
<input type="text" name="username" class="user" required>	
<br> <br>
<label><b>Email:</b></label>	
<input type="email" name="email" class="email"required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">	
<br><br>
<label><b>Phone Number:</b></label>	
<input type="number" name="number" class="phone" maxlength="10" required>	
<br><br>
<label><b>Hospital_Name:</b></label>	
<input type="text" name="hospital" class="hospital" required>	
<br><br>
<label><b>Address:</b></label>	
<input type="text" name="address" class="address" required>	
<br><br>		
<label><b>Password:</b></label>	
<input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"class="pass" required>	
<center><p id="passerror" class="errorfield"></p></center>	
<label><b>Re-Password:</b></label>	
<input type="password" name="re_password" class="repass"required>	
<center><p id="repasserror" class="errorfield"></p></center>	
<center><input type="submit" name="ok" value="SignUp"  ></center>
		</div>
	</form>
	<script type="text/javascript">
		function formValidation(){
			var x = document.adminloginform.password.value;
			var y= document.adminloginform.re_password.value;
			var a=document.adminloginform.username.value;
			var error=false;
			if (y !=x ) {
	  				error=true;
    			alert("Password does not match");
			}
						if(!isNaN(a))
{
	error=true;
alert("Please Enter Only Characters");
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
	$Email=$_POST['email'];
	$phone=$_POST['number'];
	$hospital=$_POST['hospital'];
	$password=$_POST['password'];
	$address=$_POST['address'];
	$sql="INSERT INTO register(username,Email,phone_number,userpassword,hospital ,status,active,address)
VALUES('$username','$Email','$phone','$password','$hospital','0','1','$address')";
$sqlcheck= "SELECT * from register where Email='$Email'OR username='$username'";
	$checkresult= $con->query($sqlcheck);
if(!$checkresult->num_rows==0){?>
<script type="text/javascript">
	alert("Email/ Username already exits!");
</script>
<?php
}
$entrytest=$con->query($sql);
if ($entrytest==true) {
header('location:Frontend/home.php');
  } 
}
?>