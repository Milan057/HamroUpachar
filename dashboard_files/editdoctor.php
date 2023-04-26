<?php
session_start();
include ('error.php');
include('../connection.php');
if(isset($_GET['edit_btn'])){
$_SESSION['id_to_edit']= $_GET["doctor_id"];
$_SESSION['doctor_table']=$_GET["doctor_table"];
}
$id_to_edit=$_GET["doctor_id"];
$data_edit_doctor=mysqli_fetch_assoc(executeQuery(selectQuery($_SESSION["doctor_table"],["id"=>$id_to_edit])));
?>      
<head>
	<style >
		body{
			background-color: #F6F2EA;
		}
		fieldset{
			transform: translateX(500px);
				border-radius: 20px;
			 box-shadow: 0 10px 25px;
		}
	</style>
</head>
<div id="adddoctor">
<form method="POST" enctype="multipart/form-data">
	<fieldset style="width: 500px">
		<legend><h1>Edit Doctor Details:</h1></legend>
		<label><h2>Doctor Photo</h2></label> 
		<img style="width:2in; height:2in;" src="<?php echo $data_edit_doctor["doctor_photo"] ?>" /><br>
		<label>Update Photo</label>
	<input type="file" name="doc_photo" accept="image/x-png,image/jpeg" />
	<label for="doctorname"><h2>Doctor Name:</h2></label><input type="text" name="doctorname" id="doctorname" value= "<?php echo $data_edit_doctor['doctor_name']?>"> <br>
	<label for="doctorspecailist"><h2>Doctor Specailist:</h2></label><input type="text" name="doctorspecailist" id="doctorspecailist" value= "<?php echo $data_edit_doctor['doctor_specailist']?>">
	<label for="doctornumber"><h2>Doctor Number:</h2></label><input type="text" name="doctornumber" id="doctornumber" value= "<?php echo $data_edit_doctor['doctor_number']?>"> <br>
	<label for="doctoravailable"><h2>Doctor Availability:</h2></label><input type="text" name="doctoravailable" id="doctoravailable" value= "<?php echo $data_edit_doctor['doctor_available']?>"  style="width:400px; height:100px;" >
	<input type="Submit" name="submit" id="submit" value="Enter">
	
	
	</fieldset>
<?php
$path = __DIR__;
if(isset($_POST['submit'])){

// upload 
$file = $_FILES["doc_photo"]["name"];
$tmp_name = $_FILES["doc_photo"]["tmp_name"];
$upload_path = $path."/doctor_images" . "/".$_FILES["doctorphoto"]["name"];
if(move_uploaded_file($tmp_name, $upload_path."/".$file)) {
	$filename = '/hamroupachar/dashboard_files/doctor_images/'.$_FILES["doc_photo"]["name"];

} else {
	$filename = $data_edit_doctor["doctor_photo"];
}
$doctor_name=$_POST['doctorname'];
$doctor_specailist=$_POST['doctorspecailist'];
$doctor_number=$_POST['doctornumber'];
$doctor_availables=$_POST['doctoravailable'];
$updateSQL= "UPDATE ";
$updateSQL.=$_SESSION["doctor_table"];
$updateSQL.=" SET  doctor_name='$doctor_name', doctor_specailist='$doctor_specailist',doctor_number='$doctor_number',doctor_available='$doctor_availables', doctor_photo = '$filename' where id='".$_SESSION["id_to_edit"]."'";
$resultUpdate=mysqli_query($con,$updateSQL);
if(!$resultUpdate){
die(mysqli_error($con));
}
header("location:adddoctor.php");
}
?>
</form>	
</div>