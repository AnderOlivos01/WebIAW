<?php
include '../conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['id']));
        $borrar="DELETE FROM incidencia WHERE ID='".$id."'";
        $resultado_borrado=mysqli_execute_query($mysqli,$borrar);
    }
}
else{
    header('Location: http://anderolivos.thsite.top/IncidenciasAM');
    session_abort();
    die();
}
?>