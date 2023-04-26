<?php
session_start();
include ('error.php');
include('../connection.php');
if(isset($_POST['edit_btn'])){
$_SESSION['id_to_edit']= $_POST["detail_id"];
}
$id_to_edit=$_SESSION['id_to_edit'];
$data_edit_detail=mysqli_fetch_assoc(executeQuery(selectQuery("hospitaldetail",["id"=>$id_to_edit])));
?>
<head>
	<style>
		fieldset{
			transform: translateX(500px);
			border-radius: 10px;
			 box-shadow: 0 10px 25px;
		}
	</style>
</head>
<div id="adddetail">
<form method="POST">

	<fieldset style="width: 500px">
		<legend><h1>Edit Details:</h1></legend>
	</label><input type="text" name="detail" id="detail" value= "<?php echo $data_edit_detail['detail']?>" style="width:500px; height:200px; word-break: break-all; ">
	<input type="Submit" name="submit" id="submit" value="Enter">
	</fieldset>
<?php
if(isset($_POST['submit'])){
$detail=$_POST['detail'];
$updateSQL= "UPDATE hospitaldetail set detail='$detail' where id='$id_to_edit'";
$resultUpdate=mysqli_query($con,$updateSQL);
if(!$resultUpdate){
die(mysqli_error($con));
}
header("location:detail.php");
}
?>
</form>	
</div>

