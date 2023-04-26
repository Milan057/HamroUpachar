<?php
include ('mainpage.php');
$path = __DIR__;

if(isset($_POST['noticesubmit'])&& $_POST['title']!=""){

move_uploaded_file($_FILES["noticephoto"]["tmp_name"], $path."/noticephotos" . "/".$_FILES["noticephoto"]["name"]);
$file_path = '/hamroupachar/admindashboard/noticephotos/'.$_FILES["noticephoto"]["name"];
$currentphoto=$file_path;
$currenttitle=$_POST['title'];
$currentnotice=$_POST['notice'];
if(executeQuery(selectQuery("admin_notice"))->num_rows==0){
executeQuery(insertQuery("admin_notice",["id","title","description","image"],
								[1,$currenttitle,$currentnotice,$currentphoto]));
}else{
mysqli_query($con,"UPDATE admin_notice SET title='$currenttitle',description='$currentnotice',image='$currentphoto'where id=1");
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#adminnotice{
			position: absolute;
			top:100px;
			transform: translateX(-50%);
			left: 60%;
			background: #4a8ab5;
			border-radius: 20px;
			padding:10px;
			text-align: center;
			box-shadow: 0 10px 25px;
		}
		.textarea{
			width: 800px; 
			border-radius: 20px;
			background-color: #FFF5D1 ;		}
	</style>
</head>
<body>
<div class="main-content">
		<header>
			<h2>
				<label for="">
					<span class="las la-bars"></span>
				</label>
				Admin Dashboard:
			</h2>
			<div id="adminnotice">
<form style="width:900px;" method="POST" enctype="multipart/form-data" >
	
		<legend><h2>Add Admin Message:</h2></legend>
	
	<label for="title"><b>Title</b></label></br><input class="textarea" type="text" name="title" id="title" style="height: 50px;" required></br></br>
	<label for="notice"><b>Notice</b></label></br><input class="textarea" type="text" name="notice" id="notice" style="height: 100px;" required><br></br>
	<label for="noticephoto"><b>Notice Photo:</b></label>
	<input type="file" accept="image/x-png,image/jpeg" name="noticephoto" id="noticephoto" required>
	
	<input type="Submit" style="height:30px; background: lightgreen; border-radius: 20px; padding:5px; box-shadow: 0 10px 25px;" name="noticesubmit" id="noticesubmit" class="btn_edit" value="Add Message">
	
</form>
</div>

	</div>
</body>
</header>
</html>