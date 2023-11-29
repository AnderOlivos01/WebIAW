<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="60">
    <title>Fecha en español</title>
</head>
<body>
    <?php
        setlocale(LC_ALL,"es_ES.UTF-8");
        echo ucwords(strftime("%A %d %B %Y %H:%M"));
    ?>
</body>
</html>