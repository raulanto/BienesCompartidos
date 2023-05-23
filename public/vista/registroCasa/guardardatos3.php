<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // La solicitud se realizó mediante el método POST
    // Aquí puedes procesar los parámetros recibidos y realizar las validaciones necesaria
    // Continuar con tu lógica de negocio
    // ...
    $superficieTerrestre=$_POST['superficieTerrestre'];
    $superficieConstru=$_POST['superficieConstruida'];
    $no_estacionamiento=$_POST['estacionamiento'];
    $no_baños=$_POST['banos'];
    $no_recamaras=$_POST['recamaras'];
    $fk_estadoinmueble=$_POST['antiguedad'];
    $nombre=$_POST['nombreinmueble'];
    $precio=$_POST['precio'];
    $descripcion=$_POST['descripciónInmueble'];
    $noNivelesCasa=$_POST['noNivelesCasa'];
    // archivo1.php
    require_once ('clases.php');
    session_start();
    $inmueble=$_SESSION['Inmueble'];

    $_SESSION['Caracteristicas']  = new Caracteristicas($superficieTerrestre, $superficieConstru, $no_estacionamiento,$no_baños,$no_recamaras,$inmueble->id, $fk_estadoinmueble, $noNivelesCasa);
    $inmueble->nombre=$nombre;
    $inmueble->precio=$precio;
    $inmueble->descripcion=$descripcion;
    $_SESSION['Inmueble']=$inmueble;

    header("Location: RegistroImagenes.php");
    exit;


} else {
    // La solicitud no se realizó mediante el método POST
    // Puedes mostrar un mensaje de error o redirigir a otra página
    echo "Error: La solicitud debe realizarse mediante el método GET.";
}




?>