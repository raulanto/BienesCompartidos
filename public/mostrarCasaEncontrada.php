<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bienes Compartidos</title>
	<link href="../dist/output.css" rel="stylesheet" />
	<script src="https://cdn.tailwindcss.com"></script>

	<style>
		html,
		body {
			height: 100%;
		}
	</style>
	<?php
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		// Se ha enviado el formulario utilizando el método GET
		// Puedes realizar las acciones de validación y procesamiento aquí
		$id_inmueble = $_GET['idinmueble'];
		$query = "SELECT
	inmueblepr.galeria.img
	FROM
	inmueblepr.galeria
	WHERE
	inmueblepr.galeria.fk_inmueble = '$id_inmueble'";

		require_once('Controlador/conector.php');

		// Realizar la consulta
		$resultado = mysqli_query($conexion, $query);

		// Obtener el número de filas
		$numFilas = mysqli_num_rows($resultado);

		// Validar si se encontraron datos
		if ($numFilas > 0) {
			// La consulta trae datos
			while ($fila = mysqli_fetch_assoc($resultado)) {
				$valores[] = $fila['img'];
			}


		} else {
			// La consulta no trae datos
			echo "La consulta no ha devuelto resultados.";
		}
		$query2 = "SELECT
		inmobiliarias.nombreEmpresa, 
		inmobiliarias.ubicacion, 
		inmobiliarias.descripcion, 
		inmobiliarias.telefono, 
		inmobiliarias.logo, 
		inmobiliarias.RPC, 
		inmobiliarias.correo, 
		CONCAT(asesor.nombre,' ',asesor.ape_paterno, ' ',asesor.ape_materno ) AS nombre, 
		asesor.telefono AS telefonoempresa, 
		asesor.correo AS correoEmpresa, 
		asesor.CURP
	FROM
		inmueble
		INNER JOIN
		asesor
		ON 
			inmueble.fk_asesor = asesor.ID_asesor
		INNER JOIN
		inmobiliarias
		ON 
			asesor.ID_asesor = inmobiliarias.fk_asesor
	WHERE
		ID_inmueble = '$id_inmueble'";
		$resultados2 = mysqli_query($conexion, $query2);

		$columna = mysqli_fetch_assoc($resultados2);



		$query3 = "SELECT
		inmueble.nombre, 
		inmueble.precio, 
		inmueble.descripcion, 
		inmueble.inmueblecantidad,
		tipoOperacion.nombre AS tipoOperacion, 
		tipoInmueble.nombre AS tipoInmueble, 
		caracteristicas.superficieTerrestre, 
		caracteristicas.superficieConstru, 
		caracteristicas.no_estacionamiento, 
		caracteristicas.no_baños, 
		caracteristicas.no_recamaras, 
		caracteristicas.fk_inmueble, 
		caracteristicas.no_NivelesCasa, 
		estadoInmueble.nombre AS estadoInmueble, 
		CONCAT(ubicacion.calle, ', ', colonias.nombre, ', ', colonias.CP) AS ubicacion, 
		asentamiento.nombre AS asentamiento
	FROM
		inmueble
		INNER JOIN tipooperacion AS tipoOperacion ON inmueble.fk_tipooperacion = tipoOperacion.ID_operacion
		INNER JOIN subtipodeinmueble AS tipoInmueble ON inmueble.fk_tipodeinmueble = tipoInmueble.ID_subtipodeinmueble
		INNER JOIN caracteristicas ON inmueble.ID_inmueble = caracteristicas.fk_inmueble
		INNER JOIN estadoinmuebles AS estadoInmueble ON caracteristicas.fk_estadoinmueble = estadoInmueble.ID_estadoinmuebles
		INNER JOIN ubicacion ON inmueble.ID_inmueble = ubicacion.fk_inmueble
		INNER JOIN colonias ON ubicacion.fk_colonia = colonias.ID_colonias
		INNER JOIN asentamiento ON colonias.fk_tipodeAsentamiento = asentamiento.ID_asentamiento
	WHERE
		inmueble.ID_inmueble = '$id_inmueble'";
	
		$resultados3 = mysqli_query($conexion, $query3);

		$columna2 = mysqli_fetch_assoc($resultados3);

	} else {
		// El formulario no se ha enviado utilizando el método GET
		// Puedes mostrar un mensaje de error o redirigir a otra página
	}



	?>

</head>

