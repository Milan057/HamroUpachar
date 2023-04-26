<?php
include('../connection.php');
if(isset($_POST['hospitalname'])){
$_SESSION['hospitalId']=$_POST['hospitalId'];
    $data_hospital=mysqli_fetch_assoc(executeQuery(selectQuery("register",["id"=>$_SESSION['hospitalId']])));   
      $fetchedphoto=mysqli_fetch_assoc(executeQuery(selectQuery("photo",["hospitalid"=>$_SESSION['hospitalId']])));
      $data_detail=mysqli_fetch_assoc(executeQuery(selectQuery("hospitaldetail",["hospital_id"=>$_SESSION['hospitalId']])));
$_SESSION['hospitalName']=$data_hospital['hospital'];
if($fetchedphoto){
$_SESSION['fetchedPhoto']=$fetchedphoto['photos'];
}else{
$_SESSION['fetchedPhoto']="";
}
if($data_detail){
$_SESSION['dataDetail']=$data_detail['detail'];
}else{
  $_SESSION['dataDetail']="";
}
$_SESSION['email']=$data_hospital['Email'];
$_SESSION['phone']=$data_hospital['phone_number'];
$_SESSION['address']=$data_hospital['address'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <?php
include ('../Fonts/roboto.php');
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamro Upachar</title>

    
<style>
    <?php
    include('style.php');

    ?>
    .transparentbutton{
    border:none;
    background:none;
}
</style>
</head>
<body>
<div class="content1">
	
    <div class="nav">
        
    <div class="nav-logo">
        <a href=""><img src="hamro_upachar.jpg"></a>
        <!-- <span style="color:white;font-size:30px;">Hamro Upachar</span> -->
    </div>
    <div class="nav-search">
        <div class="search" style= "display:<?php if(isset($searchneeded)&&$searchneeded=1){echo "block";}else{echo "none";}?>;">  
<form method="POST">
    <input type="text" name="keyword" id="keyword" placeholder="......................Type Here To Search.....................................">
    <input type="submit" name="searchbtn" value="GO" id="searchbtn">

</form>


</div>
    </div>
    <div class="nav-links">
       
        <ul>
            <li><a href="hospital.php">HOSPITAL</a></li>
            <li><a href="main.php">HOME</a></li>
            <li><a href="displayhospitalservices.php">SERVICES</a></li>
            <li><a href="doctor.php">DOCTOR</a></li>
            <li><a href="notice.php">NOTICE</a></li>
           </ul>  
    </div>
 <div class="button" style="display: none">
    <button type="button" name="ok"><a href="signUp.php">SignUp</a></button>
    <button type="button" name="ok"><a href="login.php">Login</a></button></div>

</div>
<div class="HospitalName">
    <?php
echo $_SESSION['hospitalName'];
    ?>
</div>
    
</body>
</html>