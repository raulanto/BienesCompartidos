<!DOCTYPE html>
<html lang="es">
<?php
session_start();
if (!$_SESSION['logueado'] == true) {
    header("Location: ../login.php");
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- hoja de estilos  -->
    <link href="../../../dist/output.css" rel="stylesheet">

    <title>Registro usuario</title>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-fondo2 bg-cover bg-center">
    <nav class="flex flex-row p-1 max-w-screen justify-between items-center ">
        <!-- Contenido de la barra de navegación -->
        <div class="flex ml-12 ">
            <img class="" src="../../../src/img/icons/bienescompartidosCL.svg" alt="" width="127.78px" height="33px">
            <a href="" class="a-primary ">Inicio</a>
            <a href="" class="a-primary ">Inicio</a>
            <a href="" class="a-primary ">Inicio</a>
            <a href="" class="a-primary ">Inicio</a>
        </div>

    </nav>
    <div class="flex-grow">
        <!-- Contenido principal de la página -->
        <main class="flex    p-2 my-5">
            <section class="flex  ">
                <!-- titulo -->
                <div class="w-96 ">
                    <h2 class="text-5xl  font-extrabold ml-11 mt-11 text-left line-clamp-3 text-gray-900 leading-10
                    ">Empieza subiendo tu inmueble.</h2>
                    <p class="ml-11 mt-4 mb-8">
                        Para poder subir un inmueble tienes que estar registrado como asesor
                    </p>
                    <a href="registroCasa2.php" class="button-prymary ml-11">Comenzar.</a>
                </div>


            </section>
        </main>
    </div>

    <footer class="flex max-w-screen bg-gray-950 p-2 items-center justify-items-center">
        <!-- Contenido del footer -->
        <div class="m-2">
            <h2 class="text-white text-base font-semibold"> © 2023 BienesCompartidos. Todos los derechos reservados.
            </h2>

        </div>
        <div class="ml-12">
            <img class="" src="../../../src/img/icons/bienescompartidosBL.svg" alt="" width="127.78px" height="33px">
        </div>
    </footer>
</body>

</html>