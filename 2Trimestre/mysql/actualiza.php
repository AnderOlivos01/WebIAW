<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualiza contraseña</title>
    <link rel="stylesheet" href="basedatos.css">
</head>
<body>
    <h1>Actualiza la contraseña</h1>
    <form action="" method="post">
    <p><strong>ID:</strong></p>
    <input type="text" name="id">
    <p><strong>Nueva contraseña:</strong></p>
    <input type="text" name="newpassword">
    <input type="submit" value="Cambiar">
    </form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $id=htmlspecialchars($_POST["id"]);
        $new=htmlspecialchars($_POST["newpassword"]);
        if($id!="" && $new!=""){
            include 'conect.php';
            $query1="SELECT * FROM usuarios WHERE id='".$id."'";
            $consulta1=mysqli_query($mysqli,$query1);
            if(mysqli_num_rows($consulta1)>0){
                $query2="UPDATE usuarios SET password='".$new."' WHERE id='".$id."'";
                $consulta2=mysqli_query($mysqli,$query2);
                echo "Contraseña actualizada";
            }
            else{
                echo "<p><strong>Error:</strong> ID inválido.</p>";
            }
        }
        else{
            echo "<p><strong>Error:</strong> rellene todos los campos.";
        }
    }
?>

<?php
include 'leer.php';
?>
</body>
</html>