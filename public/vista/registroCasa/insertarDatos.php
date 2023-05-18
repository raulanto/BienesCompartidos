<?php
require_once('clases.php');
require_once('../registroasesor/Clases.php');
session_start();

$inmueble = $_SESSION['Inmueble'];
$Ubicacion = $_SESSION['Ubicacion'];
$Caracteristicas = $_SESSION['Caracteristicas'];
$Asesor = $_SESSION['Asesor'];

require_once('../../Controlador/conector.php');

$query = "SELECT inmueble.ID_inmueble FROM inmueble ORDER BY inmueble.ID_inmueble DESC";
$consulta = mysqli_query($conexion, $query);
$user = mysqli_fetch_assoc($consulta);
$id = $user['ID_inmueble'] + 1;

$query2 = "INSERT INTO inmueblepr.inmueble (ID_inmueble, nombre, precio, descripcion, fk_asesor, fk_tipooperacion, fk_tipodeinmueble, inmueblecantidad) 
    VALUES ('$id', '{$inmueble->nombre}', '{$inmueble->precio}', '{$inmueble->descripcion}', '{$Asesor->id}', '{$inmueble->fk_tipooperacion}', '{$inmueble->fk_tipodeinmueble}', '{$inmueble->inmueblecantidad}')";

if ($conexion->query($query2) === TRUE) {
    $query = "SELECT caracteristicas.ID_caracterisiticas FROM caracteristicas ORDER BY caracteristicas.ID_caracterisiticas DESC";
    $consulta = mysqli_query($conexion, $query);
    $user = mysqli_fetch_assoc($consulta);
    $id = $user['ID_caracterisiticas'] + 1;

    $query4 = "INSERT INTO inmueblepr.caracteristicas (ID_caracterisiticas, superficieTerrestre, superficieConstru, no_estacionamiento, no_baños, no_recamaras, fk_inmueble, fk_estadoinmueble)
        VALUES ($id, '{$Caracteristicas->superficieTerrestre}', '{$Caracteristicas->superficieConstru}', '{$Caracteristicas->no_estacionamiento}', '{$Caracteristicas->no_baños}', '{$Caracteristicas->no_recamaras}', '$Asesor->id', '{$Caracteristicas->fk_estadoinmueble}')";

    if ($conexion->query($query4) === TRUE) {
        $query5 = "SELECT ubicacion.ID_ubicacion FROM ubicacion ORDER BY ubicacion.ID_ubicacion DESC";
        $consulta = mysqli_query($conexion, $query5);
        $user = mysqli_fetch_assoc($consulta);
        $id = $user['ID_ubicacion'] + 1;

        $query = "INSERT INTO inmueblepr.ubicacion (ID_ubicacion, calle, fk_colonia, fk_inmueble, descripcion)
            VALUES ('$id', '{$Ubicacion->calle}', '{$Ubicacion->fk_colonia}', '{$Asesor->id}', '{$Ubicacion->descripcion}')";

        if ($conexion->query($query) === TRUE) {
            // Operación exitosa
            echo 'correct';
        } else {
            echo "Error al insertar datos: 3" . $conexion->error;
        }
    } else {
        echo "Error al insertar datos: 2" . $conexion->error;
    }
} else {
    echo "Error al insertar datos: 1" . $conexion->error;
}
?>