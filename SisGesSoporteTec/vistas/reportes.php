<?php 
    include "header.php";
    if (isset($_SESSION['usuario'])&& $_SESSION['usuario']['rol'] == 2) {
      
?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 bg-dark text-white shadow my-5">
    <div class="card-body p-5">
      <h1 class=" text-center fw-light"><span class="fa-solid fa-file-signature"></span> Gestion de Reportes</h1> 
      <p class="lead">
          <div id= "tablaReporteAdminLoad" ></div>
      </p>
    </div>
  </div>
</div>

<?php 
  include "reportesAdmin/modalAgregarSolucion.php";
  include "footer.php";
?>
  <script src="../public/js/reportesAdmin/reportesAdmin.js"></script>
<?php 
  } else {
    header("location:../index.html");
  }
?>
