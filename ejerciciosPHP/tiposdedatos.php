<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos De Datos</title>
</head>
<body>
    <h1>Tipos De Datos</h1>
    <?php
    $entero=3;
    $real=1/3;
    $booleano=true;
    $array=[1,2,3,4];
    
    echo "<h2>LADO DEL SERVIDOR</h2>";
    echo var_dump($entero);
    echo var_dump($real);
    echo var_dump($booleano);
    echo var_dump($array);
    echo var_dump($entero);
    
    ?>
</body>
</html>