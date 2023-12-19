<?php
$hostname="sql213.thsite.top";
$username="thsi_35529605";
$password="*";
$database="thsi_35529605_bdpruebas";
$mysqli = new mysqli($hostname,$username,$password,$database);

if ($mysqli -> connect_errno) {
  echo "Error de conexión" . $mysqli -> connect_error;
}
else{
    echo "<h1>¡Enhorabuena!</h1>";
    echo "<p>Estás conectado a la base de datos 'bdpruebas' de Anderson Olivos.</p>";
}
?>