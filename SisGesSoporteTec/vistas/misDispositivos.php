<?php 
    include "header.php";
     if (isset($_SESSION['usuario'])&& $_SESSION['usuario']['rol'] == 1) {
      include "../clases/Asignacion.php";
      $con = new Conexion();
      $conexion = $con->conectar();
      $idUsuario = $_SESSION['usuario']['id'];
      $sql = "SELECT
                    persona.id_persona AS idPersona
              FROM
                    t_usuarios AS usuario
                        INNER JOIN
                    t_persona AS persona ON usuario.id_persona = persona.id_persona
                        AND usuario.id_usuario = '$idUsuario'";
      $respuesta = mysqli_query($conexion, $sql);
      $idPersona = mysqli_fetch_array($respuesta)[0];
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
                      asignacion.grafica AS grafica,
                      equipo.descripcion AS imagen

              FROM 
                      t_asignacion AS asignacion
                          INNER JOIN
                      t_persona AS persona ON asignacion.id_persona = persona.id_persona
                          INNER JOIN
                      t_cat_equipo AS equipo ON asignacion.id_equipo = equipo.id_equipo 
                        AND asignacion.id_persona ='$idPersona' ";
      $respuesta = mysqli_query($conexion, $sql);
?>


<!-- Page Content -->
<div class="container">
  <div class="card border-0 bg-dark text-white shadow my-5">
    <div class="card-body p-5">
      <h1 class=" text-center fw-light"><span class="fa-solid fa-computer"></span>  Dispositivos</h1>
      <p class="lead">
        <div class="row">
          <?php while($mostrar = mysqli_fetch_array($respuesta)){ ?>
              <div class="col-sm-4">
                  <div class="card bg-dark text-white">
                      <div class="card-body">
                        <h4> 
                          <span class="<?php echo $mostrar['imagen'];?>" ></span> 
                          <?php echo $mostrar['nombreEquipo']; ?>
                        </h4>
                        <?php if($mostrar['nombreEquipo'] == 'Impresora'){
                           ?>
                        <p>
                          <?php echo $mostrar['descripcion']; ?>
                        </p>
                        <ul>
                            <li>Num. DAP-SIS:<?php echo $mostrar['dapsis']; ?> </li>
                            <li>Marca:<?php echo $mostrar['marca']; ?> </li>
                            <li>Modelo:<?php echo $mostrar['modelo']; ?> </li>
                            <li>Color:<?php echo $mostrar['color']; ?> </li>
                        </ul>
                          <?php } else {?> 
                            <p>
                          <?php echo $mostrar['descripcion']; ?>
                        </p>
                        <ul>
                            <li>Num. DAP-SIS:<?php echo $mostrar['dapsis']; ?> </li>
                            <li>Marca:<?php echo $mostrar['marca']; ?> </li>
                            <li>Modelo:<?php echo $mostrar['modelo']; ?> </li>
                            <li>Color:<?php echo $mostrar['color']; ?> </li>
                            <li>Monitor:<?php echo $mostrar['monitor']; ?> </li>
                            <li>Perifericos:<?php echo $mostrar['perifericos']; ?> </li>
                            <li>Almacienamiento:<?php echo $mostrar['almacenamiento']; ?> </li>
                            <li>Memoria RAM:<?php echo $mostrar['ram']; ?> </li>
                            <li>Procesador:<?php echo $mostrar['procesador']; ?> </li>
                            <li>Tarjeta Grafica:<?php echo $mostrar['grafica']; ?> </li>
                            
                        </ul>
                        <?php  }?>
                        
                      </div>
                  </div>
              </div>
          <?php } ?>
        </div>
      </p>
    </div>
  </div>
</div>

<?php 
  include "footer.php";
  } else {
    header("location:../index.html");
  }
?>