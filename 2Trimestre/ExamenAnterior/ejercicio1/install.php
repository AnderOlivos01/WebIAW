<?php

/*CONEXIÓN A LA BASE DE DATOS*/

$hostname="sql213.thsite.top";
$username="thsi_35529605";
$password="4i!HfMrP";
$database="thsi_35529605_examenanterior";
$mysqli = new mysqli($hostname,$username,$password,$database);

if($mysqli){

    echo "<p>CONECTADO A LA BASE DE DATOS CORRECTAMENTE</p>";

    /*COGEMOS EL CONTENIDO DEL FICHERO INSTALL.SQL*/

    $create_sql=file_get_contents('install.sql');
    echo "$create_sql";

    /*CREAMOS LA TABLA USUARIO*/

    $create_query=mysqli_query($mysqli,$create_sql);

    if($create_query) {
        echo "<p>TABLA CREADA CORRECTAMENTE</p>";
    }
}
else{
    echo "<p>ERROR CONEXIÓN BASE DE DATOS</p>";
}
?>
