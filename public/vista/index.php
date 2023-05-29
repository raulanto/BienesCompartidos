<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bienes Compartidos</title>
	<link href="../../dist/output.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

	<?php

	$query = "SELECT
	inmueblepr.galeria.img
	FROM
	inmueblepr.galeria
	WHERE
	inmueblepr.galeria.fk_inmueble = 1";

	require_once('../Controlador/conector.php');

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


	?>

</head>


<main class="bg-white font-sans leading-normal tracking-normal">
	<section class="mx-14 mt-5">
		<div class="carousel relative shadow-2xl bg-white">
			<div class="carousel-inner relative overflow-hidden w-full">
				<!--Slide 1-->
				<input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
					checked="checked">
				<div class="carousel-item absolute opacity-0" style="height:50vh;">
					<div class="flex justify-center h-full w-full  text-white text-5xl text-center ">
					<img class="bg-cover" src="vista/<?php echo $valores[0] ?>" width="400px" alt="">

</section>

</html>


