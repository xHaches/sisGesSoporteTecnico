$(document).ready(function() {
    $('#tablaReporteClienteLoad').load('reportesCliente/tablaReporteCliente.php');
});

function agregarNuevoReporte() {
    $.ajax({
        type: "POST",
        data: $('#frmNuevoReporte').serialize(),
        url: "../procesos/reportesCliente/agregarNuevoReporte.php",
        success: function(respuesta) {
            console.log(respuesta);
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#modalCrearReporte').modal('hide');
                $('#tablaReporteClienteLoad').load('reportesCliente/tablaReporteCliente.php');
                $('#frmNuevoReporte')[0].reset();
                Swal.fire("¡Hecho!", "Agregado con exito ", "success");
            } else {
                Swal.fire("¡Ups!", "Error al agregar " + respuesta, "error");
            }
        }
    });
    return false;

}


    function obtenerIdEquipo(idAsignacion){
        $.ajax({
            type: "POST",
            data: "idAsignacion=" + idAsignacion,
            url: "../procesos/reportesCliente/obtenerIdEquipo.php",
            success: function(respuesta) {
                console.log(respuesta);
                respuesta = jQuery.parseJSON(respuesta);
                $('#idEquipo').val(respuesta['idEquipo']);
            }
        });
        return false;
    }


function eliminarReporteCliente(idReporte){
    Swal.fire({
        title: '¿Estás seguro de eliminar el reporte?',
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
                data: "idReporte=" + idReporte,
                url: "../procesos/reportesCliente/eliminarReporteCliente.php",
                success: function(respuesta) {
                    if (respuesta == 1) {
                        $('#tablaReporteClienteLoad').load('reportesCliente/tablaReporteCliente.php');
                        Swal.fire("¡Hecho!", "Eliminado correctamente", "success");
                    } else {
                        Swal.fire("¡Ups!", "Fallo al eliminar" + respuesta, "error");
                    }
                }
            });
        }
    })

    return false;
}