<?php
include ('mainpage.php');
$data_newentry= executeQuery(selectQuery("register",["status"=>0]));
$data= executeQuery(selectQuery("register",["status"=>1]));
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	.newentry{
		width:550px;
			padding:20px;
			transform:translateX(350px); 
	}
	.btn_edit{
		
			width:80px;
			height:45px;
			font-size: 20px;
			border-radius: 20px;
		
}
	</style>
</head>
<body>
	<h1 style="text-align: center;">New Hospital Entry</h1>
	<?php
	if($data_newentry->num_rows!=1){?>
		<h1 style="text-align: center; color: red;">No new register of hospital at this moment.</h1>
<?php
	}
	$count=1;
foreach($data_newentry as $value){
    ?>
<table class="newentry">
	<tr>

        <td><h1><?php print_r($value['hospital']);?></h1></td>
        <td><form method="post" action="accept.php"><input type="hidden" name="newentry_id" value="<?php print_r($value['id'])?>"> <input type="submit" name="accept" value="Accept" class="btn_edit"></form></td>
        
        <td><form method="post" action="delete.php"><input type="hidden" name="newentry_id"value="<?php print_r($value['id'])?>"> <input type="submit" name="ignoreentry" value="Remove" class="btn_edit"></form></td>

</tr>

</table>
<?php
}
?>
</body>
</html>