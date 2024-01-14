function borrar_incidencia(id) {
    $.ajax({
        url: 'borrar_incidencias.php',
        type: 'POST',
        data: { id: id },
        success: function () {
            alert("Borrado con éxito");
            location.reload();
        },
        error: function () {
            alert('Error al borrar incidencia:');
        }
    });
}