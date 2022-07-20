<?php

$idAsignacion = $_POST['idAsignacion'];
include "../../clases/Reportes.php";
$Reportes = new Reportes();
echo json_encode($Reportes->obtenerIdEquipo($idAsignacion));