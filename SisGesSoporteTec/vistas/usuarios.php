<?php 
    include "header.php";
    if (isset($_SESSION['usuario'])&& $_SESSION['usuario']['rol'] == 2) {
      
?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 bg-primary text-white shadow my-5">
    <div class="card-body p-5">
      <h1 class="text-center fw-light"> <span class="fa-solid fa-users-gear"></span> Administrar Usuarios</h1> 
      <p class="lead">                            
        <button class ="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuarios"> 
        <span class="fa-solid fa-user-plus"></span> Agregar Usuario
        </button>
        <br>
        <div id = "tablaUsuariosLoad"> </div>
      </p>
    </div>
  </div>
</div>

<?php 
  include "usuarios/modalAgregar.php";
  include "usuarios/modalActualizar.php";
  include "usuarios/modalCambiarContra.php";
  include "footer.php";
?>
  <script src="../public/js/usuarios/usuarios.js"></script>
<!-- Parte de la validacion-->
<?php
  } else {
    header("location:../index.html");
  }
?>