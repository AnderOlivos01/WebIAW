function borrar_incidencia(id) {
    $.ajax({
        url: 'borrar_incidencias.php',
        type: 'POST',
        data: { id: id },
        success: function () {
            document.getElementById('borrado_exito').classList.add('borrado','scale-in-center');
            setTimeout(function() {
                location.reload();
            }, 1500);
            
        },
        error: function () {
            alert('Error al borrar incidencia:');
        }
    });
}