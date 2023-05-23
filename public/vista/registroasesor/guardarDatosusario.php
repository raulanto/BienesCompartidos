<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // La solicitud se realizó mediante el método POST
    // Aquí puedes procesar los parámetros recibidos y realizar las validaciones necesaria
    // Continuar con tu lógica de negocio
    // ...
    $nombreusuario = $_POST['usuario'];
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
    require_once('../../Controlador/conector.php');

        $token = generartokenAleatorio();
        $validar="
            SELECT
        datosusuario.ID_datosusuario 
    FROM
        datosusuario 
    WHERE
        datosusuario.username ='$nombreusuario'" ;
    echo $nombreusuario;
    $resultado = mysqli_query($conexion, $validar);

    // Obtener el número de filas
    $numFilas = mysqli_num_rows($resultado);

    // Validar si se encontraron datos
    if ($numFilas > 0) {
        header("Location: informacionnovalida.php");
    } else {
            // Ejecutar la consulta
            echo 'si';
            require_once('Clases.php');
            session_start();
            $asesor=$_SESSION['Asesor'];
            $_SESSION['DatosUsuario'] = new DatosUsuario($nombreusuario, $password, $token,$asesor->id);

            header("Location: registro-3.php");
    }





} else {
    // La solicitud no se realizó mediante el método POST
    // Puedes mostrar un mensaje de error o redirigir a otra página
    echo "Error: La solicitud debe realizarse mediante el método GET.";
}

?>