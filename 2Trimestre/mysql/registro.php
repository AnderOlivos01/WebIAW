<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro PHP</title>
</head>
<body>
    <h1>Registro</h1>
    <form action="" method="post">
        <p>Usuario</p>
        <input type="text" name='usuario'>
        <p>Contraseña</p>
        <input type="text" name='contrasena'>
        <p>Nombre completo</p>
        <input type="text" name='completo'>
        <p>Email</p>
        <input type="email" name='email'>
        <br>
        <br>
        <input type="submit" value="Registrar">
    </form>
    <br>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuario=htmlspecialchars($_POST['usuario']);
        $contrasena=htmlspecialchars($_POST['contrasena']);
        $fullname=htmlspecialchars($_POST['completo']);
        $email=htmlspecialchars($_POST['email']);

        if($usuario!="" && $contrasena!="" && $fullname!="" && $email!=""){
            include 'conect.php';
            $query_existe = "SELECT * FROM usuarios WHERE USERNAME='".$usuario."'";
            $consulta_existe = mysqli_query($mysqli,$query_existe);
            if(mysqli_num_rows($consulta_existe)>0){
                echo "<p><strong>Error: </strong>este usuario ya existe. Por favor, elija otro nombre de usuario.";
            }
            else{
                $query="INSERT INTO usuarios VALUES (NULL,'".$usuario."','".$contrasena."','".$fullname."','".$email."')";
                $insert = mysqli_query($mysqli,$query);
                if($insert){
                    $subject = "¡Enhorabuena! Te has registrado con éxito.";
                    $txt = "<p>Tus datos son los siguientes:</p>";
                    $headers = "From: andersonolivos01@iesamachado.org" . "\r\n" .
                    "CC: ".$email;

                    mail($email,$subject,$txt,$headers);

                    echo "<p><strong>Se ha registrado con éxito: </strong>revise su correo y verifique sus datos.</p>";
                }
                else{
                    echo "<p><strong>Error: </strong>conexión fallida.";
                }
                }
        }
        else{
            echo "<p><strong>Error: </strong>rellene todos los campos.";
            }
    }
?>
</body>
</html>