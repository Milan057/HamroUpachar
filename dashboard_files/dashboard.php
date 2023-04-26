<?php
session_start();
include('../connection.php');
 include ('style.php');
$hospital_id=$_SESSION['admin_id'];
if(!isset($_SESSION['admin_username'])){
	header('location:../formvalidation.php?err=1');
	// $data_ourservices= executeQuery(selectQuery("our_services",["hospital_id"=>$hospital_id]));
}
$data_hospital_photo=mysqli_fetch_assoc(executeQuery(selectQuery("photo",["hospitalid"=>$hospital_id])));
$data_doctor=executeQuery(selectQuery("doctor",["hospitals_id"=>$hospital_id,"active"=>1]))->num_rows;
$data_inactivedoctor=executeQuery(selectQuery("doctor",["hospitals_id"=>$hospital_id,"active"=>0]))->num_rows;
$data_service=executeQuery(selectQuery("our_services",["hospital_id"=>$hospital_id]))->num_rows;
$data_notice=executeQuery(selectQuery("notices",["hospitals_id"=>$hospital_id]))->num_rows;
$data_photo=executeQuery(selectQuery("photo",["hospitalid"=>$hospital_id]));
$data_detail=executeQuery(selectQuery("hospitaldetail",["hospital_id"=>$hospital_id]));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title>Hamro upachar</title>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet"  href="style3.css">
 <style type="text/css">
 	.doctor{
 		background-color: lightgreen;
 		width: 250px;
 	}.notice{
 	background-color: lightgreen;
 		width: 250px;
 		transform: translateX(400px);
 		margin-top: -90px;	
 	}.service{
 		background-color: lightgreen;
 		width: 250px;
 	}.try{
 		margin-top: 140px;
 		transform: translateX(-350px);
 	}.inactivedoctor{
 		background-color:lightgreen;
 		width: 250px;
 		transform: translateX(400px);
 		margin-top: -90px;	
 	}.detail{
 		margin-top: 30px;
 		transform: translateX(-50px);
 		width: 700px;
 		height: 20px;
 	}
 
 </style>
</head>
<body>
	<div class="main-content">
		<header>
			<h2>
				<label for="">
					<span class="las la-bars"></span>
				</label>
				Hospital Dashboard:
			</h2>
<div class="try">
				<h2>Total Services Listed in our Hospital:</h2>
				<div class="doctor">
					<h3 style="text-align: center;">Total Doctor Available:</h3>
					<h3 style="text-align: center;"><?php print_r($data_doctor);?></h3>
				</div>
				<div class="notice">
					<h3 style="text-align: center;">Total Notices:</h3>
					<h3 style="text-align: center;"><?php print_r($data_notice);?></h3>
				</div>
				<div class="service">
					<h3 style="text-align: center;">Total Service:</h3>
					<h3 style="text-align: center;"><?php print_r($data_service);?></h3>
				</div>
				<div class="inactivedoctor">
					<h3 style="text-align: center;">Total Doctor in Leave:</h3>
					<h3 style="text-align: center;"><?php print_r($data_inactivedoctor);?></h3>
				</div>

	
			</div>
	
			<div class="user-wrapper">
				<div id="hospital_name">
	<h1><?php echo $_SESSION['hospital_name'];?></h1>

				</div>
					<img style="width:4in; height:2.5in; border-radius: 20px;" src="<?php echo $data_hospital_photo["photos"] ?>" />  
		</header>
				<div class="detail">
			<?php

if( $data_photo->num_rows==0 or $data_detail->num_rows==0){
?>

<h1 style="color: red">Please Add photo or detail as soon as possible!</h1>
<?php
}?>
</div>
	</div>

</body>
</html>