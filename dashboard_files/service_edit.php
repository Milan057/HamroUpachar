<?php
session_start();
include('error.php');
include('../connection.php');
if(isset($_POST['edit_btn'])){
$_SESSION['id_to_edit']= $_POST["service_id"];
$_SESSION['service_table']=$_POST["service_table"];
}
$id_to_edit=$_POST["service_id"];

	/*$deleteServices="DELETE from our_services where id='$id_to_delete';";

	
	mysqli_query($con,$deleteServices);
	header('location:dashboard.php');*/

	/*$existingServicesSQL="SELECT * from our_services where id= '$id_to_edit';";
	$result= mysqli_query($con,$existingServicesSQL);
	$rows=mysqli_fetch_assoc($result);*/

	$data_edit_service=mysqli_fetch_assoc(executeQuery(selectQuery($_SESSION["service_table"],["id"=>$id_to_edit])));
?>
<head>
	<style >
		
		fieldset{
			transform: translateX(500px);
			border-radius: 20px;
			 box-shadow: 0 10px 25px;
		}
	</style>
</head>
<div id="addservices">
<form method="POST">

	<fieldset style="width: 500px">
		<legend>Edit Service:</legend>
		<br>
	<label for="servicename">Service Name:</label><input type="text" name="servicename" id="servicename" value= "<?php echo $data_edit_service['service_name']?>"><br><br>
	<label for="servicedescription">Service Description:</label><input type="text" name="servicedescription" id="servicedescription" value= "<?php echo $data_edit_service['service_description']?>" style="width:500px; height:200px;  ">
	<input type="Submit" name="servicesubmit" id="servicesubmit" value="Enter">
	</fieldset>
<?php
if(isset($_POST['servicesubmit'])){
$service_name=$_POST['servicename'];
$service_description=$_POST['servicedescription'];
$updateSQL= "UPDATE ";
$updateSQL.=$_SESSION["service_table"];
$updateSQL.=" SET service_name='$service_name', service_description='$service_description' where id='".$_SESSION["id_to_edit"]."'";
echo $updateSQL;
$resultUpdate=mysqli_query($con,$updateSQL);
if(!$resultUpdate){
die(mysqli_error($con));
}
header("location:service.php");
}
?>
</form>	
</div>