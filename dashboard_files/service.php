<?php
session_start();
include('../connection.php');
include('style.php');
$hospital_id=$_SESSION['admin_id'];
$hospital_name='';
$currentServiceName="";
$currentServiceDescription="";

/*$fetchaall_sql="select * from adminlogin where id='$hospital_id'";
$result= mysqli_query($con,$fetchaall_sql);
$row=mysqli_fetch_assoc($result);*/

$data_hospital_name=mysqli_fetch_assoc(executeQuery(selectQuery("register",["id"=>$hospital_id])));
$hospital_name=$data_hospital_name['hospital'];
if(isset($_POST['servicename'])&& $_POST['servicename']!=""){
	$currentServiceName=$_POST['servicename'];
	$data= executeQuery(selectQuery("our_services",["hospital_id"=>$hospital_id,"service_name"=>$currentServiceName]));
	$currentServiceDescription=$_POST['servicedescription'];
	/*$enterServicesSql="insert into our_services(service_name,service_description,hospital_id) VALUES('$currentServiceName','$currentServiceDescription','$hospital_id')";

	mysqli_query($con,$enterServicesSql);
	*/
	if($data->num_rows!=1){
	executeQuery(insertQuery("our_services",["service_name","service_description","hospital_id"],[$currentServiceName,$currentServiceDescription,$hospital_id]));
	?>
									<script type="text/javascript">
	alert("Service is sucessfully inserted");
</script>	
	<?php
		}
} 
/*
$fetchServices="select * from our_services where hospital_id='$hospital_id'";
$service_result= mysqli_query($con,$fetchServices);
$service_row= mysqli_fetch_assoc($service_result);
*/
$data_ourservices= executeQuery(selectQuery("our_services",["hospital_id"=>$hospital_id]));
// if(!$data_ourservices->num_rows==0){
// 	die("Please enter unique service!");
// 	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Services</title>
	<style>
	 #addservices{
		width:900px;
		
			padding:20px;
			transform:translateX(350px);
	}

		
		#ourservices{
			/* border: 1px solid black; */
			 padding:20px;
			transform:translateX(350px);

		} 
		/* #service{
			padding:20px;
			transform:translateX(900px);
		} */
		#tbl_servicename{
			border:1px solid black;
			padding:10px;
			background: lightgreen;
			max-width: 200px;
			min-width:200px;
	
		}
		#tbl_servicedescription{
			border:1px solid black;
			padding:10px;
			background: lightyellow;
			max-width: 800px;
			min-width:800px;
		}
		#tbl_deleteService{
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

}
	</style>
</head>
<body>
<div id="service">
<div id="addservices">
<form method="POST">
	<fieldset style="height: 150px">
		<legend><h2>Add Services</h2></legend>
	<label for="servicename"><b>Service Name:</b></label><input type="text" name="servicename" id="servicename" required>
	<label for="servicedescription"><b>Service Description:</b></label><input type="text" name="servicedescription" id="servicedescription" required>
	<input type="Submit" name="servicesubmit" id="servicesubmit" class="btn_edit" value="Enter">
	</fieldset>
</form>	
</div>


<div id="ourservices">
	<h1>Our Services</h1>
<?php
foreach($data_ourservices as $value){
?>
<table id="tbl_services">
<tr>


	<td id="tbl_servicename"><b><h3><?php print_r($value['service_name']); ?></h3></b></td>
	<td id= "tbl_servicedescription"><b><h3><?php print_r( $value['service_description']) ?></h3><b> </td>
	<td id= "tbl_deleteService"><form method="POST" action="service_delete.php"><input type ="hidden" name="service_id" value=" <?php echo $value["id"]  ?>"><input type ="hidden" name="service_table" value="our_services"><input type="Submit" name="delete_btn" value= "Delete" class="btn_remove"></form>

		<form method="POST" action="service_edit.php"><input type ="hidden" name="service_id" value=" <?php echo $value["id"]  ?>"><input type ="hidden" name="service_table" value="our_services"><input type="Submit" name="edit_btn" value= "Edit" class="btn_edit"></form></td>
</tr>
</table>
<?php } ?>
</div>
</div>

</body>
</html>


