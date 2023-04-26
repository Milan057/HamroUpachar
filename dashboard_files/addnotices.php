<?php
session_start();
include('../connection.php');
 include('style.php');
$hospital_id=$_SESSION['admin_id'];
$path = __DIR__;
$data_hospital_name=mysqli_fetch_assoc(executeQuery(selectQuery("register",["id"=>$hospital_id])));
$hospital_name=$data_hospital_name['hospital'];
if(isset($_POST['noticename'])&& $_POST['noticename']!=""){
move_uploaded_file($_FILES["noticephoto"]["tmp_name"], $path."/notice_images" . "/".$_FILES["noticephoto"]["name"]);
	$file_path='/hamroupachar/dashboard_files/notice_images/'.$_FILES["noticephoto"]["name"];
	$currentnoticeName=$_POST['noticename'];
	$data= executeQuery(selectQuery("notices",["hospitals_id"=>$hospital_id,"notice_name"=>$currentnoticeName]));
	$currentnoticeDescription=$_POST['noticedescription'];
	$noticetag=$_POST['noticetag'];
	if($data->num_rows!=1){
		executeQuery(insertQuery("notices",["notice_name","notice_description","hospitals_id","notice_photo","notice_tags"],[$currentnoticeName,$currentnoticeDescription,$hospital_id,$file_path,$noticetag]));
	?>
									<script type="text/javascript">
	alert("Notice is sucessfully inserted");
</script>	
<?php
}
} 
$data_ournotice= executeQuery(selectQuery("notices",["hospitals_id"=>$hospital_id]));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Notices</title>
	<style>
	 #addnotice{
		width:900px;
			padding:20px;
			transform:translateX(230px);	
	}
		#ournotice{
			 padding:20px;
			transform:translateX(230px);


		}
		#tbl_noticename{
			border:1px solid black;
			padding:10px;
			background: lightgreen;
			max-width: 200px;
			min-width:200px;
	
		}
		#tbl_noticedescription{
			border:1px solid black;
			padding:10px;
			background: lightyellow;
			max-width: 800px;
			min-width:800px;
		}
		#tbl_deletenotice{
			border:1px solid black;
			padding:10px;
			border:none;
			border-radius: 0px;
			background:rgba(0,0,0,0);
			box-shadow: none;
			
		}
		.btn_remove{
			background: 	#FF6347;
			width:75px;
			height:50px;
			font-size: 20px;
			border-radius: 20px;
			 box-shadow: 0 10px 25px;
		}
		.btn_edit{
			background: 	lightgreen;
			width:75px;
			height:50px;
			font-size: 20px;
			border-radius: 20px;
			 box-shadow: 0 10px 25px;
		}
	
		td{
	
	border-radius: 20px;
    box-shadow: 0 10px 25px;
    height:50px;
    font-size:  20px;
}.image{
	background: none;
	box-shadow: none;
}
</style>
</head>
<body>
<div id="notice">
<div id="addnotice">
<form method="POST"  enctype="multipart/form-data">
	<fieldset style="height: 150px ">
		<legend><h2>Add Notices</h2></legend>
	<label for="noticename"><b>Notice:</b></label><input type="text" name="noticename" id="noticename" required>
	<label for="noticedescription"><b>Noties Description:</b></label><input type="text" name="noticedescription" id="noticedescription" required><br>
	<label><b>Noties Tags:</b></label><input type="text" name="noticetag" id="noticetag" required>
	<label><b>Noties Photo:</b></label><input type="file" accept="image/x-png,image/jpeg" name="noticephoto" id="photo" required>
	<input type="Submit" name="noticesubmit" id="noticesubmit" class="btn_edit" value="Enter">
	</fieldset>
</form>	
</div>
<div id="ournotice">
	<h1>Notices:</h1>
<?php
foreach($data_ournotice as $value){
?>
<table id="tbl_notice">
<tr>
	<td class="image" ><img style="width:2in; height:2in; border-radius: 20px;" src="<?php print_r( $value["notice_photo"] )?>" /></td>
	<td id="tbl_noticename"><b><h3><?php print_r($value['notice_name']); ?></h3></b></td>
	<td id= "tbl_noticedescription"><b><h3><?php print_r( $value['notice_description']) ?></h3><b> </td>
		
	<td id= "tbl_deletenotice"><form method="POST" action="noticedelete.php"><input type ="hidden" name="notice_id" value=" <?php echo $value["id"]  ?>"><input type ="hidden" name="notice_table" value="notices"><input type="Submit" name="delete_btn" value= "Delete" class="btn_remove"></form>

		<form method="GET" action="editnotice.php"><input type ="hidden" name="notice_id" value=" <?php echo $value["id"]  ?>"><input type ="hidden" name="notice_table" value="notices"><input type="Submit" name="edit_btn" value= "Edit" class="btn_edit"></form></td>
</tr>
</table>
<?php } ?>
</div>
</div>
</body>
</html>


