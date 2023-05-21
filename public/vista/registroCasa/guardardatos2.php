<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // La solicitud se realizó mediante el método POST
    // Aquí puedes procesar los parámetros recibidos y realizar las validaciones necesaria
    // Continuar con tu lógica de negocio
    // ...
    $direcion=$_POST['direcion'];
    $descripcion=$_POST['descripcion'];
    $colonia=$_POST['colonia'];
    $codigo_postal=$_POST['codigo_postal'];

    // archivo1.php
    require_once ('clases.php');
    session_start();
    $inmueble=$_SESSION['Inmueble'];
    $_SESSION['Ubicacion']  = new Ubicacion($direcion,$colonia,$inmueble->id,$descripcion,$codigo_postal);


    header("Location: registroCaracteristcas.php");
    exit;


} else {
    // La solicitud no se realizó mediante el método POST
    // Puedes mostrar un mensaje de error o redirigir a otra página
    echo "Error: La solicitud debe realizarse mediante el método GET.";
}




?>