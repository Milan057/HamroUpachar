<?php
session_start();
$searchneeded=1;
include('../connection.php');
include ('homepage.php');
if(isset($_POST['searchbtn'])&& $_POST['keyword']!=""){
$serachkeyword= $_POST['keyword'];
}else{
    $serachkeyword="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital List</title>

    <style>
        body{
            background-image:url(hospital.jpg);
               background-repeat: no-repeat;
                background-size: cover;

        }
    .listofhospital{
        width:500px;
        position:absolute;
        transform:translatex(50px);  
    }
.transparentbutton{
    width:500px;
    height: 50px;
    border-radius: 20px;
    box-shadow: 0 10px 25px;
}
.transparentbutton{
    background:     lightyellow;
    font-size:  20px;
}
.even .transparentbutton{
    background:     lightgreen;
}




        </style>

</head>
<body>
<div class="listofhospital">
    <h1>List of hospitals:</h1>
<?php
$count=1;
if($serachkeyword!=""){
    $sql=executeQuery("SELECT * from register WHERE hospital like '%$serachkeyword%' AND active=1 AND status=1");
}else{
$sql=executeQuery(selectQuery("register",["active"=>1,"status"=>1]));
}
?>
<div class="NotifyUser" id="NotifyUser">

</div>
<?php
foreach($sql as $value){
    ?>
<table>
    <tr class="<?php if($count%2==0){echo "even";}?>">
    <?php $count++;?>
    <td> 
        <form action="main.php" method="POST">
            <input type="hidden" name="hospitalId" value="<?php echo $value['id']?>">
            <input type="submit" class="transparentbutton" name="hospitalname" value="<?php print_r( $value['hospital']) ?> ">
        </form>
    </td>
</tr>

</table>
<?php
}
?>
</div>
</body>
<script type="text/javascript">
    <?php
    if($sql->num_rows==0){
    if($serachkeyword==""){?>
        document.getElementById("NotifyUser").innerHTML="There are no any Hospital Listed at the moment!";
        <?php
    }else{
        ?>
        document.getElementById("NotifyUser").innerHTML="No any Matching Result Found!";
        <?php
    }
}
?>
</script>
</html>