<body class="flex flex-col min-h-screen bg-sky-100">

	<!-- Encabezado de la pagina -->
	<nav class="flex flex-row p-1 max-w-screen justify-between items-center ">
		<div class="flex ml-12 ">
			<img class="" src="../src/img/icons/bienescompartidosCL.svg" alt="" width="127.78px" height="33px">
			<a href="../index.php" class="a-primary ">Inicio</a>
			<a href="../buscar.php" class="a-primary ">Buscar</a>
		</div>
		<div class="flex">

		</div>
	</nav>
	<main class="mx-4 ">
		<section class="flex  justify-center ">
			<article class="flex flex-col rounded-md overflow-hidden bg-stone-50 shadow-lg">
				<article class="flex">
					<figcaption class="w-96 h-64 ">
						<img src="vista/<?php echo $valores[0] ?>" alt="">
					</figcaption>
					<figcaption class="flex flex-col">

						<div class="flex">
							<div class="w-48 ">

								<img src="vista/<?php echo $valores[1] ?>" alt="">
							</div>
							<div class="w-48 ">

								<img src="vista/<?php echo $valores[2] ?>" alt="">
							</div>
						</div>
						<figcaption class="flex">
							<section class="w-48 ">

								<img src="vista/<?php echo $valores[3] ?>" alt="">
							</section>
							<section class="w-48 ">

								<img src="vista/<?php echo $valores[4] ?>" alt="">
							</section>
						</figcaption>
					</figcaption>
				</article>

				<section class="mx-4">
					<h3 class="text-3xl font-bold"><?php echo $columna2['nombre'] ?></h3>
					<h4><?php echo $columna2['ubicacion'] ?></h4>
					<hr>

					<h4 class="font-bold">Desde</h4>
					<h2 class="text-2xl font-bold"><?php echo $columna2['precio'] ?></h2>
					<h4>Tipo de inmueble: <?php echo $columna2['tipoInmueble'] ?></h4>
					<h4>Condicion del inmueble: <?php echo $columna2['estadoInmueble'] ?></h4>
					<hr>
					<h2 class="font-bold">Caracteristicas</h2>
					<div class="flex w-full">

						<h5 class="m-2">Unidades:  <?php echo $columna2['inmueblecantidad'] ?></h5>
						<h5 class="m-2">Metros de construcion: <?php echo $columna2['superficieConstru'] ?></h5>
						<h5 class="m-2">Metros de terreno: <?php echo $columna2['superficieTerrestre'] ?></h5>
						<h5 class="m-2">Recamaras: <?php echo $columna2['no_recamaras'] ?></h5>
						<h5 class="m-2 ">Baños:" <?php echo $columna2['no_baños'] ?></h5>
						<h5 class="m-2 ">Niveles:" <?php echo $columna2['no_NivelesCasa'] ?></h5>
					</div>
					<hr>
					<h2 class="font-bold">Descripcion</h2>
					<div class="w-96">
						<p> <?php echo $columna2['descripcion'] ?></p>
					</div>


				</section>
			</article>


		</section>
		<div class="  p-6">
			<div class="bg-white rounded-xl  p-4">
				<h2 class="text-3xl font-extrabold">
					Datos del asesor
				</h2>
				<hr class="border-gray-800">
			</div>
			<article class=" bg-white rounded-md shadow-md">
				<div class="flex mt-4">
					<div class="mx-2">
						<h3 class="text-md font-bold">Nombre</h3>
						<p>
							<?php echo $columna['nombre'] ?>
						</p>
					</div>
					<div class="mx-2">
						<h3 class="text-md font-bold">Telefono</h3>
						<p>
							<?php echo $columna['telefono'] ?>
						</p>
					</div>
					<div class="mx-2">
						<h3 class="text-md font-bold">Correo</h3>
						<p>
							<?php echo $columna['correo'] ?>
						</p>
					</div>
				</div>
				<div class="flex">
					<div class="mx-2">
						<h3 class="text-md font-bold">CURP</h3>
						<p>
							<?php echo $columna['CURP'] ?>
						</p>
					</div>

				</div>
			</article>
			<div class="bg-white rounded-xl p-4 mt-4">
				<h2 class="text-3xl font-extrabold">
					Datos de la inmobiliaria
				</h2>
				<hr class="border-gray-800">
			</div>
			<article class="mt-2 bg-white rounded-md shadow-md">
				<div class="flex items-center justify-center ">
					<img src="vista/<?php echo $columna['logo'] ?>" width="150px" height="150px">
				</div>
				<div class="flex mt-4">
					<div class="mx-2">
						<h3 class="text-md font-bold">Nombre de la empresa</h3>
						<p>
							<?php echo $columna['nombreEmpresa'] ?>
						</p>
					</div>


				</div>
				<div class="mx-2">
					<h3 class="text-md font-bold">ubicacion</h3>
					<p>
						<?php echo $columna['ubicacion'] ?>
					</p>
				</div>
				<div class="mx-2">
					<h3 class="text-md font-bold">Descripcion</h3>
					<p>
						<?php echo $columna['descripcion'] ?>
					</p>
				</div>
				<div class="flex">
					<div class="mx-2">
						<h3 class="text-md font-bold">telefono</h3>
						<p>
							<?php echo $columna['telefonoempresa'] ?>
						</p>
					</div>
					<div class="mx-2">
						<h3 class="text-md font-bold">Correo</h3>
						<p>
							<?php echo $columna['correoEmpresa'] ?>
						</p>
					</div>
				</div>
				<div class="mx-2">
					<h3 class="text-md font-bold">RPC</h3>
					<p>
						<?php echo $columna['RPC'] ?>
					</p>
				</div>
			</article>

		</div>

	</main>

</body>

</html>