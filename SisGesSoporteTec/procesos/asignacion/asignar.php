<?php

    $datos = array(
        'idPersona' => $_POST['idPersona'],
        'dapsis' => $_POST['dapsis'],
        'idEquipo' => $_POST['idEquipo'],
        'marca' => $_POST['marca'],
        'modelo' => $_POST['modelo'],
        'color' => $_POST['color'],
        'descripcion' => $_POST['descripcion'],
        'monitor' => $_POST['monitor'],
        'perifericos' => $_POST['perifericos'],
        'almacenamiento' => $_POST['almacenamiento'],
        'ram' => $_POST['ram'],
        'procesador' => $_POST['procesador'],
        'grafica' => $_POST['grafica']
    );

    include "../../clases/Asignacion.php";
    $Asignacion = new Asignacion();
    echo $Asignacion->agregarAsignacion($datos);
        