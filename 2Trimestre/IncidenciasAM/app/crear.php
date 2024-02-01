<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidencias Informáticas - IES Antonio Machado</title>
    <link rel="shortcut icon" href="../media/icon-pequeno.png" type="image/x-icon">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="crear.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<script src="botones.js"></script>
<?php include 'verifica_session.php'; ?>

    <nav id="navegador" class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" target="_blank" href="https://iesamachado.es/">IES Antonio Machado</a>
            </div>
            <ul class="nav navbar-nav">
            <li><a href="app.php">Inicio</a></li>
            <li class="active"><a href="crear.php">Crear incidencia</a></li>
            <li><a href="resuelto.php">Incidencias resueltas</a></li>
            <li><a href="pendiente.php">Incidencias pendientes</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="app.php"><span class="glyphicon glyphicon-user"></span><?php echo "$usuario"?></a></li>
            <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>
    <div id="exito">
            <img src="../media/icon-correcto.png" alt="hubo un error">
            <h3>Incidencia creada</h3>
    </div>

<div id="container-crea-incidencia">
            <h2>Crear incidencia</h2>
            <form id="form-crea" method="POST" action="">
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="planta">Planta <span class="obligatorio">(*)</span></label>
                    <select class="form-control form-control-sm" name="planta" id="form-planta" required>
                        <option selected value=0>Planta baja</option>
                        <option value=1>Primera planta</option>
                        <option value=2>Segunda planta</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="aula">Aula <span class="obligatorio">(*)</span></label>
                    <select class="form-control form-control-sm" name="aula" id="form-aula" required>
                        <option selected  value=1>Aula 1</option>
                        <option value=2>Aula 2</option>
                        <option value=3>Aula 3</option>
                        <option value=4>Aula 4</option>
                        <option value=5>Aula 5</option>
                        <option value=6>Aula 6</option>
                        <option value=7>Aula 7</option>
                        <option value=8>Aula 8</option>
                        <option value=9>Aula 9</option>
                        <option value=10>Aula 10</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="inputAddress">Descripción <span class="obligatorio">(*)</span></label>
                        <input type="text" class="form-control" id="form-descripcion" required name="descripcion" placeholder="La luz no funciona...">
                      </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputAddress2">Fecha Alta <span class="obligatorio">(*)</span></label>
                        <input class="form-control form-control-sm" type="date" id="f_alta" name="f_alta" min="" required value="">
                      </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputCity">Fecha Revisión</label>
                        <input class="form-control form-control-sm" type="date" id="f_revision" name="f_revision" min="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputCity">Fecha Solución</label>
                        <input class="form-control form-control-sm" type="date" id="f_solucion" name="f_solucion" min="">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputCity">Comentario</label>
                        <input type="text" class="form-control" id="form-comentario" name="comentario" placeholder="Todo solucionado...">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-success">Crear</button>
                    </div>
                </div>
              </form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $planta=htmlspecialchars($_POST["planta"]);
    $aula=htmlspecialchars($_POST["aula"]);
    $descripcion=htmlspecialchars($_POST["descripcion"]);
    $f_alta=htmlspecialchars($_POST["f_alta"]);
    $f_rev=htmlspecialchars($_POST["f_revision"]);
    $f_sol=htmlspecialchars($_POST["f_solucion"]);
    $comentario=htmlspecialchars($_POST["comentario"]);

    /*Comprobamos si los valos no obligatorios están vacíos*/

    function checkeo_null(&$a){if($a==""){$a='NULL';}else{$a="'".$a."'";}}

    checkeo_null($f_rev);checkeo_null($f_sol);checkeo_null($comentario);

    /*Insertamos los datos en la tabla de la base de datos*/

    if($planta!="" && $aula!="" && $descripcion!="" && $f_alta!=""){
        include '../conexion.php';
        $consulta_id_aula="select id from aula where aula=".$aula." and planta='".$planta."'";
        $id_aula=mysqli_query($mysqli,$consulta_id_aula);
        $id_aula=mysqli_fetch_assoc($id_aula);
        $crea_incidencia="INSERT INTO incidencia (id,aula,descripcion,f_alta,f_rev,f_sol,comentario) VALUES (NULL,".$id_aula['id'].",'".$descripcion."','".$f_alta."',".$f_rev.",".$f_sol.",".$comentario.")";
        $añadido=mysqli_query($mysqli,$crea_incidencia);
        if (!$añadido) {
            die('Error en la consulta: ' . mysqli_error($mysqli));
        }
        mysqli_close($mysqli);
        echo "<script>crear_incidencia()</script>";
    }
    else{
        echo "<p><strong class='error_login'>Error: </strong>rellene los campos obligatorios.</p>";
    }
}
?>
        </div>
<script>
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById('f_alta').min = today;
    document.getElementById('f_alta').value = today;

    var valorAlta = document.getElementById('f_alta').value;

    document.getElementById('f_revision').min=valorAlta;
    document.getElementById('f_solucion').min=valorAlta;
</script>
</body>
</html>
