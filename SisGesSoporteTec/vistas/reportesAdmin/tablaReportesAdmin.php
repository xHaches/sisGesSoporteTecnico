<?php
    session_start();
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idUsuario = $_SESSION['usuario']['id'];
    $contador = 1; 
    $sql = "SELECT 
                reporte.id_reporte AS idReporte,
                reporte.id_usuario AS idUsuario,
                CONCAT(persona.paterno, ' ', persona.materno, ' ', persona.nombre) AS nombrePersona,
                asignacion.id_asignacion AS idAsignacion,
                equipo.id_equipo AS idEquipo,
                equipo.nombre as nombreEquipo,
                asignacion.dapsis AS dapsis,
                reporte.descripcion_problema AS problema,
                reporte.estatus AS estatus,
                reporte.solucion_problema AS solucion,
                reporte.fecha AS fecha
            FROM
                t_reportes AS reporte
            INNER JOIN t_usuarios AS usuario
            ON
                reporte.id_usuario = usuario.id_usuario
            INNER JOIN t_persona AS persona
            ON
                usuario.id_persona = persona.id_persona
            INNER JOIN t_cat_equipo AS equipo
            ON 
                reporte.id_equipo = equipo.id_equipo
            INNER JOIN t_asignacion AS asignacion
            ON 
                reporte.id_asignacion = asignacion.id_asignacion
            ORDER BY reporte.fecha DESC";
    $respuesta = mysqli_query($conexion, $sql);
?>



<table class = "table table-sm dt-responsive nowrap" 
                id = "tablaReportesAdminDataTable" style="width:100%">
    <thead>
        <th>#</th>
        <th>Persona</th>
        <th>Dispositivo</th>
        <th>DAP-SIS</th>
        <th>Fecha</th>
        <th>Estado</th>
        <th>Descripcion</th>
        <th>Solucion</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
    <?php while($mostrar = mysqli_fetch_array($respuesta)) {?>
        <tr>
            <td><?php echo $contador++; ?></td>
            <td><?php echo $mostrar['nombrePersona'];?></td>
            <td><?php echo $mostrar['nombreEquipo'];?></td>
            <td><?php echo $mostrar['dapsis'];?></td>
            <td><?php echo $mostrar['fecha'];?></td>
            <td>
                <?php 
                    $estatus = $mostrar['estatus'];
                    $cadenaestatus = '<span class="badge badge-danger"> <span class="fa-solid fa-lock-open"></span> Abierto</span>';
                    if($estatus == 0 ){
                        $cadenaestatus = '<span class="badge badge-success"> <span class="fa-solid fa-lock"></span>  Cerrado</span>';
                    }   
                    echo $cadenaestatus;
                ?>
            </td>
            <td><?php echo $mostrar['problema'];?></td>
            <td>
                <button class="btn btn-info btn-sm" onclick = "obtenerDatosSolucion('<?php echo $mostrar['idReporte']; ?>')"
                        data-toggle="modal" data-target="#modalAgregarSolucionReporte">
                   <span class="fa-solid fa-screwdriver-wrench"></span> 
                </button>
                <?php echo $mostrar['solucion'];?>
            </td>
            <td>
                      
                <button class="btn btn-danger btn-sm" onclick="eliminarReporteAdmin(<?php echo $mostrar['idReporte']; ?>)"> 
                <span  class="fa-solid fa-trash-can"></span>  
                </button>

            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tablaReportesAdminDataTable').DataTable({
            language : {
                url : "../public/datatable/es-ES.json"
            },
            dom: 'Bfrtip',
            buttons: {
                buttons : [
                    { extend : 'excel', 
                      className: 'btn btn-outline-success', 
                      text : '<i class="fa-solid fa-file-excel"></i>',
                      filename: 'Reportes_SoporteTecnico',
                      exportOptions: {
						columns: [0,1,2,3,4,5,6,7]
					},
                    },
                    { extend : 'pdfHtml5', 
                      className: 'btn btn-outline-danger', 
                      text : '<i class="fa-solid fa-file-pdf"></i>',
                      filename: 'Reportes_SoporteTecnico',
                      orientation: 'landscape',
                      exportOptions: {
						columns: [0,1,2,3,4,5,6,7]
					},
                    },
                ],
                dom : {
                    button : {
                        className : 'btn'
                    }
                }
            }
        });
    });
</script>