<!DOCTYPE html>
<html>
<head>
    <title> </title>
    <style>
        .row{
         
        }
        .column{
            min-width: 300px;
            max-width: 300px;
            text-align: center;
            word-break: break-all;

        }
        .photo{
            width: 2.1in;
            height: 2.1in;
            text-align: center;
           
        }
        .even{
            height: 2.1in;
            background: #C2FAD3;
            width: 1470px;
            border-radius: 20px;
            padding-left: 40px;
        }
         .odd{
            height: 2.1in;
            background: lightyellow;
            width: 1470px;
            border-radius: 20px;
            padding-left: 40px;
        }
    </style>
</head>
<body>

</body>
</html>
<?php
session_start();
$searchneeded=1;
include('maincss.php');
if(isset($_POST['searchbtn'])&& $_POST['keyword']!=""){
$serachkeyword= $_POST['keyword'];
}else{
    $serachkeyword="";
}
   if($serachkeyword!=""){
   $data_ourdoctor=executeQuery("SELECT * from Doctor WHERE  active=1 AND doctor_name like '%$serachkeyword%' AND hospitals_id=".$_SESSION['hospitalId']);
   
    }else{
$data_ourdoctor= executeQuery(selectQuery("Doctor",["hospitals_id"=>$_SESSION['hospitalId'],"active"=>1]));
    }
   
?><body>
<h1>Doctors:</h1>
<div class="outline" style="height:65px; background: #B6FAF5;">
    <table >
        <tr><td class="photo" style="height: 0px;"><h3>Doctor Photo</h3></td>
            <td class="column" style="height: 0px;"><h3>Doctor Name</h3></td>
        <td class="column" style="height: 0px;"><h3>Doctor Specailist</h3></td>
<td class="column" style="height: 0px;"><h3>Doctor Number</h3></td>
            <td class="column" style="height: 0px;"><h3>Doctor Availabilty</h3></td>
</tr>
</table >
</div>
<div class="NotifyUser" id="NotifyUser">
    </div>
<?php
$id=0;
foreach($data_ourdoctor as $value){
$id++;
?>
<div class= <?php if($id%2==0){echo "even";}else{echo "odd";}?>>
<table id="tbl_doctor">
<tr class="row">

            <td class="photo">    <img  style="width:2in; height:2in; margin-top: 3.5px; border-radius: 30px;" src="<?php print_r( $value["doctor_photo"] )?>" />
</h3></b></td>
    <td class="column" id= "tbl_doctordescription"><b><h3><?php print_r( $value['doctor_name']); ?></h3></b> </td>
        <td class="column" id="tbl_doctorname"><b><h3><?php print_r($value['doctor_specailist']); ?></h3></b></td>
    <td class="column" id= "tbl_doctordescription"><b><h3><?php print_r( $value['doctor_number']); ?></h3></b> </td>
        <td class="column"  id="tbl_doctordescription"><b><h3><?php print_r( $value['doctor_available']); ?></h3></b> </td>

</tr>
</table>
</div>
<?php } ?>
<script type="text/javascript">
    <?php
    if($data_ourdoctor->num_rows==0){
    if($serachkeyword==""){?>
        document.getElementById("NotifyUser").innerHTML="There are no any Doctor Listed at the moment!";
        console.log("chhaina")
        <?php
    }else{
        ?>
        document.getElementById("NotifyUser").innerHTML="No any Matching Result Found!";
        console.log("Bhettena")
        <?php
    }
    }
    ?>
</script>
</body>
</html>
