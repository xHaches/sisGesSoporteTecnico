<?php

    $idAsignacion = $_POST['idAsignacion'];
    include "../../clases/Asignacion.php";
    $Asignacion = new Asignacion();
    echo json_encode($Asignacion->obtenerDatosAsignacion($idAsignacion));