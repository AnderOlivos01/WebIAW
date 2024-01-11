<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta HTTP-EQUIV="Expires" CONTENT="no-cache">
    <title>Incidencias Informáticas - IES Antonio Machado</title>
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="media/icon-pequeno.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>

<?php 
    session_start();
    session_destroy();
    session_unset();
?>

<div id="entrada">
    <div class="absoluto">
        <img id="img_carga" src="media/fix.gif" alt="hubo un error">
        <div id="loader">
            <svg id="circle">
                <circle cx="50%" cy="50%" r="48%" />
            </svg>
        </div>
    </div>
</div>

    <div id="container-father" class="center">
        <div id="child1" class="center">
            <img src="media/icon-pequeno.png" alt="hubo un error">
            <h1 class="incidencias">Incidencias <br> Informáticas</h1>
            <h4 class="machado">I.E.S. Antonio Machado</h4>

            <!--LOG IN -->

            <form action="" id="login" method="POST">
                <input type="hidden" name="vienedelform" value="si" />
                <p><strong>Usuario</strong></p>
                <input class="input-form" type="text" name="usuario">
                <p><strong>Contraseña</strong></p>
                <input class="input-form" type="password" name="contrasena">
                <input id="button-entrar" type="submit" value="Acceder">

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $usuario=mb_strtolower(htmlspecialchars($_POST["usuario"]));
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
                session_set_cookie_params(120);
                session_start();
                $_SESSION['usuario']=$usuario;
                $_SESSION['viene']=$_POST['vienedelform'];
                mysqli_close($mysqli);
                echo "<script>
                    document.getElementById('entrada').classList.add('center');
                    document.getElementById('circle').classList.add('circle-animation');
                    setTimeout(function() {
                    window.location.href = 'app/app.php';}, 1500);
                    </script>";
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