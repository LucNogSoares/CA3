<?php 

if(!isset($_SESSION['admin_email'])) {
  header("location: login.php");
}

?>