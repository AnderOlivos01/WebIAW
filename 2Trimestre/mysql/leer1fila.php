<?php
include 'conect.php';
$query="SELECT * FROM usuarios";
$resultado=$mysqli->query($query);
if($resultado->num_rows>0){
        $fila = $resultado->fetch_assoc();
        echo "<p><b>ID: </b>".$fila["id"]." <b>Nombre: </b>".$fila["username"]." <b>Contraseña: </b>".$fila["password"]."</p>";
}else{
    echo "No hay nada en esta tabla";
}
?>