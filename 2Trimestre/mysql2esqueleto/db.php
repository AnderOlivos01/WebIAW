<?php
$hostname="sql213.thsite.top";
$username="thsi_35529605";
$password="4i!HfMrP";
$database="thsi_35529605_proyecto1";
$conn = new mysqli($hostname,$username,$password,$database);

if (!$conn) {                                             
    die("Conexión fallida con base de datos: " . mysqli_connect_error());     
  }
?>


