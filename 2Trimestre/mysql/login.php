<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PHP</title>
    <style>
        #correcto{
            font-weight:bold;
            color: green;
        }
        .error{
            font-weight:bold;
            color: red;
        }
    </style>
</head>
<body>
    <h1>Login PHP</h1>
    <form action="" method="post">
        <p>Usuario</p>
        <input type="text" name="usuario">
        <p>Contraseña</p>
        <input type="text" name="contrasena">
        <br><br>
        <input type="submit" value="Login">
    </form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuario=htmlspecialchars($_POST["usuario"]);
        $contrasena=htmlspecialchars($_POST["contrasena"]);
        if(!empty($usuario) && !empty($contrasena)){
            include 'conect.php';
            $existe_usuario="SELECT * FROM usuarios WHERE username='".$usuario."'";
            $consulta_existe=mysqli_query($mysqli,$existe_usuario);
            if(mysqli_num_rows($consulta_existe)>0){
                $query_contrasena="SELECT PASSWORD FROM usuarios WHERE username='".$usuario."'";
                $verifica_contrasena=mysqli_query($mysqli,$query_contrasena);
                $contrasena_bd=mysqli_fetch_array($verifica_contrasena);
                if(password_verify($contrasena,$contrasena_bd[0])){
                    echo "<p><strong id='correcto'>Login correcto.</strong> Bienvenido ".$usuario.".</p>";
                }
                else{
                    echo "<p><strong class='error'>Error: </strong>usuario o contraseña incorrecta.</p>";
                }
            }
            else{
                echo "<p><strong class='error'>Error: </strong>el usuario no existe.</p>";
            }
        }
        else{
            echo "<p><strong class='error'>Error: </strong>rellene todos los campos.</p>";
        }
    }
?>
</body>
</html>