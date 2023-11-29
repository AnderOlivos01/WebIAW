<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>
<body>
    <?php
    $ip_address = $_SERVER['REMOTE_ADDR'];

    echo "<h1>Información de Conexión</h1>";
    echo "<p><strong>Dirección IP:</strong> $ip_address</p>";
    ?>
</body>
</html>