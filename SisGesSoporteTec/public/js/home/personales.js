function datosPersonalesInicio(idUsuario){
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url:  "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#nombrePersona').text(respuesta['paterno'] + ' ' + respuesta['materno'] + ' ' + respuesta['nombrePersona']);
            $('#telefono').text(respuesta['telefono']);
            $('#correo').text(respuesta['correo']);
            $('#edad').text(respuesta['fechaNacimiento']);
        }
    });
}

