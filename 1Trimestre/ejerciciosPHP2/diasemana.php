<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha en español</title>
</head>
<body>
    <?php
        setlocale(LC_ALL,"es_ES.UTF-8");
        $diaSemana=ucwords(strftime("%A"));
        switch($diaSemana){
            case "Lunes":
                echo "Hoy es Lunes con L de LUEGO ME ECHO UNA SIESTA";
                break;
            case "Martes":
                echo "Hoy es Martes con M de ME QUIERO MORIR";
                break;
            case "Miércoles":
                echo "Hoy es Miércoles con M de MIERDA DE DÍA";
                break;
            case "Jueves":
                echo "Hoy es Jueves con J de JODER QUE YA LLEGA EL FINDE!!";
                break;
            case "Viernes":
                echo "Hoy es Viernes con V de VAMO A BEBER!!";
                break;
            case "Sábado":
                echo "Hoy es Sábado con S de SI SII HOY SE SALE OTRA VEZ!!!";
                break;
            case "Domingo":
                echo "Hoy es Domingo con D de DORMIR TODO EL DÍA";
                break;
            default:
                echo "Vaya...parece que hubo un error";
                break;
            
        }

    ?>
</body>
</html>