$(document).ready(function() {
    $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
});


function agregarNuevoUsuario() {

    $.ajax({
        type: "POST",
        data: $('#frmAgregarUsuario').serialize(),
        url: "../procesos/usuarios/crud/agregarNuevoUsuario.php",
        success: function(respuesta) {

            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                $('#frmAgregarUsuario')[0].reset();
                $('#modalAgregarUsuarios').modal('hide');
                Swal.fire("¡Hecho!", "Usuario agregado correctamente" , "success");
            } else {
                Swal.fire("¡Ups!", "Ha ocurrido un error al agregar ", "error");
            }
        }
    });

    return false;
}

function obtenerDatosUsuario(idUsuario) {
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success: function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#idUsuario').val(respuesta['idUsuario']);
            $('#paternou').val(respuesta['paterno']);
            $('#maternou').val(respuesta['materno']);
            $('#nombreu').val(respuesta['nombrePersona']);
            $('#fechaNacimientou').val(respuesta['fechaNacimiento']);
            $('#sexou').val(respuesta['sexo']);
            $('#telefonou').val(respuesta['telefono']);
            $('#correou').val(respuesta['correo']);
            $('#usuariou').val(respuesta['nombreUsuario']);
            $('#idRolu').val(respuesta['idRol']);
            $('#ubicacionu').val(respuesta['ubicacion']);
        }
    });
}

function actualizarUsuario() {
    $.ajax({
        type: "POST",
        data: $('#frmActualizarUsuario').serialize(),
        url: "../procesos/usuarios/crud/actualizarUsuario.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                $('#modalActualizarUsuarios').modal('hide');
                Swal.fire("¡Hecho!", "Usuario actualizado correctamente", "success");
            } else {
                Swal.fire("¡Ups!", "Ha ocurrido un error al actualizar ", "error");
            }
        }
    });
    return false;
}

function agregarIdUsuarioReset(idUsuario){
    $('#idUsuarioReset').val(idUsuario);
}

function resetContra(){
    $.ajax({
        type: "POST",
        data: $('#frmCambiarContra').serialize(),
        url: "../procesos/usuarios/extras/cambiarContra.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#modalCambiarContra').modal('hide');
                Swal.fire("¡Hecho!", "Se ha actualizado la contraseña correctamente.", "success");
            } else {
                Swal.fire("¡Ups! ", "Ha ocurrido un error al actualizar la contraseña.", "error");
            }
        }
    });

    return false;
}

function cambioEstatusUsuario(idUsuario, estatus){
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario + "&estatus=" + estatus,
        url: "../procesos/usuarios/extras/cambioEstatus.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                Swal.fire("¡Hecho!", "Ha cambiado el estado del usuario", "success");
            } else {
                Swal.fire("¡Ups!", "Ha ocurrido un error", "error");
            }
        }
    });
}

function eliminarUsuario(idUsuario, idPersona){
    Swal.fire({
        title: 'Estas seguro que deseas elminar la asignacion?',
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
                data: "idUsuario=" + idUsuario + "&idPersona=" + idPersona,
                url: "../procesos/usuarios/crud/eliminarUsuario.php",
                success:function(respuesta){
                    respuesta = respuesta.trim();
                    if (respuesta == 1) {
                        $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                        Swal.fire("¡Hecho!", "Se ha eliminado al usuario correctamente", "warning");
                    } else {
                        Swal.fire("¡Ups!", "No es posible eliminar un usuario que cuenta con una asignación.", "error");
                    }
                }
            });
        }
    })
    return false;
}
