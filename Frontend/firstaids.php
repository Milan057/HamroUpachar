  <?php
$searchneeded=1;
include('homepage.php');
include ('../connection.php');
if(isset($_POST['searchbtn'])&& $_POST['keyword']!=""){
$serachkeyword= $_POST['keyword'];
}else{
    $serachkeyword="";
}
?>
<!DOCTYPE html>
<html>
    <head>
    <title> </title>
    <style type="">
        .column{
            min-width: 300px;
            max-width: 300px;
            text-align: center;
            word-break: break-all;

        }
        .column1{
            min-width: 900px;
            max-width: 900px;
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

    <?php
    if($serachkeyword!=""){
    $data_ourfirstaids=executeQuery("SELECT * from firstaids WHERE tags like '%$serachkeyword%'");
    }else{
    $data_ourfirstaids= executeQuery(selectQuery("firstaids"));
    }
    ?>
    <div class="outline" style="height:65px; background: #B6FAF5;">
    <table >
    	<tr>
    	<td class="photo" style="height: 0px;"><h3>Photo</h3></td>
        <td class="column" style="height: 0px;"><h3>Title</h3></td>
            <td class="column1" style="height: 0px;"><h3>Firstaids</h3></td>

            
</tr>
</table>
</div>
    <div class="NotifyUser" id="NotifyUser">
    </div>
<?php
$id=0;
foreach($data_ourfirstaids as $value){
$id++;
?>
<div class= <?php if($id%2==0){echo "even";}else{echo "odd";}?>>
<table id="tbl_firstaids">
<tr class="row">
           <td class="photo">    <img  style="width:2in; height:2in; margin-top: 3.5px; border-radius: 30px;" src="<?php print_r( $value["photos"] )?>" />
    </h3></b></td>
    <td class="column" id= "tbl_title"><b><h3><?php print_r( $value['title']); ?></h3></b> </td>
        <td class="column1" id="tbl_firstaid"><b><h3><?php print_r($value['firstaid']); ?></h3></b></td>
  
  </tr>
</table>
</div>
<?php } ?>
</body>
<script type="text/javascript">
    <?php
    
    if($data_ourfirstaids->num_rows==0){
    if($serachkeyword==""){?>
        document.getElementById("NotifyUser").innerHTML="There are no any Firstaids Listed at the moment!";
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
</html>


