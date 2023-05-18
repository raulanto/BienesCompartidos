<!DOCTYPE html>
<html lang="es">

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
    <script src="../../main.js"></script>

</head>

<body class="flex flex-col min-h-screen bg-fondoRegistro bg-cover bg-center">
    <nav class="flex flex-row p-1 max-w-screen justify-between items-center ">
        <!-- Contenido de la barra de navegación -->
        <div class="flex ml-12 ">
            <img class="" src="../../../src/img/icons/bienescompartidosCL.svg" alt="" width="127.78px" height="33px" />

            <a href="" class="a-primary ">Inicio</a>
            <a href="" class="a-primary ">Inicio</a>
            <a href="" class="a-primary ">Inicio</a>
            <a href="" class="a-primary ">Inicio</a>
        </div>

    </nav>
    <div class="flex-grow">
        <!-- Contenido principal de la página -->
        <main class="flex  text-left items-center justify-center  p-2 my-5">
            <section class=" p-2 shadow-lg bg-white rounded-md px-6 w-fit ">
                <h4 class="text-3xl block text-center font-bold text-gray-900 m-3">Datos de la Inmobiliaria</h4>
                <form id="myForm" action="guardarInmobiliaria.php" method="post"
                      class=" flex flex-col justify-center items-center" onsubmit="return validarFormulario()">
                    <div class="flex flex-grow mx-3 px-2">
                        <div class="flex flex-col  ">
                            <div class="flex-initial w-64 mx-2 ">

                                <div class="mt-3 px-2">
                                    <label for="nombre" class="block text-base mb-2">Nombre Empresa</label>
                                    <input type="text" id="nombre" name="nombre"
                                        class="  border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-purple-600 rounded-md"
                                        required placeholder="Nombre..." />
                                </div>

                                <div class="mt-3 px-2">
                                    <label for="RPC" class="block text-base mb-2">RPC</label>
                                    <input type="text" id="CURP" name="RPC"
                                        class="  border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-purple-600 rounded-md"
                                        maxlength="18" required placeholder="RPC..." />
                                </div>

                                <div class="mt-3 px-2">
                                    <label for="Telefono-de-la-empresa" class="block text-base mb-2">Telefono de la
                                        empresa</label>
                                    <input type="text" id="telefono" name="Telefono-de-la-empresa"
                                        class="  border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-purple-600 rounded-md"
                                        maxlength="10" required placeholder="Telefono de la empresa..." />
                                </div>

                                <div class="mt-3 px-2">
                                    <label for="Correo-de-la-empresa" class="block text-base mb-2">Correo de la
                                        empresa</label>
                                    <input type="email" id="Correo-de-la-empresa" name="Correo-de-la-empresa"
                                        class="  border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-purple-600 rounded-md"
                                        required placeholder="Correo..." />
                                </div>

                            </div>
                        </div>

                        <div class="flex flex-grow mx-3 px-2">
                            <div class="flex flex-col  ">
                                <div class="flex-initial w-64 mx-2 ">

                                    <div class="mt-3 px-2">
                                        <label for="ubicacion" class="block text-base mb-2">Ubicacion de la
                                            empresa</label>
                                        <textarea id="ubicacion" cols="30" rows="2" name="ubicacion" id="ubicacion"
                                            required
                                            class="border resize-y  w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-purple-600 rounded-md"></textarea>
                                    </div>

                                    <div class="mt-3 px-2">
                                        <label for="descripción" class="block text-base mb-2">Descripción de la
                                            empresa</label>
                                        <textarea id="descripcion" cols="30" rows="2" name="descripcion"
                                            id="descripción" required
                                            class="border resize-y  w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-purple-600 rounded-md"></textarea>
                                    </div>
                                    <div class="mt-3 px-2">
                                        <label for="dropzone-file"
                                            class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center rounded-md border-2 border-dashed border-gray-400 hover:border-purple-400 bg-white p-2 text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-purple-500"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>

                                            <h2 class="mt-1 
                                             font-medium text-gray-700 tracking-wide">Logo
                                                File</h2>

                                            <p class="mt-2 text-gray-500 tracking-wide text-base"> Subir imagen png o
                                                jpg</p>
                                            <input id="dropzone-file" name="dropzone-file" type="file" class="hidden" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 w-48">
                        <button type="submit" class="border-2 border-purple-600 bg-purple-200 text-purple-600 py-1 w-full rounded-md hover:bg-transparent 
                hover:bg-purple-600 hover:text-white font-semibold">Continuar</button>
                    </div>

                </form>

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
            <img class="" src="../../../src/img/icons/bienescompartidosBL.svg" alt="" width="127.78px" height="33px" />
        </div>
    </footer>
</body>

</html>