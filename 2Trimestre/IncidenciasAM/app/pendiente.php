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
<script src="boton.js"></script>
<?php include 'verifica_session.php'; ?>
    <div id="container_father">
        <nav id="navegador" class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" target="_blank" href="https://iesamachado.es/">IES Antonio Machado</a>
                </div>
                <ul class="nav navbar-nav">
                <li><a href="app.php">Inicio</a></li>
                <li><a href="crear.php">Crear incidencia</a></li>
                <li><a href="resuelto.php">Incidencias resueltas</a></li>
                <li class="active"><a href="pendiente.php">Incidencias pendientes</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="http://anderolivos.thsite.top/mysql2/app/app.php"><span class="glyphicon glyphicon-user"></span><?php echo "$usuario"?></a></li>
                <li><a href="http://anderolivos.thsite.top/mysql2/index.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
                </ul>
            </div>
        </nav> 
        <!--DIV MODAL DE EDICIÓN-->
        <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Editar incidencia</h3>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                            <div class="form-group">
                                <label for="descripcion" class="col-form-label">Descripción:</label>
                                <input type="text" class="form-control" id="form-descripcion" name="descripcion">
                            </div>
                            <div class="form-group">
                                <label for="f_revision" class="col-form-label">Fecha revisión:</label>
                                <input class="form-control form-control-sm" id="form-frev" type="date" name="f_revision">
                            </div>
                            <div class="form-group">
                                <label for="f_solucion" class="col-form-label">Fecha solución:</label>
                                <input class="form-control form-control-sm" id="form-fsol" type="date" name="f_solucion">
                            </div>
                            <div class="form-group">
                                <label for="comentario" class="col-form-label">Comentario:</label>
                                <input type="text" class="form-control" id="form-comentario" name="comentario" placeholder="Todo solucionado...">
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="button" id="boton-editar" class="btn btn-primary">Guardar cambios</button>
                        </div>
                        </div>
                    </div>
                </div>
        <div id="borrado_exito">
            <div class="container-trash"><img src="../media/icon-trash.png" alt="hubo un error"></div>
            <h3>Incidencia borrada</h3>
        </div>

        <div id="editar_exito">
            <img src="../media/icon-correcto.png" alt="hubo un error">
            <h3>Incidencia editada correctamente</h3>
        </div>
    <div id="container-incidencias">
    <div id="container-incidencia-pendiente">
            <h2 class="texto-centrado">Incidencias pendientes</h2>
                <?php
                    include('../conexion.php');
                    $consulta_pendiente='SELECT i.id,a.aula,p.nombre,i.descripcion,i.f_alta,i.f_rev,i.f_sol,i.comentario FROM incidencia i,aula a,planta p WHERE i.aula=a.id AND a.planta=p.id AND f_sol is NULL';
                    $res_consulta_pendiente=mysqli_query($mysqli,$consulta_pendiente);
                    if($res_consulta_pendiente->num_rows>0){
                        echo "<table class='table'>
                        <thead class='thead-dark'>
                            <tr>
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
                            <td>".$fila_pendiente['aula']."</td>
                            <td>".$fila_pendiente['nombre']."</td>
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
                            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editarModal' onclick='editar_incidencia(".$fila_pendiente['id'].")'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
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
        </div>
    </div>
</body>
</html>