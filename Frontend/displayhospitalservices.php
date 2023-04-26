<?php
session_start();
include('maincss.php');
if(isset($_POST['hospitalname'])){
	$data_hospital=mysqli_fetch_assoc(executeQuery(selectQuery("register",["id"=>$_POST['hospitalId']])));	
}
?><html>
<title>Hospital page</title>
<style>
#ourservices{
			/* border: 1px solid black; */
			width:800px;
			padding:20px;

		}
		#tbl_servicename{
			border:1px solid black;
			padding:10px;
			background: lightgreen;
			max-width:200px;
			min-width:200px;
		}
		#tbl_servicedescription{
			border:1px solid black;
			padding:10px;
			background: lightyellow;
			max-width:900px;
			min-width:900px;
		}
	
td{
	
	border-radius: 20px;
    box-shadow: 0 10px 25px;
    height:50px;
    font-size:  20px;

}
body{
 background-image: url(hospitalimag.png);
    background-repeat: no-repeat;
  background-size: cover;

}
	</style>
	<body>
<?php
$data_ourservices= executeQuery(selectQuery("our_services",["hospital_id"=>$_SESSION['hospitalId']]));
?>
<div id="ourservices">
	<h1>Our Services:</h1>
	<?php
 if($data_ourservices->num_rows==0){?>
<h1 style="color: red;" >There are no any Services Listed at the moment!</h1>

<?php
}
foreach($data_ourservices as $value){
	$count=1;
?>

<table id="tbl_services">
<tr>

	<td id="tbl_servicename"><?php print_r($value['service_name']); ?></td>
	<td id= "tbl_servicedescription"><?php print_r( $value['service_description']) ?> </td>
</tr>
</table>

 <?php
}
?>
</div>
</body>
</html>