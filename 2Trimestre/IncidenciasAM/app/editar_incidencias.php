<?php
include '../conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id_editar = $_POST['id'];
        $descripcion_editar = $_POST['descripcion'];
        $f_rev_editar = $_POST['f_rev'];
        $f_sol_editar = $_POST['f_sol'];
        $comentario_editar = $_POST['comentario'];

        function checkeo_null(&$a) {
            if ($a == "") {
                $a = 'NULL';
            } else {
                $a = "'" . $a . "'";
            }
        }
        checkeo_null($descripcion_editar);
        checkeo_null($f_rev_editar);
        checkeo_null($f_sol_editar);
        checkeo_null($comentario_editar);

        $editar = "UPDATE incidencia SET descripcion="
            . $descripcion_editar . ", f_rev="
            . $f_rev_editar . ", f_sol="
            . $f_sol_editar . ", comentario="
            . $comentario_editar . " WHERE ID='"
            . $id_editar . "'";
        $resultado_editar = mysqli_query($mysqli, $editar);
    }
}
?>
