$(document).ready(function() {
    $('#tablaAsiganacionesLoad').load('asignacion/tablaAsignacion.php');
});


function asignarEquipo() {
    $.ajax({
        type: "POST",
        data: $('#frmAsignaEquipo').serialize(),
        url: "../procesos/asignacion/asignar.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();

            if (respuesta == 1) {
                $('#frmAsignaEquipo')[0].reset();
                $('#tablaAsiganacionesLoad').load('asignacion/tablaAsignacion.php');
                $('#modalAsignarEquipo').modal('hide');
                Swal.fire("¡Hecho!", "Asignado correctamente", "success");
            } else {
                Swal.fire("¡Ups!", "Fallo al asignar", "error");
            }
        }
    });

    return false;
}

function eliminarAsignacion(idAsignacion) {

    Swal.fire({
        title: '¿Estas seguro que deseas elminar la asignación?',
        text: "¡Esta acción es irreversible!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data: "idAsignacion=" + idAsignacion,
                url: "../procesos/asignacion/eliminarAsignacion.php",
                success: function(respuesta) {
                    if (respuesta == 1) {
                        $('#tablaAsiganacionesLoad').load('asignacion/tablaAsignacion.php');
                        Swal.fire("¡Hecho!", "Se ha eliminado la asignación correctamente.", "success");
                    } else {
                        Swal.fire("¡Ups!", "No es posible eliminar una asignacion que han contado con reportes. ", "error");
                    }
                }
            });
        }
    })

    return false;
}

function obtenerDatosAsignacion(idAsignacion){
    $.ajax({
        type: "POST",
        data: "idAsignacion=" + idAsignacion,
        url: "../procesos/asignacion/obtenerDatosAsignacion.php",
        success:function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idAsignacion').val(respuesta['idAsignacion']);
            $('#dapsisU').val(respuesta['dapsis']);
            $('#marcaU').val(respuesta['marca']);
            $('#modeloU').val(respuesta['modelo']);
            $('#colorU').val(respuesta['color']);
            $('#descripcionU').val(respuesta['descripcion']);
            $('#monitorU').val(respuesta['monitor']);
            $('#perifericosU').val(respuesta['perifericos']);
            $('#almacenamientoU').val(respuesta['almacenamiento']);
            $('#ramU').val(respuesta['ram']);
            $('#procesadorU').val(respuesta['procesador']);
            $('#graficaU').val(respuesta['grafica']);
        }
    });
}

function actualizarAsignacion(idAsignacion){
    $.ajax({
        type: "POST",
        data: $('#frmActualizarAsignacion').serialize(),
        url: "../procesos/asignacion/actualizarAsignacion.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaAsiganacionesLoad').load("asignacion/tablaAsignacion.php");
                $('#modalActualizarAsignacion').modal('hide');
                Swal.fire("¡Hecho!", "Se ha actualizado la asignación correctamente", "success");
            } else {
                Swal.fire("¡Ups! ", "Error al actualizar ", "error");
            }
        }
    });
    return false;
}

/*  

*/