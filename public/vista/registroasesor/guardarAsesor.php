<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // La solicitud se realizó mediante el método POST
    // Aquí puedes procesar los parámetros recibidos y realizar las validaciones necesaria
    // Continuar con tu lógica de negocio
    // ...
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $curp = $_POST['CURP'];
    // archivo1.php
    // Guardar el objeto Asesor actualizado en la variable de sesión
    require_once('../../Controlador/conector.php');
    $query = "SELECT asesor.ID_asesor FROM asesor ORDER BY asesor.ID_asesor DESC";

    $consulta = mysqli_query($conexion, $query);
    $user = mysqli_fetch_assoc($consulta);
    $id = $user['ID_asesor'] + 1;

    require_once('Clases.php');
    session_start();
    $_SESSION['Asesor'] = new Asesor($id,$nombre, $apellidoP, $apellidoM, $telefono, $correo, $curp);
    header("Location: registro-2.php");



} else {
    // La solicitud no se realizó mediante el método POST
    // Puedes mostrar un mensaje de error o redirigir a otra página
    echo "Error: La solicitud debe realizarse mediante el método GET.";
}


?>