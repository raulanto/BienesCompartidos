<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos enviados por el formulario
        $nombreEmpresa = $_POST['nombre'];
        $rpc = $_POST['RPC'];
        $telefonoEmpresa = $_POST['Telefono-de-la-empresa'];
        $correoEmpresa = $_POST['Correo-de-la-empresa'];
        $ubicacionEmpresa = $_POST['ubicacion'];
        $descripcionEmpresa = $_POST['descripcion'];
            require_once ('../../Controlador/conector.php');
            $query="
            SELECT
            inmobiliarias.ID_inmobiliarias
        FROM
            inmobiliarias
        ORDER BY
            inmobiliarias.ID_inmobiliarias DESC
            ";

            $consulta = mysqli_query($conexion,$query);
            $user = mysqli_fetch_assoc($consulta);
            $id =$user['ID_inmobiliarias']+1;
            // Ejecutar la consulta

            $query="INSERT INTO inmueblepr.inmobiliarias(ID_inmobiliarias,nombreEmpresa, ubicacion, descripcion, telefono,  RPC,correo) VALUES ('$id', '$nombreEmpresa', '$ubicacionEmpresa', '$descripcionEmpresa', '$telefonoEmpresa', '$rpc','$correoEmpresa')";

		if ($conexion->query($query) === TRUE) {
            require_once ('Asesor.php');

			session_start();
			$asesor = $_SESSION['Asesor'];
			$asesor->fk_inmobiliaria = $id;
			// Guardar el objeto Asesor actualizado en la variable de sesión
            $query="
                SELECT
                asesor.ID_asesor
            FROM
                asesor
            ORDER BY
                asesor.ID_asesor DESC
            ";

            $consulta = mysqli_query($conexion,$query);
            $user = mysqli_fetch_assoc($consulta);
            $id =$user['ID_asesor']+1;

            $query = "INSERT INTO inmueblepr.asesor(ID_asesor, nombre, ape_paterno, ape_materno, telefono, correo, fk_inmobiliaria, fk_datousuario, CURP) 
            VALUES ('$id', '{$asesor->nombre}', '{$asesor->ape_paterno}', '{$asesor->ape_materno}', '{$asesor->telefono}', '{$asesor->correo}', '{$asesor->fk_inmobiliaria}', '{$asesor->fk_datousuario}', '{$asesor->CURP}')";
            

            if ($conexion->query($query) === TRUE) {
                $_SESSION['Asesor'] = $asesor;
                $_SESSION['logueado'] = true;

                header("Location: ../panelAsesor.php?idasesor=".$id);
                exit;
            } else {
                echo "Error al insertar datos: 1" . $conexion->error;
            }
        
        } else {
            echo "Error al insertar datos: 2" . $conexion->error;
        }





} else {
      // La solicitud no se realizó mediante el método POST
      // Puedes mostrar un mensaje de error o redirigir a otra página
      echo "Error: La solicitud debe realizarse mediante el método GET.";
}

?>