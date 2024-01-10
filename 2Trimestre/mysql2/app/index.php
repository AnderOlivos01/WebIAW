<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta HTTP-EQUIV="Expires" CONTENT="no-cache">
    <title>Incidencias Informáticas - IES Antonio Machado</title>
    <link rel="shortcut icon" href="../media/icon-pequeno.png" type="image/x-icon">
    <link rel="stylesheet" href="app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<?php include('verifica_session.php'); ?>
    <div id="entrada" class="center">
            <div class="absoluto">
                <img id="img_carga" src="../media/fix.gif" alt="hubo un error">
                <div id="loader">
                    <svg id="circle">
                      <circle cx="50%" cy="50%" r="48%" />
                    </svg>
                </div>
            </div>
            <h3 id="welcome"><?php echo "Bienvenido $usuario";?></h3>
    </div>


    <!--APLIACIÓN-->

    <div id="container_father">
        <div id="cabecera">
            <div id="usuario_cabecera" class="row_cabecera">
                <img src="../media/icon-user.png" alt="hubo un error">
                <h3><?php echo "$usuario"?></h3>
            </div>

            <div id="titulo_cabecera">
                <h3>INCIDENCIAS INFORMÁTICAS</h3>
            </div>

            <div id="exit_cabecera" class="row_cabecera">
                <p>Cerrar sesión</p>
                <a href="http://anderolivos.thsite.top/mysql2/index.php"><img src="../media/icon-exit.png" alt="hubo un error"></a>
            </div>
        </div>
        <div id="child1">
            <h3>Incidencias</h3>
        </div>
    </div>
    <div id="container_mas">
        <div id="mas">+</div>
    </div>

<script src="app.js"></script>
</body>
</html>