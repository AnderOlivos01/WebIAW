<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir columnas</title>
</head>
<body>
<?php
include 'conect.php';

$query_existe1="SELECT *
FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_NAME='usuarios' AND COLUMN_NAME='fullname'";

$query_existe2="SELECT *
FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_NAME='usuarios' AND COLUMN_NAME='email'";

$consulta1=mysqli_query($mysqli,$query_existe1);
if(mysqli_num_rows($consulta1)>0){
    echo "<p>La columna 'fullname' ya existe en la base de datos.</p>";
}
else{
    $query_fullname="ALTER TABLE usuarios ADD fullname text";
    $añadido1=mysqli_query($mysqli,$query_fullname);
    echo "<p>Se ha añadido correctamente la columna 'fullname'</p>";

}

$consulta2=mysqli_query($mysqli,$query_existe2);
if(mysqli_num_rows($consulta2)>0){
    echo "<p>La columna 'email' ya existe en la base de datos.</p>";
}
else{
    $query_email="ALTER TABLE usuarios ADD email text";
    $añadido2=mysqli_query($mysqli,$query_email);
    echo "<p>Se ha añadido correctamente la columna 'email'</p>";
}
?>
</body>
</html>