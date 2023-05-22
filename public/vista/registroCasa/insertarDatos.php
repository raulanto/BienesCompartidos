<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('clases.php');
    require_once('../registroasesor/Clases.php');
    session_start();
    $ruta1 = $_FILES['imagen1']['tmp_name'];
    $ruta2 = $_FILES['imagen2']['tmp_name'];
    $ruta3 = $_FILES['imagen3']['tmp_name'];
    $ruta4 = $_FILES['imagen4']['tmp_name'];
    $ruta5 = $_FILES['imagen5']['tmp_name'];
    $rutatrabajo='registroCasa/imagenescasa/';

    $inmueble = $_SESSION['Inmueble'];
    $Ubicacion = $_SESSION['Ubicacion'];
    $Caracteristicas = $_SESSION['Caracteristicas'];
    $Asesor = $_SESSION['Asesor'];
    $ruta_indexphp = dirname(realpath(__FILE__));
    require_once('../../Controlador/conector.php');

    $query = "SELECT inmueble.ID_inmueble FROM inmueble ORDER BY inmueble.ID_inmueble DESC";
    $consulta = mysqli_query($conexion, $query);
    $user = mysqli_fetch_assoc($consulta);
    $id = $user['ID_inmueble'] + 1;

    $query2 = "INSERT INTO inmueblepr.inmueble ( ID_inmueble,nombre, precio, descripcion, fk_asesor, fk_tipooperacion, fk_tipodeinmueble, inmueblecantidad) 
    VALUES ('$id', '{$inmueble->nombre}', '{$inmueble->precio}', '{$inmueble->descripcion}', '{$Asesor->id}', '{$inmueble->fk_tipooperacion}', '{$inmueble->fk_tipodeinmueble}', '{$inmueble->inmueblecantidad}')";

    if ($conexion->query($query2) === TRUE) {


        $query4 = "INSERT INTO inmueblepr.caracteristicas (superficieTerrestre, superficieConstru, no_estacionamiento, no_baños, no_recamaras, fk_inmueble, fk_estadoinmueble)
        VALUES ('{$Caracteristicas->superficieTerrestre}', '{$Caracteristicas->superficieConstru}', '{$Caracteristicas->no_estacionamiento}', '{$Caracteristicas->no_baños}', '{$Caracteristicas->no_recamaras}', '$id', '{$Caracteristicas->fk_estadoinmueble}')";

        if ($conexion->query($query4) === TRUE) {


            $query = "INSERT INTO inmueblepr.ubicacion (calle, fk_colonia, fk_inmueble, descripcion,codigo_postal)
            VALUES ( '{$Ubicacion->calle}', '{$Ubicacion->fk_colonia}', '$id', '{$Ubicacion->descripcion}','{$Ubicacion->codigo_postal}')";

            if ($conexion->query($query) === TRUE) {
                $nombreCasa = $inmueble->nombre . '1';
                $nombreimagen = $nombreCasa;

                $ruta_fichero_origen = $ruta1;
                $ruta_nuevo_destino = $ruta_indexphp . '/imagenescasa/' . $nombreimagen . '.jpg';
                if (copy($ruta_fichero_origen, $ruta_nuevo_destino)) {
                    echo 'Archivo copiado con éxito1.';
                } else {
                    echo 'Error al copiar el archivo1.';
                }
                $logo=$rutatrabajo.$nombreimagen.'.jpg';
                $image1 = new Galeria($logo, $id);
                if ($image1->insertaImg($conexion) === TRUE) {
                    echo 'correcto';
                } else {
                    echo "Error al insertar datos: 4" . $conexion->error;
                }
//                imagen 2
                $nombreCasa = $inmueble->nombre . '2';
                $nombreimagen = $nombreCasa;
                $ruta_fichero_origen = $ruta2;
                $ruta_nuevo_destino = $ruta_indexphp . '/imagenescasa/' . $nombreimagen . '.jpg';

                if (copy($ruta_fichero_origen, $ruta_nuevo_destino)) {
                    echo 'Archivo copiado con éxito2.';
                } else {
                    echo 'Error al copiar el archivo2.';
                }
                $logo=$rutatrabajo.$nombreimagen.'.jpg';
                $image2 = new Galeria($logo, $id);
                if ($image2->insertaImg($conexion) === TRUE) {
                    echo 'correcto';
                } else {
                    echo "Error al insertar datos: 4" . $conexion->error;
                }
//                imagen 3
                $nombreCasa = $inmueble->nombre . '3';
                $nombreimagen = $nombreCasa;

                $ruta_fichero_origen = $ruta3;
                $ruta_nuevo_destino = $ruta_indexphp . '/imagenescasa/' . $nombreimagen . '.jpg';

                if (copy($ruta_fichero_origen, $ruta_nuevo_destino)) {
                    echo 'Archivo copiado con éxito3.';
                } else {
                    echo 'Error al copiar el archivo3.';
                }
                $logo=$rutatrabajo.$nombreimagen.'.jpg';
                $image3 = new Galeria($logo, $id);
                if ($image3->insertaImg($conexion) === TRUE) {
                    echo 'correcto';
                } else {
                    echo "Error al insertar datos: 4" . $conexion->error;
                }
//                imagen 4
                $nombreCasa = $inmueble->nombre . '4';
                $nombreimagen = $nombreCasa;

                $ruta_indexphp;
                $ruta_fichero_origen = $ruta4;
                $ruta_nuevo_destino = $ruta_indexphp . '/imagenescasa/' . $nombreimagen . '.jpg';

                if (copy($ruta_fichero_origen, $ruta_nuevo_destino)) {
                    echo 'Archivo copiado con éxito4.';
                } else {
                    echo 'Error al copiar el archivo4.';
                }
                $logo=$rutatrabajo.$nombreimagen.'.jpg';
                $image4 = new Galeria($logo, $id);
                if ($image4->insertaImg($conexion) === TRUE) {
                    echo 'correcto';
                } else {
                    echo "Error al insertar datos: 4" . $conexion->error;
                }
//                imagen 5
                $nombreCasa = $inmueble->nombre . '5';
                $nombreimagen = $nombreCasa;

                $ruta_indexphp;
                $ruta_fichero_origen = $ruta5;
                $ruta_nuevo_destino = $ruta_indexphp . '/imagenescasa/' . $nombreimagen . '.jpg';

                if (copy($ruta_fichero_origen, $ruta_nuevo_destino)) {
                    echo 'Archivo copiado con éxito1.';
                } else {
                    echo 'Error al copiar el archivo1.';
                }
                $logo=$rutatrabajo.$nombreimagen.'.jpg';
                $image5 = new Galeria($logo, $id);
                if ($image5->insertaImg($conexion) === TRUE) {
                    echo 'correcto';
                    header("Location: ../panelAsesor.php?idasesor=".$Asesor->id);
                } else {
                    echo "Error al insertar datos: 4" . $conexion->error;
                }

            } else {
                echo "Error al insertar datos: 3" . $conexion->error;
            }
        } else {
            echo "Error al insertar datos: 2" . $conexion->error;
        }
    } else {
        echo "Error al insertar datos: 1" . $conexion->error;
    }
}
?>