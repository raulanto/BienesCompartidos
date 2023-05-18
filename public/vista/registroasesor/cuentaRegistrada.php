<?php
require_once('Clases.php');
require_once('../../Controlador/conector.php');
session_start();
$asesor = $_SESSION['Asesor'];
$usuario = $_SESSION['DatosUsuario'];
$Inmobiliaria = $_SESSION['Inmobiliaria'];
$asesor->fk_inmobiliaria = $Inmobiliaria->id;
$asesor->fk_datousuario = $usuario->id;
echo $usuario->id;
if ($usuario->insertarDatosUsuario($conexion) === TRUE) {
    if ($Inmobiliaria->insertarInmobiliaria($conexion) === TRUE) {
        if ($asesor->insertarDatosAsesor($conexion) === TRUE) {
            $_SESSION['Asesor'] = $asesor;
            $_SESSION['logueado'] = TRUE;
            header("Location: ../panelAsesor.php?idasesor=" . $asesor->id);
            exit;

        } else {
            echo "Error al insertar datos: 1" . $conexion->error;
        }

    } else {
        echo "Error al insertar datos: 2" . $conexion->error;
    }

} else {
    echo "Error al insertar datos: 3" . $conexion->error;
}


?>
