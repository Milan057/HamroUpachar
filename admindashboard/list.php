<?php
include ('mainpage.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hamro Upachar</title>
	<style type="text/css">
		.transparentbutton{
    width:500px;
    height: 50px;
  border-radius: 10px;
   /* box-shadow: 0 10px 25px;*/
    transform: translateX(500px);
    background-color:white;
}.btn_edit{
		background:lightblue;
			width:80px;
			height:45px;
			font-size: 20px;
			border-radius: 20px;
			/* box-shadow: 0 10px 25px;*/
			    transform: translateX(500px);
}
#inactive{
background: red;
}
#active{
background: white;
}
	</style>
}
</head>
<body>
 <h1 style="text-align: center;">List of hospitals:</h1>
<div>
   
<?php
$sql=executeQuery(selectQuery("register",["status"=>1]));
foreach($sql as $value){
    ?>
<table>
	<tr>
             <input type="submit" class="transparentbutton" name="hospitalname" value="<?php print_r( $value['hospital']) ?>" id="<?php if($value['active']==1){echo"active";}else{echo"inactive";} ?>">
             
    <form method="post" action="active.php">
			<input type="hidden" name="hospital_id" value="<?php print_r( $value['id'])?>"><input type ="hidden" name="hospital_table" value="register"><input type="Submit" name="ok" value= "Active" class="btn_edit"></form></td>
		</form>
		<form method="post" action="inactive.php">
			<input type="hidden" name="hospital_id" value="<?php print_r( $value['id'])?>"><input type ="hidden" name="hospital_table" value="register"><input type="Submit" name="ok" value= "Inactive" class="btn_edit"></form></td>
		</form>

</tr>

</table>
</div>
<?php
}
?>
	</body>
</html>
