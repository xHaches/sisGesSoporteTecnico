<?php
    session_start();

    $idUsuario = $_SESSION['usuario']['id'];
    include "../../clases/Home.php";


    $datos = array(
        'paterno' => $_POST['paternoInicio'],
        'materno' => $_POST['maternoInicio'],
        'nombre' => $_POST['nombreInicio'],
        'telefono' => $_POST['telefonoInicio'],
        'correo' => $_POST['correoInicio'],
        'fecha' => $_POST['fechaNacInicio'],
        'idUsuario' => $idUsuario
    );

    $Home = new Home();
    echo $Home->actualizarPersonales($datos);
?>



