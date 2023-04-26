<?php
if(!isset($_SESSION['admin_username'])){
	header('location:../admin.php?err=1');
}
?>