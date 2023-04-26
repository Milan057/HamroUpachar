<?php
include('../connection.php');
include('homepage.php');
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
         #noticetitle{
            font-size: 50px;
            color:blue;
              font-family: 'Mangal';
         }
         #noticephoto{
            width:600px;
            text-align: center;
            font-size: 25px;
            height: 450px;
            min-height: 500px;
            max-height: 500px;

         }
         #noticedescription{
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
         .notice_contact{
            display: flex;
            justify-content: space-around;

         }
     </style>

</head>
<body>

<div class="body_content">
<div class="services_count">
    <?php
    $hospitals= executeQuery(selectQuery('register',["active"=>1,"status"=>1]))->num_rows;
    $doctors= executeQuery(selectQuery('doctor',["active"=>1]))->num_rows;
    $notices= executeQuery(selectQuery('notices'))->num_rows;
    


    ?>
    <div class="title">
<h1>Services Listed</h1>
    </div>
<table id="services_listed">
<tr>
<th class="service_column">Hospitals Listed</th>
<th class="service_column">Doctors Listed</th>
<th class="service_column">Notices Listed</th>
</tr>
<td><?php echo $hospitals; ?></td>
<td><?php echo $doctors; ?></td>
<td><?php echo $notices; ?></td>
</table>
</div>
<div class="notice_contact">
<div class="mainnotice">
    <?php
    $fetchednotice=mysqli_fetch_assoc(executeQuery(selectQuery("admin_notice")));

    ?>
<table class="mainnoticetable">
    <tr><th colspan="2" id="noticetitle"><?php echo $fetchednotice['title']?></th></tr>
    <tr>
        <td id="noticephoto"><img style="border-radius: 50px;  box-shadow: 0 10px 25px;" height="450px;" width="600px;" src="<?php echo $fetchednotice['image']?>"></td>
        <td id="noticedescription"><?php echo $fetchednotice['description']?></td>
    </tr>


</table>


</div>
<div class="contact">
    
<h2>Contact Us</h2>
<h4>Email:</br>hamroupachar@gmail.com</h4>
<h4>Phone:</br>9843030742, 9845115153</h4>
<h4>Address:</br>Sahayoginagar, KMC-32</br>Kathmandu, Nepal</h4>
<h4>Instagram:</br>/hamroupachar</h4>

</div>

</div>

</div>
</div>   
</body>
</html>