<form id="frmActualizarDatosPersonales" method="POST" onsubmit = "return actualizarDatosPersonales()">
    <!-- Modal -->
    <div class="modal fade" id="modalActualizarDatosPersonales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Datos Personales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="nombreInicio">Nombre:</label>
                    <input type="text" class ="form-control" id="nombreInicio" name="nombreInicio">
                    <label for="paternoInicio">Apellido paterno:</label>
                    <input type="text" class ="form-control" id="paternoInicio" name="paternoInicio">
                    <label for=maternoInicio>Apellido materno:</label>
                    <input type="text" class ="form-control" id=maternoInicio name=maternoInicio>
                    
                    <label for="telefonoInicio">Telefono:</label>
                    <input type="text" class ="form-control" id="telefonoInicio" name="telefonoInicio">
                    <label for="correoInicio">Correo:</label>
                    <input type="mail" class ="form-control" id="correoInicio" name="correoInicio">
                    <label for="fechaNacInicio">Fecha de nacimiento: </label>
                    <input type="date" class ="form-control" id="fechaNacInicio" name="fechaNacInicio">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-warning"> <span class="fa-solid fa-floppy-disk"></span> Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

</form>