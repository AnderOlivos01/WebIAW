<?php
include '../conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $borrar="DELETE FROM incidencia WHERE ID='".$id."'";
        $resultado_borrado=mysqli_execute_query($mysqli,$borrar);
    }
}
?>