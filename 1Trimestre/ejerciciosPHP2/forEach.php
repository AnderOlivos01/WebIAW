<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php
        $refranes=["Más vale tarde que nunca.","El que mucho abarca, poco aprieta.","Quien siembra vientos, cosecha tempestades.","No dejes para mañana lo que puedas hacer hoy.","En boca cerrada no entran moscas."];
        foreach ($refranes as $ref){
            echo "<p>$ref</p>";
        }
    ?>
</body>
</html>