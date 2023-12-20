<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leer</title>
    <link rel="stylesheet" href="basedatos.css">
</head>
<body>
<?php
include 'conect.php';
$query="SELECT * FROM usuarios";
$resultado=$mysqli->query($query);
if($resultado->num_rows>0){
    echo "<div id='basedatos'><h3>BASE DE DATOS</h3>";
    for($i=0;$i<$resultado->num_rows;$i++){
        $fila = $resultado->fetch_assoc();
        echo "<div class='basedatos-row'><p><b>ID: </b>".$fila["id"]."</p><p><b>Nombre: </b>".$fila["username"]."</p><p><b>Contraseña: </b>".$fila["password"]."</p></div>";
    }
    echo "</div>";
}else{
    echo "No hay nada en esta tabla";
}
?>
</body>
</html>