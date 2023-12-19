<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
<h1>LOG IN</h1>
<form action="" method="post">
<p>Usuario</p>
<input type="text" name="user">
<p>Contraseña</p>
<input type="text" name="password">
<button type="submit">Enviar</button>
</form>

<?php
    $usuario=htmlentities($_POST["user"]);
    $contrasena=htmlentities($_POST["password"]);
    if($usuario=="admin" && $contrasena=="H4CK3R4$1R"){
        echo "Acceso concedido";
    }
    else {
        echo "Acceso denegado";
    }

?>
</body>
</html>