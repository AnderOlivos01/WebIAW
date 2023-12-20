<?php
include 'conect.php';
if ($mysqli -> connect_errno) {
  echo "Error de conexión" . $mysqli -> connect_error;
}
else{
    echo "<h1>¡Enhorabuena!</h1>";
    echo "<p>Estás conectado a la base de datos 'bdpruebas' de Anderson Olivos.</p>";
}
?>