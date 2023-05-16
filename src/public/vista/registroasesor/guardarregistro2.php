<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// La solicitud se realizó mediante el método POST
		// Aquí puedes procesar los parámetros recibidos y realizar las validaciones necesaria
		// Continuar con tu lógica de negocio
		// ...
		$usuario=$_POST['usuario'];
		$password=$_POST['password'];
		//Generar el codigo alatorio
		$token='';
		function generartokenAleatorio() {
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
		$token=generartokenAleatorio();
		require_once ('../../Controlador/conector.php');
		$query="
				SELECT
			datosusuario.ID_datosusuario
		FROM
			datosusuario
		ORDER BY
			datosusuario.ID_datosusuario DESC
		";

		$consulta = mysqli_query($conexion,$query);
		$user = mysqli_fetch_assoc($consulta);
		$id =$user['ID_datosusuario']+1;
		// Ejecutar la consulta

		$query="INSERT INTO inmueblepr.datosusuario(ID_datosusuario, username,password, token) VALUES ($id, '$usuario', AES_ENCRYPT('root','$password'),'$token')";
		if ($conexion->query($query) === TRUE) {
			require_once ('Asesor.php');
			session_start();
			$asesor = $_SESSION['Asesor'];
			$asesor->fk_datousuario = $id;
			// Guardar el objeto Asesor actualizado en la variable de sesión
			$_SESSION['Asesor'] = $asesor;
			header("Location: registro-3.php");
            exit;
		} else {
			echo "Error al insertar datos: " . $conexion->error;
		}





} else {
      // La solicitud no se realizó mediante el método POST
      // Puedes mostrar un mensaje de error o redirigir a otra página
      echo "Error: La solicitud debe realizarse mediante el método GET.";
}

?>