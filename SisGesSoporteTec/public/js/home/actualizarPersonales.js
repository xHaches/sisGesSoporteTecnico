function actualizarDatosPersonales(){
    $.ajax({
        type: "POST",
        data: $('#frmActualizarDatosPersonales').serialize(),
        url: "../procesos/home/actualizarPersonales.php",
        success:function(respuesta){
            respuesta = respuesta.trim();

            if (respuesta == 1) {
                Swal.fire(":D", "Actualizado correctamente", "success");
                $('#modalActualizarDatosPersonales').modal('hide');
                //location.reload();
            } else {
                Swal.fire(":c", "Fallo al actualizar" + respuesta, "error");
            }
        }
    });
    return false;
}

function obtenerDatosPersonalesInicio(idUsuario){
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url:  "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#nombreInicio').val(respuesta['nombrePersona']);
            $('#paternoInicio').val(respuesta['paterno']);
            $('#maternoInicio').val(respuesta['materno']);
            $('#telefonoInicio').val(respuesta['telefono']);
            $('#correoInicio').val(respuesta['correo']);
            $('#fechaNacInicio').val(respuesta['fechaNacimiento']);
        }
    });
}