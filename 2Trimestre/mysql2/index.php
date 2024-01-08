<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidencias Antonio Machado</title>
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="media/icon-pequeno.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div id="container-father" class="center">
        <div id="child1" class="center">
            <img src="media/icon-pequeno.png" alt="hubo un error al cargar la imagen">
            <h1 class="incidencias">Incidencias <br> Informáticas</h1>
            <h4 class="machado">I.E.S. Antonio Machado</h4>

            <!--LOG IN -->

            <form action="" id="login" method="POST">
                <p><strong>Usuario</strong></p>
                <input class="input-form" type="text" name="usuario">
                <p><strong>Contraseña</strong></p>
                <input class="input-form" type="password" name="contrasena">
                <input id="button-entrar" type="submit" value="Acceder">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $usuario=htmlspecialchars($_POST["usuario"]);
    $contrasena=htmlspecialchars($_POST["contrasena"]);
    if(!empty($usuario) && !empty($contrasena)){
        include 'conexion.php';
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
                echo "<p><strong class='error_login'>Error: </strong>usuario o contraseña incorrecta.</p>";
            }
        }
        else{
            echo "<p><strong class='error_login'>Error: </strong>usuario o contraseña incorrecta.</p>";
        }
    }
    else{
        echo "<p><strong class='error_login'>Error: </strong>rellene todos los campos.</p>";
    }
}
?>

            </form>
        </div>
    </div>
</body>
</html>