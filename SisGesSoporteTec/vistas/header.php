<?php
  session_start();
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../public/css/plantilla.css">
        <link rel="stylesheet" href="../public/datatable/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../public/datatable/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../public/fontawesome-free-6.1.1-web/css/all.min.css">
        <link rel="stylesheet" href="../public/datatable/buttons.dataTables.min.css">
        <link rel="shortcut icon" href="../public/img/soporte-icon.ico" type="image/x-icon">
        <title>Soporte Tecnico</title>
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary static-top mb-5 shadow"> 
            <div class="container">
                <a class="navbar-brand" href="home.php">
                    <img src="../public/img/imagenLogin.png" width="17%" >
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" 
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">        
                </button>
                <div class="navbar-collapse collapse show" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- Vistas del usuario-->
                        <li class="nav-item active">
                            <a class="nav-link" href="home.php">
                            <span class="fa-solid fa-house-chimney-window"></span>    Inicio
                            </a>
                        </li>
                        <!-- El if else valida la sesion del tipo de usuario para segun este mostrar 
                            opciones diferentes -->
                        <?php if($_SESSION['usuario']['rol'] == 1){ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="misDispositivos.php">
                            <span class="fa-solid fa-computer"></span>     Dispositivos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="misReportes.php">
                            <span class="fa-solid fa-file-invoice"></span>     Reportes  
                            </a>
                        </li>
                        <?php } else if ($_SESSION['usuario']['rol'] == 2) { ?>
                        <!-- Vistas del admin-->
                        <li class="nav-item">
                            <a class="nav-link" href="usuarios.php">
                            <span class="fa-solid fa-users-gear"></span>   Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="asignacion.php">
                            <span class="fa-solid fa-laptop-file"></span>  Equipos</a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reportes.php">
                            <span class="fa-solid fa-file-circle-question"></span>    Reportes</a>
                        </li>
                        <?php } ?>
                        <!-- Menu drop down-->
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#fff">
                            <span class="fa-solid fa-clipboard-user"></span> Usuario: <?php echo $_SESSION['usuario']['nombre'];?> </a>
                            <div class="dropdown-menu bg-primary text-white" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item bg-primary text-white" href="#" data-toggle="modal" data-target="#modalActualizarDatosPersonales" 
                                    onclick ="obtenerDatosPersonalesInicio('<?php echo $_SESSION['usuario']['id']; ?>')">
                                  <span class="fa-solid fa-pen-to-square"></span>  Editar datos
                                </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item bg-primary" href="../procesos/usuarios/login/salir.php" style="color:#fff">
                                <span class="fa-solid fa-right-from-bracket"></span> Salir</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

<?php 
    include "home/modalActualizarDatosPersonales.php";
?>