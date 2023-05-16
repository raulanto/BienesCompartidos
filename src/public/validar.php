<?php
session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['username'];
        $password = $_POST['password'];

        require_once ('Controlador/conector.php');
        $query="SELECT
                datosusuario.ID_datosusuario 
            FROM
                datosusuario 
            WHERE
                datosusuario.username = '$nombre' 
                AND datosusuario.PASSWORD = aes_encrypt( 'root', '$password' )";
        $consulta = mysqli_query($conexion,$query);

        if(!$consulta){ 
            // echo "Usuario no existe " . $nombre . " " . $password. " o hubo un error " . 
            echo mysqli_error($mysqli);
            // si la consulta falla es bueno evitar que el código se siga ejecutando
            exit;
        } 
        if($user = mysqli_fetch_assoc($consulta)) {
            require_once('vista/registroasesor/Asesor.php');
            $iduser=$user['ID_datosusuario'];
            $_SESSION['Asesor'] = new Asesor($iduser);
            $_SESSION['logueado'] = true;
            header("Location: vista/panelAsesor.php?idasesor=".$iduser);
            exit;
        }else {
            header("Location: incorrecto.php");
        }
    }

?>