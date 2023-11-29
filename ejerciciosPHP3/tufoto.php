
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Foto</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    <p>Nombre</p>
    <input type="text" name="nombre">
    <p>Imagen</p>
    <input type="file" name="foto" id="i-foto">
    <br>
    <button type="submit">Enviar</button>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $user=$_POST["nombre"];
    
    $nombre_imagen=$_FILES['foto']['name'];
    $imagenTemporal=$_FILES['foto']['tmp_name'];
    
    $carpeta_destino='fotos/';
    $nuevaRuta=$carpeta_destino.$nombre_imagen;
    
    move_uploaded_file($imagenTemporal, $nuevaRuta);
    
    echo "<p>Bienvenido $user</p><br>";
    echo "<img src='$nuevaRuta'>";
}
?>
</body>
</html>