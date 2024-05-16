<?php 
session_start();
header("location: login.php");
unset($_SESSION['admin_email']);

?>