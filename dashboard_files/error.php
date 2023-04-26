<?php
if(!isset($_SESSION['admin_username'])){
	header('location:../formvalidation.php?err=1');
}
?>