<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php
    $palabras = array("Hola"=>"Hello", "Adiós"=>"Bye", "Te veo luego"=>"See you later");

    foreach($palabras as $espanol => $ingles) {
    echo  $espanol . " => " . $ingles;
    echo "<br>";
    }
    ?>
</body>
</html>