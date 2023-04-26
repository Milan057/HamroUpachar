<?php
session_start();
include ('error.php');
include('../connection.php');
if(isset($_GET['edit_btn'])){
$_SESSION['id_to_edit']= $_GET["notice_id"];
$_SESSION['notice_table']=$_GET["notice_table"];
}
$id_to_edit=$_SESSION['id_to_edit'];
$data_edit_notice=mysqli_fetch_assoc(executeQuery(selectQuery($_SESSION["notice_table"],["id"=>$id_to_edit])));
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
<div id="addnotice">
<form method="POST" enctype="multipart/form/data">

	<fieldset style="width: 500px">
		<legend><h1>Edit Notice:</h1></legend>
	<label for="noticename"><h2>Notice:</h2></label><input type="text" name="noticename" id="noticename" value= "<?php echo $data_edit_notice['notice_name']?>"> <br>
		<label for="noticename"><h2>Notice Tags:</h2></label><input type="text" name="noticetags" id="noticetags" value= "<?php echo $data_edit_notice['notice_tags']?>"> <br>
	<label for="noticedescription"><h2>Notice Description:</h2></label><input type="text" name="noticedescription" id="noticedescription" value= "<?php echo $data_edit_notice['notice_description']?>" style="width:500px; height:200px;  ">
	<input type="Submit" name="noticesubmit" id="noticesubmit" value="Enter">
	</fieldset>
<?php
if(isset($_POST['noticesubmit'])){	
$notice_name=$_POST['noticename'];
$notice_description=$_POST['noticedescription'];
$noticetags=$_POST['noticetags'];
$updateSQL= "UPDATE ";
$updateSQL.=$_SESSION["notice_table"];
$updateSQL.=" SET notice_name='$notice_name', notice_description='$notice_description',notice_tags='$noticetags' where id='".$_SESSION["id_to_edit"]."'";
$resultUpdate=mysqli_query($con,$updateSQL);
if(!$resultUpdate){
die(mysqli_error($con));
}
header("location:addnotices.php");
}
?>
</form>	
</div>

