<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // La solicitud se realizó mediante el método POST
    // Aquí puedes procesar los parámetros recibidos y realizar las validaciones necesaria
    // Continuar con tu lógica de negocio
    // ...
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    //Generar el codigo alatorio
    $token = '';
    function generartokenAleatorio()
    {
        $token = "";
        for ($i = 0; $i < 5; $i++) {
            $tipo = rand(1, 2);
            if ($tipo == 1) {
                $letra = chr(rand(65, 90));
                $token .= $letra;
            } else {
                $numero = rand(0, 9);
                $token .= $numero;
            }
        }
        return $token;
    }

    $token = generartokenAleatorio();
    require_once('../../Controlador/conector.php');
    $query = "SELECT datosusuario.ID_datosusuario FROM datosusuario ORDER BY datosusuario.ID_datosusuario DESC";
    $consulta = mysqli_query($conexion, $query);
    $user = mysqli_fetch_assoc($consulta);
    $id = $user['ID_datosusuario'] + 1;
    // Ejecutar la consulta
    require_once('Clases.php');
    session_start();
    $_SESSION['DatosUsuario'] = new DatosUsuario($id,$usuario, $password, $token);
    header("Location: registro-3.php");



} else {
    // La solicitud no se realizó mediante el método POST
    // Puedes mostrar un mensaje de error o redirigir a otra página
    echo "Error: La solicitud debe realizarse mediante el método GET.";
}

?>