<?php
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT 
                persona.id_persona AS idPersona,
                CONCAT(persona.paterno,' ', persona.materno, ' ', persona.nombre) AS nombrePersona,
                equipo.id_equipo AS id_equipo,
                equipo.nombre AS nombreEquipo,
                asignacion.id_asignacion AS idAsignacion,
                asignacion.dapsis AS dapsis,
                asignacion.marca AS marca,
                asignacion.modelo AS modelo,
                asignacion.color AS color,
                asignacion.descripcion AS descripcion,
                asignacion.monitor AS monitor,
                asignacion.perifericos AS perifericos,
                asignacion.almacenamiento AS almacenamiento,
                asignacion.ram AS ram,
                asignacion.procesador AS procesador,
                asignacion.grafica AS grafica
            FROM 
                t_asignacion AS asignacion
                    INNER JOIN
                t_persona AS persona ON asignacion.id_persona = persona.id_persona
                    INNER JOIN
                t_cat_equipo AS equipo ON asignacion.id_equipo = equipo.id_equipo";
    $respuesta = mysqli_query($conexion, $sql);
?>


<table class = "table table-sm dt-responsive nowrap" 
                id = "tablaAsignacionsDataTable" style="width:100%">
    <thead>
        <th>Persona</th>
        <th>Equipo</th>
        <th>Num. DAP-SIS</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Color</th>
        <th>Descripcion</th>
        <th>Monitor</th>
        <th>Perifericos</th>
        <th>Almacenamiento</th>
        <th>Memoria RAM</th>
        <th>Procesador</th>
        <th>Tarjeta Grafica</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        <?php while($mostrar = mysqli_fetch_array($respuesta)){?> 
            <tr>
                <td><?php echo $mostrar['nombrePersona'] ?></td>
                <td><?php echo $mostrar['nombreEquipo'] ?></td>
                <td><?php echo $mostrar['dapsis'] ?></td>
                <td><?php echo $mostrar['marca'] ?></td>
                <td><?php echo $mostrar['modelo'] ?></td>
                <td><?php echo $mostrar['color'] ?></td>
                <td><?php echo $mostrar['descripcion'] ?></td>
                <td><?php echo $mostrar['monitor'] ?></td>
                <td><?php echo $mostrar['perifericos'] ?></td>
                <td><?php echo $mostrar['almacenamiento'] ?></td>
                <td><?php echo $mostrar['ram'] ?></td>
                <td><?php echo $mostrar['procesador'] ?></td>
                <td><?php echo $mostrar['grafica'] ?></td>
                <td> 
                    <!--Actualizar-->
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizarAsignacion"
                        onclick="obtenerDatosAsignacion(<?php echo $mostrar['idAsignacion'] ?>)">
                        <span class="fa-solid fa-pen-to-square"></span>
                    </button>
                    <!--Eliminar-->
                    <button class="btn btn-danger btn-sm" 
                        onclick="eliminarAsignacion(<?php echo $mostrar['idAsignacion'] ?>)"> 
                        <span  class="fa-solid fa-trash-can"></span>  
                    </button>
                    
                </td>
            </tr>
        <?php } ?>
    </tbody>
        
</table>


<script>
    $(document).ready(function(){
        $('#tablaAsignacionsDataTable').DataTable({
            language : {
                url : "../public/datatable/es-ES.json"
            }
        });
    });
</script>