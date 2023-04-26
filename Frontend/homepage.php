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
<style type="text/css">
    
              <?php
include ('style.php');
      ?>
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
            <li><a href="home.php">HOME</a></li>
            <li><a href="hospital.php">HOSPITAL</a> </li>
            <li><a href="firstaids.php">FIRSTAIDS</a></li>
            <li><a href="aboutus.php">ABOUT US</a></li>
        </ul>   
    </div>
 <div class="buttons">
    <button type="button" class="button" name="ok"><a href="signUp.php">SignUp</a></button>
    <button type="button" class="button" name="ok"><a href="login.php">Login</a></button></div>

</div>
    
</body>
</html>