<?php
session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['username'];
        $password = $_POST['password'];

        require_once ('Controlador/conector.php');
        $query="SELECT
                datosusuario.fk_asesor 
            FROM
                datosusuario 
            WHERE
                datosusuario.username = '$nombre' 
                or datosusuario.PASSWORD = '$password'";
        $consulta = mysqli_query($conexion,$query);

        if(!$consulta){ 
            // echo "Usuario no existe " . $nombre . " " . $password. " o hubo un error " . 
            echo mysqli_error($mysqli);
            // si la consulta falla es bueno evitar que el código se siga ejecutando
            exit;
        } 
        if($user = mysqli_fetch_assoc($consulta)) {
            require_once('vista/registroasesor/Clases.php');
            $iduser=$user['fk_asesor'];
            $_SESSION['Asesor'] = new Asesor($iduser);
            $_SESSION['logueado'] = TRUE;
            header("Location: vista/panelAsesor.php?idasesor=".$iduser);
        }else {
            header("Location: incorrecto.php");
        }
    }

?>