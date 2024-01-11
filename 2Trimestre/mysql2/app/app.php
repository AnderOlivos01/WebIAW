<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta HTTP-EQUIV="Expires" CONTENT="no-cache">
    <title>Incidencias Informáticas - IES Antonio Machado</title>
    <link rel="shortcut icon" href="../media/icon-pequeno.png" type="image/x-icon">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="crear_incidencia.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        <nav id="navegador" class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" target="_blank" href="https://iesamachado.es/">IES Antonio Machado</a>
                </div>
                <ul class="nav navbar-nav">
                <li class="active"><a href="#container-incidencias">Inicio</a></li>
                <li><a href="crear.php">Crear incidencia</a></li>
                <li><a href="#incidencia-resuelta">Incidencias resueltas</a></li>
                <li><a href="#incidencia-pendiente">Incidencias pendientes</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="http://anderolivos.thsite.top/mysql2/app/app.php"><span class="glyphicon glyphicon-user"></span><?php echo "$usuario"?></a></li>
                <li><a href="http://anderolivos.thsite.top/mysql2/index.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
                </ul>
            </div>
        </nav> 
        <div id="container-incidencias">
            <div id="incidencia-todo">
                <h3>Todas las incidencias</h3>
            </div>
            <div id="incidencia-pendiente">
                <h3>Incidencias pendientes</h3>
            </div>
            <div id="incidencia-resuelta">
                <h3>Incidencias resueltas</h3>
            </div>
            <h3>Incidencias</h3>
        </div>
    </div>
<script src="app.js"></script>
</body>
</html>