function loginUsuario() {
    $.ajax({
        type:"POST",
        data:$('#frmLogin').serialize(),
        url:"procesos/usuarios/login/loginUsuario.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                window.location.href="vistas/home.php";
            } else {
                Swal.fire("Error al iniciar sesion.","El nombre de usuario o contraseña es incorrecto","error");
                //$(".swal2-modal").css('background-color', '#EC7063');
            }
        }
    });
    return false;
}