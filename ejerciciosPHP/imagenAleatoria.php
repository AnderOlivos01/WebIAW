<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagen Aleatoria desde PHP</title>
</head>
<body>
    <?php
        $imagenes=[1,2,3];
        echo "<img src='".$imagenes[rand(0,2)].".png' alt='no se pudo cargar la imagen'>"
    ?>
</body>
</html>