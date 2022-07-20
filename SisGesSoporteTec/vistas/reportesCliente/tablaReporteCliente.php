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
                asignacion.id_asignacion AS idAsignacion,
                equipo.id_equipo AS idEquipo,
                equipo.nombre AS nombreEquipo,
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
                reporte.id_asignacion = asignacion.id_asignacion AND  reporte.id_usuario = $idUsuario ";
    $respuesta = mysqli_query($conexion, $sql);
?>


<table class = "table table-sm dt-responsive nowrap" 
                id = "tablaReporteClienteDataTable" style="width:100%">
    <thead>
        <th>#</th>  
        <th>Dispositivo</th>
        <th>DAP-SIS</th>
        <th>Fecha</th>
        <th>Descripcion</th>
        <th>Estado</th>
        <th>Solucion</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
    <?php while($mostrar = mysqli_fetch_array($respuesta)) {?>
        <tr>
            <td><?php echo $contador++; ?></td>
            <td><?php echo $mostrar['nombreEquipo'];?> </td>
            <td><?php echo $mostrar['dapsis']?></td>
            <td><?php echo $mostrar['fecha'];?></td>
            <td><?php echo $mostrar['problema'];?></td>
            <td>
                <?php 
                    $estatus = $mostrar['estatus'];
                    $cadenaestatus = '<span class="badge badge-danger"> <span class="fa-solid fa-lock-open"></span>  Abierto</span>';
                    if($estatus == 0 ){
                        $cadenaestatus = '<span class="badge badge-success"> <span class="fa-solid fa-lock"></span>  Cerrado</span>'; 
                    }   
                    echo $cadenaestatus;
                ?>
            </td>
            <td><?php echo $mostrar['solucion'];?></td>
            <td>
                <?php 
                    if ($mostrar['solucion'] == ""){
                ?>                        
                <button class="btn btn-danger btn-sm" onclick="eliminarReporteCliente(<?php echo $mostrar['idReporte']; ?>)"> 
                <span class="fa-solid fa-trash-can"></span>  
                </button>
                <?php  
                    }
                ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tablaReporteClienteDataTable').DataTable({
            language : {
                url : "../public/datatable/es-ES.json"
            },
            dom: 'Bfrtip',
            buttons: {
                buttons : [
                    { extend : 'excel', 
                      className: 'btn btn-outline-success', 
                      text : '<i class="fa-solid fa-file-excel"></i>',
                      filename: 'Reportes_SoporteTecnico_User',
                      exportOptions: {
						columns: [0,1,2,3,4,5,6]
					},
                    },
                    { extend : 'pdfHtml5', 
                      className: 'btn btn-outline-danger', 
                      text : '<i class="fa-solid fa-file-pdf"></i>',
                      orientation: 'landscape',
                      filename: 'Reportes_SoporteTecnico_User',
                      exportOptions: {
						columns: [0,1,2,3,4,5,6]
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