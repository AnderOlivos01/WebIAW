<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha en español</title>
</head>
<body>
    <?php
        $feria=strtotime("23 April 2024");
        $hoy=time();
        $falta=round(($feria-$hoy)/(60*60*24),0);
        echo "Quedan ".$falta." días para la Feria de Abril de 2024";

    ?>
</body>
</html>