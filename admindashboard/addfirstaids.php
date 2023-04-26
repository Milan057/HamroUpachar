<?php
include ('mainpage.php');

$path = __DIR__;

if(isset($_POST['firstaidssubmit'])&& $_POST['title']!=""){

move_uploaded_file($_FILES["photo"]["tmp_name"], $path."/firstaidsphotos" . "/".$_FILES["photo"]["name"]);
$file_path = '/hamroupachar/admindashboard/firstaidsphotos/'.$_FILES["photo"]["name"];
$currentphoto=$file_path;
$currenttitle=$_POST['title'];
$data=executeQuery(selectQuery("firstaids",["title"=>$currenttitle]));
$currentnotice=$_POST['FirstAids'];
$currenttags=$_POST['tags'];
if($data->num_rows!=1){
executeQuery(insertQuery("firstaids",["title","firstaid","photos","tags"],
								[$currenttitle,$currentnotice,$currentphoto,$currenttags]));
?>
<script type="text/javascript">
	alert("Firstaids's information is  sucessfully inserted");
</script>	
<?php
}

}
$data_firstaids=executeQuery(selectQuery("firstaids"));
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.textarea{
			width: 800px; 
			border-radius: 20px;
			background-color: #FFF5D1 ;		}
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
			.space1{
			max-width:600px;
			min-width:600px;}
	
	#tbl_title{
			padding:10px;
			max-width:200px;
			min-width:200px;
		}
		#tbl_firstaids{
			padding:10px;
			max-width:620px;
			min-width:620px;
			word-break: break-all;
		}
	</style>
</head>
<body>
<div class="main-content">
			<div id="firstaids">
<form style="width:900px;" method="POST" enctype="multipart/form-data" >
	
		<legend><h2>Add Firstaids:</h2></legend>
	
	<label for="title"><b>Title</b></label></br><input class="textarea" type="text" name="title" id="title" style="height: 50px;" required></br></br>
	<label><b>FirstAids</b></label></br><input class="textarea" type="text" name="FirstAids" id="FirstAids" style="height: 70px;" required><br></br>
	<label ><b>Add Tags</b></label></br><input class="textarea" type="text" name="tags" id="tags" style="height: 60px;" required><br></br>
	<label><b>Photo:</b></label>
	<input type="file" accept="image/x-png,image/jpeg" name="photo" id="photo" required>
	
	<input type="Submit" style="height:30px; background: lightgreen; border-radius: 20px; padding:5px; " name="firstaidssubmit" id="firstaidssubmit" class="btn_edit" value="Add">
	
</form>
</div>
<div id="firstaid">
	<h1>FirstAids:</h1>
	<table >
		<tr><td class="space"><h3>Photo</h3></td>
			<td class="space"><h3>Title</h3></td>
		<td class="space1"><h3>FirstAids</h3></td>
</tr>
</table >
<?php
foreach($data_firstaids as $value){
?>
<table id="tbl_firstaid">
<tr>
	        <td>    <img style="width:2in; height:2in;" src="<?php print_r( $value["photos"] )?>" /> 
</h3></b></td>
	<td id= "tbl_title"><b><h3><?php print_r( $value['title']); ?></h3><b> </td>
		<td id="tbl_firstaids"><b><h3><?php print_r($value['firstaid']); ?></h3></b></td>
	<td><form method="POST" action="deletefirstaids.php"><input type ="hidden" name="id" value=" <?php echo $value["id"]  ?>"><input type="Submit" name="delete_btn" value= "Delete" class="btn_remove"></form>

		<form method="GET" action="editfirstaids.php"><input type ="hidden" name="id" value=" <?php echo $value["id"]  ?>"><input type="Submit" name="edit_btn" value= "Edit" class="btn_edit"></form></td>
</tr>
</table>
<?php } ?> 
</div>
	</div>

</body>

</html>