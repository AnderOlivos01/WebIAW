<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>
<body>
    <?php
        echo "<h1>Desordenado</h1>";
        $desordenado=["platano","melon","sandia","almendra"];
        foreach($desordenado as $des_val){
            echo "<p>$des_val</p>";
        };

        echo "<h1>Ordenado</h1>";
        sort($desordenado);
        foreach($desordenado as $ord_val){
            echo "<p>".$ord_val."</p>";
        }
    ?>
</body>
</html>