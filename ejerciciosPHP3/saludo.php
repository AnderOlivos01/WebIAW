<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Saludo</h1>
<p>Introduce tu nombre</p>
<form action="" method="post">
<input type="text" name="nombre">
<input type="submit" value="Enviar">
</form>

<?php
$hoy=date("j-m-y");
 echo "Hola ".$_POST["nombre"]." hoy es $hoy";
?>
</body>
</html>