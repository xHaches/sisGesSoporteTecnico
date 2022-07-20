$(document).ready(function(){
    $('#tablaReporteAdminLoad').load('reportesAdmin/tablaReportesAdmin.php');
});


function eliminarReporteAdmin(idReporte){
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
                data: "idReporte=" + idReporte,
                url: "../procesos/reportesCliente/eliminarReporteCliente.php",
                success: function(respuesta) {
                    if (respuesta == 1) {
                        $('#tablaReporteAdminLoad').load('reportesAdmin/tablaReportesAdmin.php');
                        Swal.fire("¡Hecho!", "Eliminado correctamente", "success");
                    } else {
                        Swal.fire("¡Ups! ", "Fallo al eliminar", "error");
                    }
                }
            });
        }
    })

    return false;
}


function obtenerDatosSolucion(idReporte){
    $.ajax({
        type: "POST" ,
        data: "idReporte=" + idReporte,
        url: "../procesos/reportesAdmin/obtenerSolucion.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idReporte').val(respuesta['idReporte']);
            $('#solucion').val(respuesta['solucion']);
            $('#estatus').val(respuesta['estatus']);
        }
    });
}

function agregarSolucionReporte(){
    $.ajax({
        type: "POST",
        data: $('#frmAgregarSolucionReporte').serialize(),
        url: "../procesos/reportesAdmin/actualizarSolucion.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if (respuesta == 1){
                $('#modalAgregarSolucionReporte').modal('hide');
                $('#tablaReporteAdminLoad').load('reportesAdmin/tablaReportesAdmin.php');
                Swal.fire("¡Hecho!", "Se ha actualizado el reporte con los cambios", "success");
            } else{
                Swal.fire("¡Ups! ", "Fallo", "error");
            }
        }
    })
    return false;
}