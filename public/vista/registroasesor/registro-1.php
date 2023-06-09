<!DOCTYPE html>
<html lang="es">

    <!-- Registro de de asesor primera parte
    nombre 
    apellido paterno 
    apellido Materno
    Correo 
    Telefono 
    curp -->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- hoja de estilos -->
    <link href="../../../dist/output.css" rel="stylesheet" />

    <title>Registro usuario</title>
    <style>
        html,
        body {
          height: 100%;
        }
      </style>
    <script  src="../../main.js"></script>
</head>
<body class="bg-fondoRegistro max-h-screen max-w-screen bg-cover bg-center flex flex-col min-h-screen">
    <!-- Encabezado de la pagina -->
    <nav class="flex flex-row p-2 max-w-screen justify-between items-center sticky top-0  z-10">
        <div class="flex ml-12 ">
            <img class="" src="../../../src/img/icons/bienescompartidosCL.svg" alt="" width="127.78px" height="33px">
            <a href="" class="a-primary ">Inicio</a>
            <a href="../../../buscar.php" class="a-primary ">Buscar</a>
        </div>
        <div class="flex">
            <a href="../../index.php"
               class="mx-3  button-prymary">Iniciar</a>
            <a href="registroAsesor.php"
               class="mx-3 button-tercery">Registrarse</a>
        </div>

    </nav>

    <!-- Funcion principal de la pagina -->
    <main class=" flex flex-grow items-center justify-center  bg-cover">
        <section class="flex justify-between items-center">
            <!-- titulo -->
            <div class="w-96">
                <h2 class="text-5xl  font-extrabold mt-11 mr-7 text-right line-clamp-3 text-gray-900 leading-10">
                    Comienza creando tu cuenta.
                </h2>
                <hr class="border-gray-900  mt-2">

            </div>

            <!--
          Entrada de datos Personales de la tabla vendedor de los inmuebles
        -->
            <form action="guardarAsesor.php" method="post" class="flex  h-fit w-80 select-none m-2" id="myForm" onsubmit="return validarFormulario()">
                <div class="w-96 p-6 shadow-lg bg-white rounded-md   ">
                    <h4 class="text-3xl block text-center font-bold text-gray-900">
                        Datos personales
                    </h4>

                    <div class="mt-3">
                        <label for="nombre" class="block text-base mb-2">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="  w-full input-prymary" placeholder="Nombre..." oninput="validarInput(event)"  required/>
                    </div>

                    <div class="mt-3">
                        <label for="apellidoP" class="block text-base mb-1">Apellido Paterno</label>
                        <input type="text" id="apellidoP" name="apellidoP" class="w-full input-prymary" placeholder="Apellido..." oninput="validarInput(event)" required />
                    </div>
                    <div class="mt-3">
                        <label for="apellido" class="block text-base mb-1">Apellido Materno</label>
                        <input type="text" id="apellidoM" name="apellidoM" class="w-full input-prymary" placeholder="Apellido... " oninput="validarInput(event)" required />
                    </div>
                    <div class="mt-3">
                        <label for="correo" class="block text-base mb-1">Correo</label>
                        <input type="email" id="correo"  name="correo" class="w-full input-prymary" placeholder="Correo..." re/>
                    </div>
                    <div class="mt-3">
                        <label for="telefono" class="block text-base mb-1">Telefono</label>
                        <input type="tel" id="telefono"  name="telefono" class="w-full input-prymary" placeholder="Telefono..." maxlength="10" />
                    </div>
                    <div class="mt-3">
                        <label for="CURP" class="block text-base mb-1">CURP</label>
                        <input type="text" min="18" id="CURP"  name="CURP" class="w-full input-prymary uppercase" placeholder="CURP..." maxlength="18"/>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="w-full border-2 border-purple-700 bg-purple-50 text-purple-700 py-1 px-1 rounded-md 
                        hover:bg-purple-700 hover:text-white font-semibold">
                            Iniciar
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </main>
    <footer class="flex max-w-screen bg-gray-950 p-2 items-center justify-items-center relative flex-shrink-0">
        <div class="m-2">
            <h2 class="text-white text-base">
                © 2023 BienesCompartidos. Todos los derechos reservados.
            </h2>
        </div>
        <div class="ml-12">
            <img src="../../../src/img/icons/bienescompartidosBL.svg" alt="BienesCompartidos" width="135px" />
        </div>
    </footer>
</body>

</html>