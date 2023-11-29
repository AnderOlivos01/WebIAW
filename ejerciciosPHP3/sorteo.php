<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    <h1>Sorteo</h1>
    <form action="" method="post">
    <p>Elige el número de participantes</p>  
    <input type="number" name="sorteo">
    <button type="submit">Sortear</button>    
    </form>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $numero=$_POST["sorteo"];
    if($numero!=null){
        if($numero<=0){
            echo "Número de participantes no válido";
        }
        else{
            $rand_numero=rand(1,$numero);
            echo "El participantes ganador es: <strong>$rand_numero</strong>";
        }
    }
    else{
        echo "Elija una número de participantes por favor";
    }
}
?>
</body>
</html>