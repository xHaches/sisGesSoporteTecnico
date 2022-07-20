<?php
    $datos = array(
        'idAsignacion' => $_POST['idAsignacion'],
        'dapsis' => $_POST['dapsisU'],
        'marca' => $_POST['marcaU'],
        'modelo' => $_POST['modeloU'],
        'color' => $_POST['colorU'],
        'descripcion' => $_POST['descripcionU'],
        'monitor' => $_POST['monitorU'],
        'perifericos' => $_POST['perifericosU'],
        'almacenamiento' => $_POST['almacenamientoU'],
        'ram' => $_POST['ramU'],
        'procesador' => $_POST['procesadorU'],
        'grafica' => $_POST['graficaU']
    );

    include "../../clases/Asignacion.php";
    $Asignacion = new Asignacion();
    echo $Asignacion->actualizarAsignacion($datos);
        