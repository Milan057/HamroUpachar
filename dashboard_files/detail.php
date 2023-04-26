<?php
session_start();
include('../connection.php');
include('style.php');
$hospital_id=$_SESSION['admin_id'];

$data_hospital_name=mysqli_fetch_assoc(executeQuery(selectQuery("register",["id"=>$hospital_id])));
$hospital_name=$data_hospital_name['hospital'];
if(isset($_POST['detail'])&& $_POST['detail']!=""){
	$detail=$_POST['detail'];
	$data= executeQuery(selectQuery("hospitaldetail",["hospital_id"=>$hospital_id , "detail"=>$detail]));
	if($data->num_rows!=1){
		executeQuery(insertQuery("hospitaldetail",["detail","hospital_id"],[$detail,$hospital_id]));
		?>
		<script type="text/javascript">
			alert("Detail is sucessfully inserted");
		</script>
<?php
	}
	
} 
$data_detail= executeQuery(selectQuery("hospitaldetail",["hospital_id"=>$hospital_id]));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail</title>
	<style>
	#tbl_detail{
		max-width: 1000px;
	min-width: 1000px;
	word-break: break-all;
	

	}#adddetail{

	transform: translateX(300px);

	}#ourdetail{
		transform: translateX(300px);
	}.btn_edit{
background:lightgreen;
			width:70px;
			height:45px;
			font-size: 20px;
			border-radius: 20px;
			 box-shadow: 0 10px 25px;
	}
		
	</style>
	}
	
</head>
<body>
<div id="details">
<div id="adddetail">
<form method="POST">
	<fieldset style="width: 700px; height: 150px;">
		<legend><h2>Add Details</h2></legend>
	<label for="detail"><b>Details:</b></label><input type="text" name="detail" id="detail" required>
	<input type="Submit" name="servicesubmit" id="servicesubmit" class="btn_edit" value="Enter">
	</fieldset>
</form>	
</div>


<div id="ourdetail">
	<h1>About Hospital</h1>
<?php
foreach($data_detail as $value){
?>
<table>
<tr>
	<td id="tbl_detail"><b><h3><?php print_r($value['detail']); ?></h3></b></td>
		<td><form method="POST" action="editdetail.php"><input type ="hidden" name="detail_id" value=" <?php echo $value["id"]  ?>"><input type="Submit" name="edit_btn" value= "Edit" class="btn_edit"></form></td>
</tr>
</table>
<?php } ?>
</div>
</div>

</body>
</html>


