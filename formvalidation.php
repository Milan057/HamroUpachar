<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<style type="text/css">
	body	{
			background-image:url("login.jpg");
  background-size: cover;
		}
		#border{
			width: 300px;
			height: 300px;
			margin: auto;
			transform: translatex(-300px);
		padding: 10px;
		
		}
		.textbox{
			width: 200px;
			height: 20px;
			border-radius:10px;
			transform: translateX(20px);
		}
		.errorfield{
			color:red;

		}.link{
			text-decoration:none;
			color:blue;
		}

	</style>
</head>
<body>

	<form method="post" onsubmit="return formValidation()" action="authentication.php" name="adminloginform">
		<div id="border">
			<h1>Hospital Login</h1>
			<?php
			if(isset($_GET['err'])&& $_GET['err']==1){?>
<center><p id="login_error" class="errorfield" >Please Login to Continue!!</p></center>
<?php
}
?>
	<?php
			if(isset($_GET['err'])&& $_GET['err']==2){?>
<center><p id="login_error" class="errorfield" >Please enter correct username /password.</p></center>
<?php
}
?>
<?php
			if(isset($_GET['err'])&& $_GET['err']==3){?>
<center><p id="login_error" class="errorfield" >Please wait! We are processing your request.</p></center>
<?php
}
?>
<?php
			if(isset($_GET['err'])&& $_GET['err']==4){?>
<center><p id="login_error" class="errorfield">Something went wrong! Please contact to admin.</p></center>
<?php
}
?>
<label><b>Username:</b></label>	
<input type="text" name="username" class="textbox">	
<center><p id="nameerror" class="errorfield" ></p></center>
<label><b>Password:</b></label>	
<input type="password" name="password" class="textbox">	
<center><p id="passerror" class="errorfield"></p></center>	
<center><input type="submit" name="ok" value="Login"  ></center>

		</div>
	</form>
	
<script type="text/javascript">

	function formValidation(){
		var username=document.adminloginform.username.value;
		var password= document.adminloginform.password.value;
		var error=false;
		if(username==""){
			error=true;
			printErrorMessage("nameerror","Username can't be empty!!");
		}else{
			printErrorMessage("nameerror","");
		}
		if(password==""){
			error=true;
			printErrorMessage("passerror","Password can't be empty!!");
		}
		else{
			printErrorMessage("passerror","");
		}
		if(error==true){
			return false;
		}else{
			return true;
		}
 	}

 	function printErrorMessage(id,message){
 		document.getElementById(id).innerHTML=message;
 	}
 	


</script>
</body>


</html>