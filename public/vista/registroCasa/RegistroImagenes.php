<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- hoja de estilos  -->
    <link href="../../../dist/output.css" rel="stylesheet">

    <title>Registro Inmueble</title>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>

</head>
<body class="flex flex-col min-h-screen bg-fondoRegistro bg-cover bg-center bg-scale-75">

<script>
    function confirmarEnvio() {
        if (confirm('¿Estás seguro de enviar el formulario?')) {
            return true; // Permite el envío del formulario
        } else {
            return false; // Evita el envío del formulario
        }
    }
</script>
<?php

session_start();

?>
<main class="flex-grow">
    <!-- Contenido principal de la página -->
    <section class="flex h-fit text-left  p-2 my-5">
        <aside class="flex flex-col p-3.5 m-2 w-80 h-fit rounde rounded-xl border border-gray-950 bg-white  ">
            <h3 class="text-center font-semibold text-2xl my-3">Principales</h3>
            <button disabled
                    class="text-left px-2 py-1 mt-2 rounded font-semibold rounde-md  bg-purple-50/40 text-purple-700/40 border-2 border-purple-700/40 ">
                Operación
                y tipo de inmueble
            </button>
            <button disabled
                    class="text-left px-2 py-1 mt-2 rounded font-semibold rounde-md  bg-purple-50/40 text-purple-700/40 border-2 border-purple-700/40 ">
            Ubicacion
            </button>
            <button
                class="text-left px-2 py-1 mt-2 rounded font-semibold rounde-md  bg-purple-50/40 text-purple-700/40 border-2 border-purple-700/40">
                Caracteristicas
            </button>

            <button
                class="text-left px-2 py-1 mt-2 rounded font-semibold rounde-md  bg-purple-100 text-purple-700 border-2 border-purple-700">
                Imagenes
            </button>

        </aside>
<!--        formulario-->
        <form class=" bg-gray-200 rounded-md px-1 w-10/12 container mx-auto" action="insertarDatos.php" method="post" onsubmit="return confirmarEnvio()" enctype="multipart/form-data">
            <article class="w-full bg-white mt-3 rounded-md p-4">
                <div class="px-2">
                    <h1 class="text-3xl font-extrabold ">!Hola, comencemos a crear tu aviso¡ </h1>
                    <hr class="border-gray-900  mt-2">
                </div>

                <h2 class="mt-4 font-bold text-2xl px-2">Imagenes de tu inmueble</h2>

                <div class="mt-4 mb-3">

                    <input
                        class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none "
                        type="file"
                        id="formFile"
                        name="imagen1" required/>
                </div>
                <div class="mb-3">

                    <input
                        class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none "
                        type="file"
                        id="formFile"
                    name="imagen2" required/>
                </div>
                <div class="mb-3">

                    <input
                        class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none "
                        type="file"
                        id="formFile"
                        name="imagen3" required/>
                </div>
                <div class="mb-3">

                    <input
                        class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none "
                        type="file"
                        id="formFile"
                    name="imagen4" required/>
                </div>
                <div class="mb-3">

                    <input
                        class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none "
                        type="file"
                        id="formFile"
                    name="imagen5" required/>
                </div>
            </article>

            <!-- Botones de confirmacion -->
            <div class="flex justify-between m-3">
                <button class="button-orange" onclick="history.back()">Regresar</button>
                <div>
                    <a href="../panelAsesor.php?idasesor=<?php echo $_SESSION['idasesor']?>" class="button-danger mx-3">Salir</a>
                    <button class="button-secundary" type="submit">Continuar</button>
                </div>
            </div>
        </form>
    </section>
</main>

<footer class="flex max-w-screen bg-gray-950 p-2 items-center justify-items-center">
    <!-- Contenido del footer -->
    <section class="m-2">
        <h2 class="text-white text-base font-semibold"> © 2023 BienesCompartidos. Todos los derechos reservados.
        </h2>

    </section>
    <div class="ml-12">
        <img src="../../../src/img/icons/bienescompartidosBL.svg" alt="BienesCompartidos" width="135px">
    </div>
</footer>


</body>

</html>