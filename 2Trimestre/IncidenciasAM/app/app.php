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
<script src="botones.js"></script>
<?php include 'verifica_session.php';include('../conexion.php'); ?>
<?php 
    $todas_consultas='SELECT * FROM incidencia';
    $res_todas_consultas=mysqli_query($mysqli,$todas_consultas);
    $consulta_pendiente='SELECT * FROM incidencia WHERE f_sol is NULL';
    $res_consulta_pendiente=mysqli_query($mysqli,$consulta_pendiente);
    $resuelta_consultas='SELECT * FROM incidencia WHERE f_sol is not NULL';
    $res_resuelta_consultas=mysqli_query($mysqli,$resuelta_consultas);
?>
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
                    <li><a href="resuelto.php">Incidencias resueltas</a></li>
                    <li><a href="pendiente.php">Incidencias pendientes</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="app.php"><span style="margin-right: 10px;" class="glyphicon glyphicon-user"></span><?php echo "$usuario"?></a></li>
                    <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
                </ul>
            </div>
        </nav> 
        <div id="borrado_exito">
            <img src="../media/icon-correcto.png" alt="hubo un error">
            <h3>Incidencia creada</h3>
        </div>
        <div id="recuento">
            <p><strong>Incidencias Totales:</strong> <?php echo ($res_todas_consultas->num_rows); ?></p>
            <p><strong>Incidencias Pendientes:</strong> <?php echo ($res_consulta_pendiente->num_rows); ?></p>
            <p><strong>Incidencias Resueltas:</strong> <?php echo ($res_resuelta_consultas->num_rows); ?></p>
        </div>
        <div id="container-incidencias">
            <div id="container-incidencia-todo">
                <h2 class="texto-centrado">Todas las incidencias</h2>
                <?php
                    if($res_todas_consultas->num_rows>0){
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
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>";
                        for($i=0;$i<$res_todas_consultas->num_rows;$i++){
                            $fila = $res_todas_consultas->fetch_assoc();
                            echo "<tr>
                            <th scope='row'>".$fila['id']."</th>
                            <td>".$fila['aula']."</td>
                            <td>".$fila['planta']."</td>
                            <td>".$fila['descripcion']."</td>
                            <td>".$fila['f_alta']."</td>
                            <td>".$fila['f_rev']."</td>
                            <td>".$fila['f_sol']."</td>
                            <td>".$fila['comentario']."</td>
                            <td><div>
                            <button type='button' class='btn btn-danger' onclick='borrar_incidencia(".$fila['id'].")'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'></path>
                            <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'></path>
                            </svg></button>
                            <button type='button' class='btn btn-primary' onclick='borrar_incidencia(".$fila['id'].")'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                            <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z'></path>
                            </svg></button>
                            </div></td>
                            </tr>";                     
                        }
                        echo "</tbody>
                        </table>";
                    }else{
                        echo "<p style='text-align:center;'>No hay ninguna incidencia</p>";
                    }
                ?>
            </div>
            <div id="container-incidencia-pendiente">
            <h2 class="texto-centrado">Incidencias pendientes</h2>
            <?php
                    if($res_consulta_pendiente->num_rows>0){
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
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>";
                        for($i=0;$i<$res_consulta_pendiente->num_rows;$i++){
                            $fila_pendiente = $res_consulta_pendiente->fetch_assoc();
                            echo "<tr>
                            <th scope='row'>".$fila_pendiente['id']."</th>
                            <td>".$fila_pendiente['aula']."</td>
                            <td>".$fila_pendiente['planta']."</td>
                            <td>".$fila_pendiente['descripcion']."</td>
                            <td>".$fila_pendiente['f_alta']."</td>
                            <td>".$fila_pendiente['f_rev']."</td>
                            <td>".$fila_pendiente['f_sol']."</td>
                            <td>".$fila_pendiente['comentario']."</td>
                            <td><div>
                            <button type='button' class='btn btn-danger' onclick='borrar_incidencia(".$fila_pendiente['id'].")'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'></path>
                            <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'></path>
                            </svg></button>
                            <button type='button' class='btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                            <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z'></path>
                            </svg></button>
                            </div></td>
                            </tr>";                     
                        }
                        echo "</tbody>
                        </table>";
                    }else{
                        echo "<p style='text-align:center;'>No hay incidencias pendientes</p>";
                    }
                ?>   
                         
            </div>
            <div id="incidencia-resuelta">
            <h2 class="texto-centrado">Incidencias resueltas</h2>
            <?php
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
                            <th></th>
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
                            <td><div>
                            <button type='button' class='btn btn-danger' onclick='borrar_incidencia(".$fila_resuelta['id'].")'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'></path>
                            <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'></path>
                            </svg></button>
                            <button type='button' class='btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                            <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z'></path>
                            </svg></button>
                            </div></td>
                            </tr>";                     
                        }
                        echo "</tbody>
                        </table>";
                    }else{
                        echo "<p style='text-align:center;'>No hay incidencias resueltas</p>";
                    }
                ?>
                
            </div>
        </div>
    </div>

</body>
</html>