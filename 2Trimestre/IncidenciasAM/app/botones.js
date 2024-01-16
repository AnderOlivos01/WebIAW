function borrar_incidencia(id) {
    $.ajax({
        url: 'borrar_incidencias.php',
        type: 'POST',
        data: { id: id },
        success: function () {
            $('#container-incidencias').hide();
            $('#recuento').hide();
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

function crear_incidencia(){
    document.getElementById('exito').classList.add('creado','scale-in-center');
    document.getElementById('container-crea-incidencia').style.display='none';
    setTimeout(function() {
                window.location.href = 'app.php';
            }, 1500);
}