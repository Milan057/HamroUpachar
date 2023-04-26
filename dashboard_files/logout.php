<?php
session_start();
include('error.php');
session_destroy();
header('location:../Frontend/home.php');
?>
