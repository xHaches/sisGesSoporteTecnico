<form id="frmActualizarAsignacion" method="post" onsubmit="return actualizarAsignacion()">
        <!-- Modal -->
    <div class="modal fade" id="modalActualizarAsignacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar asignacion de equipo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <input type="text" id="idAsignacion" name="idAsignacion" hidden>
                        <div class="row">

                            <div class="col-sm-4">
                                <label>Num. DAP-SIS</label>
                                <input type="text" name="dapsisU" id="dapsisU" class="form-control" required>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="MarcaU">Marca</label>
                                <input type="text" name="marcaU" id="marcaU" class="form-control" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="modeloU">Modelo</label>
                                <input type="text" name="modeloU" id="modeloU" class="form-control" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="colorU">Color</label>
                                <input type="text" name="colorU" id="colorU" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="descripcionU">Descripcion</label>
                                <textarea name="descripcionU" id="descripcionU" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row" id="opc1U" >
                            <div class="col-sm-4">
                                <label for="monitorU">Monitor/Pantalla</label>
                                <input type="text" name="monitorU" id="monitorU" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for=perifericosU>Perifericos</label>
                                <input type="text" name=perifericosU id=perifericosU class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="almacenamientoU">Almacenamiento</label>
                                <input type="text" name="almacenamientoU" id="almacenamientoU" class="form-control">
                            </div>
                        </div>
                        <div class="row" id ="opc2U">
                            <div class="col-sm-4">
                                <label for="ramU">Memoria RAM</label>
                                <input type="text" name="ramU" id="ramU" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="procesadorU">Procesador</label>
                                <input type="text" name="procesadorU" id="procesadorU" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="graficaU">Tarjeta Grafica</label>
                                <input type="text" name="graficaU" id="graficaU" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning">Guardar cambios</button>
                    </div>
            </div>
        </div>
    </div>
</form>