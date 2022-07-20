<form id="frmNuevoReporte" method="POST" onsubmit="return agregarNuevoReporte()">
    <!-- Modal -->
    <div class="modal fade" id="modalCrearReporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark text-white">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Reporte</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <input type="text" id="idEquipo" name = "idEquipo" hidden>
                <label for="idEquipo">Mis Dispositivos</label>
                        <?php 
                            $idUsuario = $_SESSION['usuario']['id'];
                            $idAsignacion = 0;
                            $sql = "SELECT 
                                        asignacion.id_asignacion AS idAsignacion,
                                        asignacion.dapsis AS numDapsis,
                                        equipo.id_equipo AS idEquipo,
                                        equipo.nombre AS nombreEquipo
                                    FROM 
                                        t_asignacion AS asignacion
                                            INNER JOIN
                                        t_cat_equipo AS equipo ON asignacion.id_equipo = equipo.id_equipo
                                        WHERE 
                                            asignacion.id_persona = (SELECT
                                                                        id_persona
                                                                    FROM
                                                                        t_usuarios
                                                                    WHERE 
                                                                        id_usuario = $idUsuario)"; 
                            $respuesta = mysqli_query($conexion, $sql);
                        ?>                                          
            <select name="idAsignacion" id="idAsignacion" class = "form-control" onchange = "obtenerIdEquipo(this.value)" required> 
                <option value="">Seleciona el dispositivo</option>
                    <?php while ($mostrar = mysqli_fetch_array($respuesta)){ ?>
                <option value="<?php echo $mostrar['idAsignacion'];?>">
                             <?php echo $mostrar['nombreEquipo'].' Num. DAP-SIS: ' .$mostrar['numDapsis'];
                             ?>
                </option>
                <?php } ?> 
            </select>

            <label for="problema">Describe tu problema</label>
            <textarea name="problema" id="problema" class = "form-control" required></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button class="btn btn-primary"> <span class="fa-solid fa-paper-plane"></span> Enviar Reporte</button>
        </div>
        </div>
    </div>
    </div>
</form>