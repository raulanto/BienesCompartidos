<?php
session_start();
if(!$_SESSION['logueado']==TRUE){
    header("Location: ../index.php");
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../dist/output.css" rel="stylesheet" />
    <title>Panel Asesor</title>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">

<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // La solicitud se realizó mediante el método GET
    // Aquí puedes procesar los parámetros recibidos y realizar las validaciones necesarias
    $idasesor = $_GET['idasesor'];
    $_SESSION['idasesor']=$idasesor;
    require_once ('../Controlador/conector.php');
    $query = "SELECT
      subtipodeinmueble.nombre, 
      subtipodeinmueble.ID_subtipodeinmueble
    FROM
      subtipodeinmueble";
    $consulta1 = mysqli_query($conexion, $query);

    $query2 = "SELECT tipooperacion.ID_operacion,tipooperacion.nombre FROM tipooperacion";
    $consulta2 = mysqli_query($conexion, $query2);
} else {
    // La solicitud no se realizó mediante el método GET
    // Puedes mostrar un mensaje de error o redirigir a otra página
    echo "Error: La solicitud debe realizarse mediante el método GET.";
}

?>

<!-- Encabezado de la pagina -->
<nav class="flex flex-row p-1 max-w-screen justify-between items-center ">
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <link href="../../dist/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- page -->
    <main class="min-h-screen w-full bg-cover backdrop-blur-md bg-white/30 bg-origin-content text-gray-700 " x-data="layout" style="background-image:url('../../src/img/gradient.jpg') ;" >
        <!-- header page -->
        <header class="flex w-full items-center justify-between  border-gray-200 bg-white p-2 z-10">
            <!-- logo -->
            <div class="flex">
                <img
                    class=""
                    src="../../src/img/icons/bienescompartidosCL.svg"
                    alt=""
                    width="127.78px"
                    height="33px"
                />
                <a href="" class="a-primary ">Inicio</a>
                <a href="" class="a-primary ">Conocenos</a>

            </div>
            <!-- button profile -->
            <div>
                <button type="button" @click="profileOpen = !profileOpen" @click.outside="profileOpen = false"
                        class="h-9 w-9 overflow-hidden rounded-full">
                    <img src="../../src/img/User-Icon-Grey-1264218711 (1).jpg" alt="plchldr.co" />
                </button>

                <!-- dropdown profile -->
                <div class="absolute right-2 mt-1 w-48 divide-y divide-gray-200 rounded-md border border-gray-200 bg-white shadow-md"
                     x-show="profileOpen" x-transition>
                    <div class="flex items-center space-x-2 p-2">
                        <img src="../../src/img/User-Icon-Grey-1264218711 (1).jpg" alt="plchldr.co" class="h-9 w-9 rounded-full" />
                        <div class="font-medium">asesor</div>
                    </div>

                    <div class="flex flex-col space-y-3 p-2">
                        <a href="panelAsesor.php?idasesor=<?php echo $idasesor?>" class="transition hover:text-purple-600">Perfil</a>
                        <a href="../vista/registroCasa/registroCasa.php?idasesor=<?php echo $idasesor?>" class="transition hover:text-purple-600">Subir casa</a>
                        <a href="mostrarCasas.php?idasesor=<?php echo $idasesor?>" class="transition hover:text-purple-600">Mostrar catalogo</a>
                    </div>

                    <div class="p-2">
                        <a href="../close.php" class="flex items-center space-x-2 transition hover:text-purple-600">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <div>Salir</div>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <div class="  p-6">
            <section class="flex h-fit text-left  p-2 my-5">
                <aside
                    class="flex flex-col p-3.5 m-2 w-80 h-fit rounde rounded-xl border border-gray-950  bg-white"
                >
                    <h3 class="text-center font-semibold text-2xl my-3">Principales</h3>
                    <button
                        class="text-left px-2 py-1 mt-2 rounded font-semibold rounde-md  bg-purple-100 text-purple-700 border-2 border-purple-700"
                    >
                        Operación y tipo de inmueble
                    </button>
                    <button
                        disabled
                        class="text-left px-2 py-1 mt-2 rounded font-semibold rounde-md  bg-purple-50/40 text-purple-700/40 border-2 border-purple-700/40 "
                    >
                        Ubicación
                    </button>
                    <button
                        disabled
                        class="text-left px-2 py-1 mt-2 rounded font-semibold rounde-md  bg-purple-50/40 text-purple-700/40 border-2 border-purple-700/40 "
                    >
                        Características
                    </button>
                    <button
                        disabled
                        class="text-left px-2 py-1 mt-2 rounded font-semibold rounde-md  bg-purple-50/40 text-purple-700/40 border-2 border-purple-700/40 mb-6"
                    >
                        Galeria
                    </button>
                </aside>
                <!--          Formulario-->
                <form
                    class=" bg-gray-200 rounded-md px-1 w-10/12 container mx-auto"
                    action="guardardatos1.php"
                    method="post"
                    onsubmit="return validarFormulario()"
                >
                    <article class="w-full bg-white mt-3 rounded-md p-4">
                        <div class="px-2">
                            <h1 class="text-3xl font-extrabold ">
                                !Hola, comencemos a crear tu aviso¡
                            </h1>
                            <hr class="border-gray-900  mt-2"/>
                        </div>

                        <h2 class="mt-6 font-bold text-2xl px-2">
                            Cuéntanos que quieres publicar
                        </h2>

                        <!-- Selecionador Tipo de operacion -->
                        <div class="px-2 mt-3">
                            <label for="" class="block font-bold">Tipo de operacion</label>
                            <select
                                data-te-select-init
                                data-te-select-visible-options=""
                                class="h-9 py-1 m-2 focus:outline-none focus:ring-0 focus:border-morado rounded-md"
                                name="tipoOperacion"
                                id="tipoOperacion"
                            >
                                <option value="0">Selecione una opcion</option>
                                <?php
                                foreach ($consulta2 as $tipoOperacion) {
                                    echo '<option value="' . $tipoOperacion['ID_operacion'] . '">' . $tipoOperacion['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Tipo de inmueble casa -->
                        <div class="flex px-2 mt-3">
                            <div class="">
                                <label for="" class="block font-bold">Tipo de inmueble </label>
                                <select
                                    data-te-select-init
                                    data-te-select-visible-options=""
                                    class="h-9 py-1 m-2 focus:outline-none focus:ring-0 focus:border-morado rounded-md"
                                    id="tipoInmueble"
                                    name="tipoInmueble"
                                >
                                    <option value="0">Selecione una opcion</option>
                                    <?php
                                    foreach ($consulta1 as $tipoCasa) {
                                        echo '<option value="' . $tipoCasa['ID_subtipodeinmueble'] . '">' . $tipoCasa['nombre'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <div class="px-2 mt-3">
                                    <label for="username" class="block font-bold">Cantidad </label>
                                    <input required type="number" id="cantidad" name="cantidad"
                                           class="m-2  input-prymary w-full" placeholder="Cantidad..."/>
                                </div>
                            </div>

                        </div>
                    </article>
                    <!-- Botones de confirmacion -->
                    <div class="flex justify-between m-3">
                        <button class="button-orange" onclick="history.back()">Regresar</button>
                        <div>
                            <a href="../panelAsesor.php" class="button-danger mx-3">Salir</a>
                            <button class="button-secundary" type="submit">Continuar</button>
                        </div>
                    </div>
                </form>
            </section>

        </div>

    </main>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("layout", () => ({
                profileOpen: false,
                asideOpen: true,
            }));
        });
    </script>
</body>

</html>