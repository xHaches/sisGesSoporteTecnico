<!-- Modal -->
<form id="frmAsignaEquipo" method="post" onsubmit="return asignarEquipo()">
    <div class="modal fade" id="modalAsignarEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignar Equipo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-4">
                            <label>Encargado</label>

                            <?php
                                $sql = "SELECT 
                                persona.id_persona,
                                CONCAT(persona.paterno, ' ', persona.materno, ' ', persona.nombre) AS nombre
                                FROM
                                    t_persona AS persona
                                        INNER JOIN
                                    t_usuarios AS usuario ON persona.id_persona = usuario.id_persona
                                        AND usuario.id_rol = 1
                                    ORDER BY persona.paterno";
                                $respuesta = mysqli_query($conexion, $sql);
                            ?>

                            <select name="idPersona" id="idPersona" class="form-control" required>
                                <option value="">--Seleccionar--</option>
                                <?php while($mostrar = mysqli_fetch_array($respuesta)) { ?>
                                    <option value="<?php echo $mostrar['id_persona']; ?>"><?php echo $mostrar['nombre']; ?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="col-sm-4">
                            <label>Num Serie</label>
                            <input type="text" name="dapsis" id="dapsis" class="form-control" required>
                        </div>

                        <div class="col-sm-4">
                            <label>Tipo de equipo</label>

                            <?php
                                $sql = "SELECT id_equipo, nombre FROM t_cat_equipo ORDER BY id_equipo";
                                $respuesta = mysqli_query($conexion,$sql);
                            ?>

                            <select name="idEquipo" id="idEquipo" class="form-control" onChange = "tipoDispositivo(this.value)" required>
                                <option value="">--Seleccionar--</option>
                                <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
                                    <option value="<?php echo $mostrar['id_equipo']; ?>"><?php echo $mostrar['nombre']; ?></option>
                                <?php } ?> 
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="Marca">Marca</label>
                            <input type="text" name="marca" id="marca" class="form-control" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="modelo">Modelo</label>
                            <input type="text" name="modelo" id="modelo" class="form-control" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="color">Color</label>
                            <input type="text" name="color" id="color" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="descripcion">Descripcion</label>
                            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row" id="opc1" >
                        <div class="col-sm-4">
                            <label for="monitor">Monitor/Pantalla</label>
                            <input type="text" name="monitor" id="monitor" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for=perifericos>Perifericos</label>
                            <input type="text" name=perifericos id=perifericos class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for="almacenamiento">Almacenamiento</label>
                            <input type="text" name="almacenamiento" id="almacenamiento" class="form-control">
                        </div>
                    </div>
                    <div class="row" id ="opc2">
                        <div class="col-sm-4">
                            <label for="ram">Memoria RAM</label>
                            <input type="text" name="ram" id="ram" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for="procesador">Procesador</label>
                            <input type="text" name="procesador" id="procesador" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for="grafica">Tarjeta Grafica</label>
                            <input type="text" name="grafica" id="grafica" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary">Asignar</button>
                </div>
            </div>
        </div>
    </div>
</form>