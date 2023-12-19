<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <h1>Habitaciones PHP</h1>
    <form action="" method="POST">
        <p>Nombre</p>
        <input type="text" name="nombre">
        <p>Apellido</p>
        <input type="text" name="apellido">
        <p>Email</p>
        <input type="email" name="email">
        <p>DNI</p>
        <input type="text" name="dni">
        <p>Tipo de habitación</p>
        <select name="habitacion" id="tipo">
            <option value="0" id="option0">Simple (65€)</option>
            <option value="1" id="option1">Doble (80€)</option>
            <option value="2" id="option2">Triple (140€)</option>
            <option value="3" id="option3">Suite (180€)</option>
        </select>
        <br><br>
        <input type="submit" value="Reservar">
    </form>

    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $tipo_habitacion=["Simple (65€)","Doble (80€)","Triple (140€)","Suite (180€)"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $email=$_POST["email"];
        $dni=$_POST["dni"];
        $habitacion = $_POST["habitacion"];
        if($nombre!='' && $apellido!='' && $email!='' && $dni!=''){
            echo "<div><h3>Felicidades $nombre $apellido!</h3><p>Tu reserva se ha completado correctamente.</p><h4>Informarción:</h4></p>";
            echo "<p><b>Nombre:</b> $nombre</p>";
            echo "<p><b>Apellido:</b> $apellido</p>";
            echo "<p><b>Email:</b> $email</p>";
            echo "<p><b>DNI:</b> $dni</p>";
            echo "<p><b>Habitación:</b> $tipo_habitacion[$habitacion]</p>";
            echo "<img style='width: 250px;' src='imagenes/hab$habitacion.png'>";
            echo "</div>";
        }
        else{
            echo "<p><strong>ERROR.</strong> Rellene todos los campos, por favor.</p>";
        }
     }
?>
</body>
</html>