<?php
session_start();
include('maincss.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
     <style type="text/css">
      <?php
      
      include('../Fonts/mangal.php');
      include('../css/servicecount.php');

      ?>
                .mainnotice{
            background: red;
            width:1200px;
            margin-top: 10px;
            background: #FFF5D1;
            border-radius: 20px;
            padding:0px 20px 20px 20px;

         }
         #hospitalphoto{
            width:600px;
            text-align: center;
            font-size: 25px;
            height: 450px;
            min-height: 500px;
            max-height: 500px;

         }
         #hospitaldetail{
            width:600px;
            font-size: 30px;
            text-align: center;
            word-break: break-all; 
              font-family: 'Mangal';
         }
         .contact{
            background: #4a8ab5;
            width: 250px;
            border-radius: 30px;
            margin-top: 10px;
            margin-left: 10px;
            text-align: center;
            padding-top: 100px;
            color: white;
         }
         .hospital_contact{
            display: flex;
            justify-content: space-around;

         }
     </style>

</head>
<body>

<div class="body_content">
<div class="services_count">
    <?php
    $doctors= executeQuery(selectQuery('doctor',["hospitals_id"=>$_SESSION['hospitalId'],"active"=>1]))->num_rows;
    $notices= executeQuery(selectQuery('notices',["hospitals_id"=>$_SESSION['hospitalId']]))->num_rows;
    $service=executeQuery(selectQuery('our_services',["hospital_id"=>$_SESSION['hospitalId']]))->num_rows;
    
    ?>
    <div class="title">
<h1>Services Listed</h1>
    </div>
<table id="services_listed">
<tr>
<th class="service_column">Doctors Listed</th>
<th class="service_column">Notices Listed</th>
<th class="service_column">Services Listed</th>
</tr>
<td><?php echo $doctors; ?></td>
<td><?php echo $notices;?></td>
<td><?php echo $service;?></td>
</table>
</div>
<div class="hospital_contact">
<div class="mainnotice">
<table class="mainnoticetable">
   
        <td id="hospitalphoto"><img style="border-radius: 50px;  box-shadow: 0 10px 25px;" height="450px;" width="600px;" src="<?php echo $_SESSION['fetchedPhoto'];?>"></td>
        <td id="hospitaldetail"><?php echo $_SESSION['dataDetail'];?></td>
    </tr>
</table>
</div>
<div class="contact">
	<h2 >Contact Us</h2>
	<h4 >Email:<?php echo $_SESSION['email'];?></h4>
	<h4 >Phone Number:<?php echo $_SESSION['phone'];?></h4>
<h4>Address:<?php echo $_SESSION['address'];?></h4>

</div>

</div>

</div>
</div>   
</body>
</html>

