<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // La solicitud se realizó mediante el método POST
      // Aquí puedes procesar los parámetros recibidos y realizar las validaciones necesaria
      // Continuar con tu lógica de negocio
      // ...
      $nombre=$_POST['nombre'];
      $apellidoP=$_POST['apellidoP'];
      $apellidoM=$_POST['apellidoM'];
      $correo=$_POST['correo'];
      $telefono=$_POST['telefono'];
      $curp=$_POST['CURP'];
      // archivo1.php
      require_once ('Asesor.php');
        session_start();
        $_SESSION['Asesor'] = new Asesor($nombre, $apellidoP, $apellidoM,$telefono, $correo, 0, 0, $curp);
      header("Location: vista/registro-2.php");
      exit;


  } else {
      // La solicitud no se realizó mediante el método POST
      // Puedes mostrar un mensaje de error o redirigir a otra página
      echo "Error: La solicitud debe realizarse mediante el método GET.";
  }




?>