<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <h1>Email PHP</h1>
    <form action="" method="get">
        <p>Destinatario</p>
        <input type="email" id="email" name="email">
        <p>Asunto</p>
        <input type="text">
        <p>Texto</p>
        <textarea name="cuerpo" id="cuerpo" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $asunto = $_GET["asunto"];
    $email = $_GET["email"];
    $cuerpo = $_GET["cuerpo"];
    if($asunto!='' && $email!='' && $cuerpo!=''){
        mail($email,$asunto,$cuerpo);
        echo "Correo enviado correctamente!";
    }
    else{
        echo "Rellene los campos, por favor.";
    }
    }
?>

</body>
</html>