<form id="frmCambiarContra" onsubmit = "return resetContra()" method ="POST">
 <!-- Modal -->
    <div class="modal fade" id="modalCambiarContra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark text-white">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <input type="text" hidden id = "idUsuarioReset" name = "idUsuarioReset">
                <label for="">Escribe la nueva contraseña:</label>
                <input type="password" id="cambiarContra" name ="cambiarContra" class = "form-control"required>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button class="btn btn-warning"><span class="fa-solid fa-key"></span> Cambiar contraseña</button>
        </div>
        </div>
    </div>
    </div>
</form>