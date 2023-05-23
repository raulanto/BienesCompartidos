<?php




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados por el formulario
    $nombreEmpresa = $_POST['nombre'];
    $rpc = $_POST['RPC'];
    $telefonoEmpresa = $_POST['Telefono-de-la-empresa'];
    $correoEmpresa = $_POST['Correo-de-la-empresa'];
    $ubicacionEmpresa = $_POST['ubicacion'];
    $descripcionEmpresa = $_POST['descripcion'];
    $logo = $_FILES['dropzone-file']['tmp_name'];

    require_once('../../Controlador/conector.php');

                    $validar="
                    SELECT
                inmobiliarias.ID_inmobiliarias
            FROM
                inmobiliarias
            WHERE
                inmobiliarias.RPC = '$rpc' or
                inmobiliarias.correo = '$correoEmpresa' or
                inmobiliarias.nombreEmpresa = '$nombreEmpresa' or
                inmobiliarias.telefono = '$telefonoEmpresa'" ;
    echo $nombreusuario;
    $resultado = mysqli_query($conexion, $validar);

    // Obtener el número de filas
    $numFilas = mysqli_num_rows($resultado);

    // Validar si se encontraron datos
    if ($numFilas > 0) {
    header("Location: informacionnovalida.php");
    } else {
        // Ejecutar la consulta
        $rutatrabajo='registroasesor/imagenesEmpresa/';

        require_once('Clases.php');
        session_start();
        $asesor=$_SESSION['Asesor'];
        $_SESSION['Inmobiliaria'] = new Inmobiliaria($nombreEmpresa, $ubicacionEmpresa, $descripcionEmpresa, $telefonoEmpresa, $logo, $rpc, $correoEmpresa,$asesor->id);
        $nombreimagen=$nombreEmpresa;
        $ruta_indexphp = dirname(realpath(__FILE__));
        echo $ruta_indexphp;
        $ruta_fichero_origen =$logo;
        $ruta_nuevo_destino = $ruta_indexphp . '/imagenesEmpresa/' . $nombreimagen . '.jpg';
    
        if (copy($ruta_fichero_origen, $ruta_nuevo_destino)) {
            echo 'Archivo copiado con éxito.';
        } else {
            echo 'Error al copiar el archivo.';
        }
        $logo=$rutatrabajo.$nombreimagen.'.jpg';
        $_SESSION['Inmobiliaria'] = new Inmobiliaria( $nombreEmpresa, $ubicacionEmpresa, $descripcionEmpresa, $telefonoEmpresa, $logo, $rpc, $correoEmpresa,$asesor->id);
    
        header("Location: cuentaRegistrada.php");
    
    }










} else {
    // La solicitud no se realizó mediante el método POST
    // Puedes mostrar un mensaje de error o redirigir a otra página
    echo "Error: La solicitud debe realizarse mediante el método GET.";
}

?>