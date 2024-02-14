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
            console.log('Error al borrar incidencia.');
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

function editar_incidencia(id) {
    $('#container-modal').show();
    $('#container-incidencias').hide();
    $('#recuento').hide();
    
    document.getElementById("boton-actualizar-incidencia").addEventListener("click",function(){
        var des = document.getElementById('form-descripcion').value;
        var revision = document.getElementById('form-frev').value;
        var solucion = document.getElementById('form-fsol').value;
        var comentario = document.getElementById('form-comentario').value;
        $.ajax({
            url: 'editar_incidencias.php',
            type: 'POST',
            data: { "id": id,"descripcion":des,"f_rev":revision,"f_sol":solucion,"comentario":comentario},
            success: function () {
                $('#container-modal').hide();
                $('#container-incidencias').hide();
                $('#recuento').hide();
                document.getElementById('editar-exito').classList.add('borrado','scale-in-center');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            },
            error: function () {
                console.log('Error al editar incidencia');
            }
        })
    })
}

function cerrar_modal(){
    $('#container-modal').hide();
    $('#container-incidencias').show();
    $('#recuento').show();
    $('.form-control').empty();
}