<?php
 include('../connection.php');  
if(isset($_POST['ignoreentry'])){   
  $id_to_remove=$_POST["newentry_id"];   
    $remove="DELETE from register where id=$id_to_remove";   
      mysqli_query($con,$remove);    
        header('location:newentry.php');
         } ?>
