<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // La solicitud se realizó mediante el método POST
    // Aquí puedes procesar los parámetros recibidos y realizar las validaciones necesaria
    // Continuar con tu lógica de negocio
    // ...
    $tipoInmueble=$_POST['tipoInmueble'];
    $cantidad=$_POST['cantidad'];
    $tipoOperacion=$_POST['tipoOperacion'];

    // archivo1.php
    require_once ('clases.php');
    session_start();
    $_SESSION['Inmueble'] =new Inmueble(0, '', '', '', 0, $tipoOperacion, $tipoInmueble, $cantidad);

    header("Location: registroUbicacion.php");
    exit;


} else {
    // La solicitud no se realizó mediante el método POST
    // Puedes mostrar un mensaje de error o redirigir a otra página
    echo "Error: La solicitud debe realizarse mediante el método GET.";
}











?>
