<?php
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = 
        "SELECT 
            usuarios.id_usuario AS idUsuario,
            usuarios.usuario AS nombreUsuario,
            roles.nombre AS rol, 
            usuarios.id_rol AS idRol,
            usuarios.ubicacion AS ubicacion, 
            usuarios.activo AS estatus,
            usuarios.id_persona AS idPersona,
            CONCAT(persona.paterno, ' ', persona.materno, ' ', persona.nombre) AS nombrePersona,
            persona.fecha_nacimiento AS fechaNacimiento, 
            persona.sexo AS sexo, 
            persona.correo AS correo,
            persona.telefono AS telefono
        FROM
            t_usuarios AS usuarios
                INNER JOIN
            t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
                INNER JOIN
            t_persona AS persona ON usuarios.id_persona = persona.id_persona";
    $respuesta = mysqli_query($conexion,$sql);
?>



<table class = "table table-sm dt-responsive nowrap" 
        id = "tablaUsuariosDataTable" style="width:100%">
    <thead>
        <th>Persona</th>
        <th>Edad</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Usuario</th>
        <th>Sexo</th>
        <th>Ubicacion</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        <?php 
            while($mostrar = mysqli_fetch_array($respuesta)) {
        ?>
        <tr>
            <td><?php echo $mostrar['nombrePersona']; ?> </td>
            <td><?php echo $mostrar['fechaNacimiento']; ?></td>
            <td><?php echo $mostrar['telefono']; ?></td>
            <td><?php echo $mostrar['correo']; ?></td>
            <td><?php echo $mostrar['nombreUsuario']; ?></td>
            <td><?php echo $mostrar['sexo']; ?></td>
            <td><?php echo $mostrar['ubicacion']; ?></td>
            <td> 
                <!--Cambiar Estado-->
                <?php 
                    if ($mostrar['estatus'] == 1){
                ?>

                    <button class="btn btn-success btn-sm" 
                    onclick ="cambioEstatusUsuario(<?php echo $mostrar['idUsuario'] ?>, <?php echo $mostrar['estatus'] ?>)">
                        <span class="fa-solid fa-toggle-on"></span> 
                    </button>
                
                <?php 
                    } else if($mostrar['estatus'] == 0){
                ?>
                    <button class="btn btn-secondary btn-sm" 
                    onclick ="cambioEstatusUsuario(<?php echo $mostrar['idUsuario'] ?>, <?php echo $mostrar['estatus'] ?>)">
                    <span class="fa-solid fa-toggle-off"></span> 
                    </button>
                <?php
                    }
                ?>
                <!--Cambiar Contraseña-->
                <button class = "btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCambiarContra" 
                        onclick = "agregarIdUsuarioReset(<?php echo $mostrar['idUsuario'] ?>)">
                    <span class="fa-solid fa-key"></span>
                </button>
                <!--Actualizar Datos-->
                <button class = "btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizarUsuarios" 
                                onclick="obtenerDatosUsuario(<?php echo $mostrar['idUsuario'] ?>)">
                   <span class="fa-solid fa-user-pen"></span> 
                </button>
                <!--Eliminar-->
                <button class = "btn btn-danger btn-sm" 
                    onclick = "eliminarUsuario(<?php echo $mostrar['idUsuario'] ?>,<?php echo $mostrar['idPersona'] ?> )">
                        <span class="fa-solid fa-user-xmark"></span>  
                </button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tablaUsuariosDataTable').DataTable({
            language : {
                url : "../public/datatable/es-ES.json"
            }
        });
    });
</script>