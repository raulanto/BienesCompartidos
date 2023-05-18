<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados por el formulario
    $nombreEmpresa = $_POST['nombre'];
    $rpc = $_POST['RPC'];
    $telefonoEmpresa = $_POST['Telefono-de-la-empresa'];
    $correoEmpresa = $_POST['Correo-de-la-empresa'];
    $ubicacionEmpresa = $_POST['ubicacion'];
    $descripcionEmpresa = $_POST['descripcion'];
    $logo = $_POST['dropzone-file'];
    // archivo1.php
    require_once('../../Controlador/conector.php');
    $query = "SELECT inmobiliarias.ID_inmobiliarias FROM inmobiliarias ORDER BY inmobiliarias.ID_inmobiliarias DESC";

    $consulta = mysqli_query($conexion, $query);
    $user = mysqli_fetch_assoc($consulta);
    $id = $user['ID_inmobiliarias'] + 1;
    require_once('Clases.php');
    session_start();
    $_SESSION['Inmobiliaria'] = new Inmobiliaria($id, $nombreEmpresa, $ubicacionEmpresa, $descripcionEmpresa, $telefonoEmpresa, $logo, $rpc, $correoEmpresa);
    header("Location: cuentaRegistrada.php");


} else {
    // La solicitud no se realizó mediante el método POST
    // Puedes mostrar un mensaje de error o redirigir a otra página
    echo "Error: La solicitud debe realizarse mediante el método GET.";
}

?>