<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta HTTP-EQUIV="Expires" CONTENT="no-cache">
    <title>Incidencias Informáticas - IES Antonio Machado</title>
    <link rel="shortcut icon" href="../media/icon-pequeno.png" type="image/x-icon">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body>
<?php include('verifica_session.php'); ?>
    <div id="container_father">
        <nav id="navegador" class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" target="_blank" href="https://iesamachado.es/">IES Antonio Machado</a>
                </div>
                <ul class="nav navbar-nav">
                <li><a href="app.php">Inicio</a></li>
                <li><a href="crear.php">Crear incidencia</a></li>
                <li class="active"><a href="resuelto.php">Incidencias resueltas</a></li>
                <li><a href="pendiente.php">Incidencias pendientes</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="http://anderolivos.thsite.top/mysql2/app/app.php"><span class="glyphicon glyphicon-user"></span><?php echo "$usuario"?></a></li>
                <li><a href="http://anderolivos.thsite.top/mysql2/index.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
                </ul>
            </div>
        </nav> 
    <div id="container-incidencias">
    <div id="incidencia-resuelta">
            <h2>Incidencias resueltas</h2>
                <?php
                    include('../conexion.php');
                    $resuelta_consultas='SELECT * FROM incidencia WHERE f_sol is not NULL';
                    $res_resuelta_consultas=mysqli_query($mysqli,$resuelta_consultas);
                    if($res_resuelta_consultas->num_rows>0){
                        echo "<table class='table'>
                        <thead class='thead-dark'>
                            <tr>
                            <th scope='col'>ID</th>
                            <th scope='col'>Aula</th>
                            <th scope='col'>Planta</th>
                            <th scope='col'>Descripción</th>
                            <th scope='col'>Alta</th>
                            <th scope='col'>Revisión</th>
                            <th scope='col'>Solucionado</th>
                            <th scope='col'>Comentario</th>
                            </tr>
                        </thead>
                        <tbody>";
                        for($i=0;$i<$res_resuelta_consultas->num_rows;$i++){
                            $fila_resuelta = $res_resuelta_consultas->fetch_assoc();
                            echo "<tr>
                            <th scope='row'>".$fila_resuelta['id']."</th>
                            <td>".$fila_resuelta['aula']."</td>
                            <td>".$fila_resuelta['planta']."</td>
                            <td>".$fila_resuelta['descripcion']."</td>
                            <td>".$fila_resuelta['f_alta']."</td>
                            <td>".$fila_resuelta['f_rev']."</td>
                            <td>".$fila_resuelta['f_sol']."</td>
                            <td>".$fila_resuelta['comentario']."</td>
                            </tr>";                     
                        }
                        echo "</tbody>
                            </table>";  
                    }else{
                        echo "<p>No hay incidencias resueltas</p>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>