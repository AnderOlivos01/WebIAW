<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sortea2</title>
</head>
<body>
    <h1>Sortea2</h1>
    <form action="" method="post">
        <p>Introduce el nombre de los participantes</p>
        <textarea name="users" cols="30" rows="10" ></textarea>
        <p>Introduce el número de premios</p>
        <input type="number" name="n_users">
        <button type="submit">Sortear</button>
    </form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){    
    /*Creación de variables*/
    $usuarios=$_POST["users"];
    $n_premios=$_POST["n_users"];

    /*Creación del array de usuarios*/
    $array_usuario = explode("\n", $usuarios);


    if(sizeof($array_usuario)== 0 || $n_premios==null || $n_premios==0){
        echo "<p>Participantes vacíos o número de premios vacíos<p>";
    }
    else{
        if($n_premios<=sizeof($array_usuario)){
            /*Mezclar aleatoriamente el array*/
            shuffle($array_usuario);
            echo "<h2>Los ganadores son:</h2>";
            for($i=0;$i<$n_premios;$i++){
                echo "<p><strong>Ganador ".($i+1).": </strong>".$array_usuario[$i]."</p>";
            }
        }
        else{
            echo "<p>El número de premios no puede ser superior al número de participantes</p>";
        }
    }

}
?>
</body>
</html>