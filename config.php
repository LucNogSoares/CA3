<?php 

function connectDB() 
{
  $server="localhost";
  $dbuser="root";
  $password="";
  $database = "property";

  $link = mysqli_connect($server,$dbuser,$password);
  mysqli_select_db($link, $database);
  return $link;
}

$conn = connectDB()

?>