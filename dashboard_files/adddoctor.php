<?php
session_start();
include('../connection.php');
 include ('style.php');
$path = __DIR__;
$hospital_id=$_SESSION['admin_id'];
$data_hospital_name=mysqli_fetch_assoc(executeQuery(selectQuery("register",["id"=>$hospital_id])));
$hospital_name=$data_hospital_name['hospital'];
if(isset($_POST['doctorname'])&& $_POST['doctorname']!=""){

	move_uploaded_file($_FILES["doctorphoto"]["tmp_name"], $path."/doctor_images" . "/".$_FILES["doctorphoto"]["name"]);
	$file_path = '/hamroupachar/dashboard_files/doctor_images/'.$_FILES["doctorphoto"]["name"];
	$currentdoctorphoto=$file_path;
	$currentdoctorname=$_POST['doctorname'];
	$data= executeQuery(selectQuery("Doctor",["hospitals_id"=>$hospital_id, "doctor_name"=>$currentdoctorname]));
	$currentdoctorspecailist=$_POST['doctorspecailist'];
	$currentdoctornumber=$_POST['doctornumber'];
	$currentdoctoravailable=$_POST['doctoravailable'];
	if($data->num_rows!=1){
			executeQuery(insertQuery("Doctor",["doctor_photo","doctor_name","doctor_number","doctor_specailist","doctor_available","hospitals_id","active"],
								[$file_path,$currentdoctorname,$currentdoctornumber,$currentdoctorspecailist,$currentdoctoravailable,$hospital_id,1]));
								?>
								<script type="text/javascript">
	alert("Doctor's information is sucessfully inserted");
</script>

								<?php	
	}															
} 
$data_ourdoctor= executeQuery(selectQuery("Doctor",["hospitals_id"=>$hospital_id]));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctors</title>
	<style>
	 #adddoctor{
		width:900px;
			padding:20px;
			transform:translateX(350px);
	}
	.btn_edit{
			background:lightgreen;
			width:70px;
			height:45px;
			font-size: 20px;
			border-radius: 20px;
			 box-shadow: 0 10px 25px;
		}
		.btn_remove{
			background:#FF6347;
			width:70px;
			height:45px;
			font-size: 20px;
			border-radius: 20px;
			 box-shadow: 0 10px 25px;
		}
		.space{
			max-width:200px;
			min-width:200px;}
	
	#tbl_doctorname{
			padding:10px;
			max-width:200px;
			min-width:200px;
		}
		#tbl_doctordescription{
			padding:10px;
			max-width:200px;
			min-width:200px;
			word-break: break-all;
		}body{
			background-color: #C8C9C3;
		}
		#inactive{
            background-color: red;
            width: 1150px;
}
#active{
background: #C8C9C3;
}
</style>
</head>
<body>
<div id="doctor">
<div id="adddoctor">
<form method="POST" enctype="multipart/form-data" >
	<fieldset style="height: 180px ">
		<legend><h2>Add Doctor Detail:</h2></legend>
	<label for="doctorphoto"><b>Doctor Photo:</b></label>
	<input type="file" accept="image/x-png,image/jpeg" name="doctorphoto" id="doctorphoto" required>
	<label for="doctorname"><b>Doctor Name:</b></label><input type="text" name="doctorname" id="doctorname" required><br><br>
	<label for="doctorspecailist"><b>Specialist:</b></label><input type="text" name="doctorspecailist" id="doctorspecailist" required>
	<label for="doctornumber"><b>Phone-number:</b></label><input type="number" name="doctornumber" id="doctornumber" required><br>
	<label for="doctoravailable"><b>Availability:</b></label><input type="text" name="doctoravailable" id="doctoravailable" required>
	<input type="Submit" name="doctorsubmit" id="doctorsubmit" class="btn_edit" value="Enter">
	</fieldset>
</form>
 <div id="ourdoctor">
	<h1>Doctors:</h1>
	<table >
		<tr><td class="space"><h3>Doctor Photo</h3></td>
			<td class="space"><h3>Doctor Name</h3></td>
		<td class="space"><h3>Doctor Specailist</h3></td>
<td class="space"><h3>Doctor Number</h3></td>
			<td class="space"><h3>Doctor Availabilty</h3></td>
</tr>
</table >
<?php
foreach($data_ourdoctor as $value){
?> <div id="<?php if($value['active']==1){echo"active";}else{echo"inactive";} ?>" >
<table id="tbl_notice">
<tr >
	        <td>    <img style="width:2in; height:2in;" src="<?php print_r( $value["doctor_photo"] )?>" /> 
</h3></b></td>
	<td id= "tbl_doctordescription"><b><h3><?php print_r( $value['doctor_name']); ?></h3><b> </td>
		<td id="tbl_doctorname"><b><h3><?php print_r($value['doctor_specailist']); ?></h3></b></td>
	<td id= "tbl_doctordescription"><b><h3><?php print_r( $value['doctor_number']); ?></h3><b> </td>
		<td id= "tbl_doctordescription"><b><h3><?php print_r( $value['doctor_available']); ?></h3><b> </td>
	<td id= "tbl_deletedoctor"><form method="POST" action="deletedoctor.php"><input type ="hidden" name="doctor_id" value=" <?php echo $value["id"]  ?>"><input type ="hidden" name="doctor_table" value="Doctor"><input type="Submit" name="delete_btn" value= "Delete" class="btn_remove"></form>
		
		<form method="GET" action="editdoctor.php"><input type ="hidden" name="doctor_id" value=" <?php echo $value["id"]  ?>"><input type ="hidden" name="doctor_table" value="Doctor"><input type="Submit" name="edit_btn" value= "Edit" class="btn_edit"></form></td>

		<td id= "tbl_deletedoctor"><form method="POST" action="doctoractive.php"><input type ="hidden" name="doctor_id" value=" <?php echo $value["id"]  ?>"><input type="Submit" name="active" value= "Active" class="btn_edit"></form>
		
		<form method="POST" action="inactivedoctor.php"><input type ="hidden" name="doctor_id" value="<?php echo $value["id"]?>"><input type="Submit" name="inactive" value= "Inactive" class="btn_remove"></form></td>
</tr>
</table>
</div>
<?php } ?> 
</div>
</body>
</html>