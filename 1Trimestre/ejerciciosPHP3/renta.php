<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta</title>
</head>
<body>
    <h1>Calculadora de renta</h1>
    <form action="" method='post'>
        <p>Nombre</p>
        <input type="text" name='nombre'>
        <p>Apellido</p>
        <input type="text" name='apellido'>
        <p>Email</p>
        <input type="text" name='email'>
        <p>DNI</p>
        <input type="text" name='dni'>
        <p>Salario bruto</p>
        <input type="text" name='salario'>
        <br>
        <label>Colaboración con ONG (+2%)</label>
        <input type="checkbox" name='ayudaong'>
        <br>
        <button type='submit'>Calcular</button>
    </form>

    <?php
        function calcular_renta($porcentaje,$salary,$ong){
            if(!empty($ong)){
                echo "<p><b>Tipo impositivo:</b>".($porcentaje+2)."%</p>";
                $impuesto=($salary * ($porcentaje+2))/100;
            }
            else{
                echo "<p><b>Tipo impositivo:</b>".$porcentaje."%</p>";
                $impuesto=($salary * $porcentaje)/100;
            }
            echo "<p><b>Impuesto: </b>".$impuesto."</p>";
        }
        
        if($_SERVER['REQUEST_METHOD']=='POST'){

            foreach ($_POST as $key => $value) {
                $_POST[$key] = htmlspecialchars($value);
            }
            $name=$_POST['nombre'];
            $surname=$_POST['apellido'];
            $email=$_POST['email'];
            $dni=$_POST['dni'];
            $salary=$_POST['salario'];
            $ong=$_POST['ayudaong'];

            if($name=='' || $surname=='' || $email=='' || $dni=='' || $salary==''){
                echo "<h3>ERROR</h3><p>Hay campos vacíos.</p>";
            }
            else{
                if($salary<10000){
                    calcular_renta(5,$salary,$ong);
                }
                else{
                    if(10000<=$salary && $salary<20000){
                        calcular_renta(15,$salary,$ong);
                    }
                    else{
                        if(20000<=$salary && $salary<35000){
                            calcular_renta(20,$salary,$ong);
                        }
                        else{
                            if(35000<=$salary && $salary<60000){
                                calcular_renta(30,$salary,$ong);
                            }
                            else{
                                if($salary>60000){
                                    calcular_renta(45,$salary,$ong);
                                }
                                else{
                                    echo "ERROR. Revisar el valor del salario bruto.";
                                }
                            }
                        }
                    }
                }
            }
        }
    ?>

    </body>
</html>