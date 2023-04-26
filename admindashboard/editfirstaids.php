<?php
session_start();
include ('error.php');
include('../connection.php');
if(isset($_GET['edit_btn'])){
$_SESSION['id_to_edit']= $_GET["id"];
}
$id_to_edit=$_SESSION['id_to_edit'];
$data_edit_firstaids=mysqli_fetch_assoc(executeQuery(selectQuery("firstaids",["id"=>$id_to_edit])));
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
<div id="addfirstaids">
<form method="POST" enctype="multipart/form/data">

	<fieldset style="width: 500px">
		<legend><h1>Edit Firstaids:</h1></legend>
	<label ><h2>Title:</h2></label><input type="text" name="titles" id="titles" value= "<?php echo $data_edit_firstaids['title']?>"> <br>
	<label ><h2>Firstaids:</h2></label><input type="text" name="editfirstaid" id="editfirstaid" value= "<?php echo $data_edit_firstaids['firstaid']?>" style="width:600px; height:200px;  ">
	<label ><h2>Tags:</h2></label><input type="text" name="tags" id="tags" value= "<?php echo $data_edit_firstaids['tags']?>"> <br>
	<input type="Submit" name="ok" id="submit" value="Enter">
	</fieldset>
<?php
if(isset($_POST['ok'])){
$titles=$_POST['titles'];
$editfirstaid=$_POST['editfirstaid'];
$edittags=$_POST['tags'];
$updateSQL= "UPDATE ";
$updateSQL.="firstaids";
$updateSQL.=" SET title='$titles', firstaid='$editfirstaid',tags='$edittags' where id='".$_SESSION["id_to_edit"]."'";
$resultUpdate=mysqli_query($con,$updateSQL);
if(!$resultUpdate){
die(mysqli_error($con));
}
header("location:addfirstaids.php");
}
?>
</form>	
</div>

