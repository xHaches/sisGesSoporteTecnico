<?php 
    include "header.php";
    if (isset($_SESSION['usuario'])&&
      $_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 2) {

        $idUsuario = $_SESSION['usuario']['id'];
      
?>



<!-- Page Content -->
<div class="container"> 
  <div class="card border-0 shadow my-5 bg-primary text-white">
    <div class="card-body p-5">
      <h1 class="text-center fw-light">¡Bienvenido <?php echo $_SESSION['usuario']['nombre'].'!';?></h1>
      <p class="lead">

        <div class="row text-center">
          <div class="col-sm-12">
            <div class="card-deck">
                      <div class="card border-0 shadow bg-info">
                        <div class="card-body">
                          <h5 class="card-title"><span class="fa-solid fa-user"></span> NOMBRE: </h5>
                          <p class="card-text"><span id ="nombrePersona"></span></p>
                        </div>
                      </div>
                      <div class="card border-0 shadow bg-info">
                        <div class="card-body">
                          <h5 class="card-title"><span class="fa-solid fa-phone"></span> TELEFONO: </h5>
                          <p class="card-text"><span id = "telefono"></span></p>
                        </div>
                      </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row text-center">
          <div class="col-sm-12">
            <div class="card-deck">
                      <div class="card border-0 shadow bg-info">
                        <div class="card-body rounded">
                          <h5 class="card-title"><span class="fa-solid fa-envelope"></span> CORREO:</h5>
                          <p class="card-text"><span id = "correo"></span> </p>
                        </div>
                      </div>
                      <div class="card border-0 shadow bg-info">
                        <div class="card-body rounded-circle ">
                          <h5 class="card-title"><span class="fa-solid fa-calendar-days"></span> FECHA DE NACIMIENTO: </h5>
                          <p class="card-text"><span id = "edad"></span> </p>
                        </div>
                      </div>
            </div>
          </div>
        </div>

      </p>
    </div>
  </div>
</div>


<?php 
  include "footer.php";
?>
  <script src="../public/js/home/personales.js"></script>
  <script>
      let idUsuario = '<?php echo $idUsuario; ?>';
      datosPersonalesInicio(idUsuario);
  </script>
<?php
  } else {
      header("location:../index.html");
  }
?>
