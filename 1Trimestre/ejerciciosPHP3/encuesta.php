<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta</title>
</head>
<body>
<h1>ENCUESTA</h1>
<form action="" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre">
    <label for="edad">Edad</label>
    <input type="number" name="edad" id="i-edad">
    <label for="terminos">Términos</label>
    <input type="checkbox" name="terminos" id="i-terminos">
    <button type="submit">Enviar</button>

<?php
    $datos=[$_POST["nombre"],$_POST["edad"],$_POST["terminos"]];
    foreach($datos as $data){
        echo "<p>$data</p>";
    }
?>

</form>
</body>
</html>