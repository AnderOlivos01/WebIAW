<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar un usuario</title>
</head>
<body>
    <form action="" method="post">
        <p>Usuario</p>
        <input type="text" name="username">
        <p>Contraseña</p>
        <input type="text" name="password">
        <input type="submit" value="Enviar">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'conect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];

    if($username!="" && $password!=""){
        $insert="INSERT INTO usuarios (id, username, password) VALUES (NULL,'".$username."','".$password."')";
        $result=$mysqli->query($insert);
        if($result){
            echo "<p>Se ha insertado correctamente.</p>";
        }
        else{
            echo "<p>Vaya...parece que hubo un error de conexión.</p>";
        }
    }else{
        echo "<p><b>Error:</b> rellene todos los campos.</p>";
    }
}


echo "<h3>Usuarios en la base de datos:</h3>";
include 'leer.php';

?>
</body>
</html>