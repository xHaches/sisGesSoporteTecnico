<?php 
    include "header.php";
    if (isset($_SESSION['usuario'])&& $_SESSION['usuario']['rol'] == 2) {
      include "../clases/Conexion.php";
      $con = new Conexion();
      $conexion = $con->conectar();
?>


<!-- Page Content -->
<div class="container">
  <div class="card border-0 bg-primary text-white shadow my-5">
    <div class="card-body p-5">
      <h1 class="text-center fw-light"> <span class="fa-solid fa-laptop-file"></span> Asignación de Equipos</h1>
      <p class="lead">
          <button class = "btn btn-primary" data-toggle="modal" data-target="#modalAsignarEquipo"> 
          <span class="fa-solid fa-plus"></span> Asignar equipo
          </button>
          
          <div id = tablaAsiganacionesLoad></div>
      </p>
    </div>
  </div>
</div>

<?php 
    include "asignacion/modalAsignar.php";
    include "asignacion/modalActualizarAsignacion.php";
    include "footer.php";
?>

    <script src="../public/js/asignacion/asignacion.js"></script>
    <script src="../public/js/asignacion/tipoEqp.js"></script>

<?php
    } else {
      header("location:../index.html");
    }
?>