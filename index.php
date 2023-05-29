<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="dist/output.css" rel="stylesheet">
    <title>Bienes Compartidos</title>
   
    <style>
        html,
        body {
            height: 100%;
        }
        html {
  scroll-behavior: smooth;
}
    </style>
</head>
<body class="flex flex-col min-h-screen ">
        <nav class="flex flex-row p-2 max-w-screen justify-between items-center sticky top-0 backdrop-blur-md bg-white/30 z-10">
            <div class="flex ml-12 ">
                <img class="" src="src/img/icons/bienescompartidosCL.svg" alt="" width="127.78px" height="33px">
                <a href="" class="a-primary  ">Inicio</a>
                <a href="buscar.php" class="a-primary ">Buscar</a>
            </div>
            <div class="flex">
                <a href="public/index.php"
                   class="mx-3  button-prymary ">Iniciar</a>
                <a href="public/vista/registroasesor/registroAsesor.php"
                   class="mx-3 button-tercery ">Registrarse</a>
            </div>
        </nav>
    <header class="flex flex-col min-h-screen bg-fondoRegistro bg-center">

        <section class="flex flex-col justify-center items-center py-7">
            <div class="max-w-screen-md">
                <img src="src/img/logo3.png" alt="">
            </div>
            <h1 class="text-6xl font-extrabold "> BienesCompartidos</h1>
            <br>
            <div class="flex ">
                <a href="public/index.php" class="button-tercery ">
                    Iniciar
                </a>
                <a href="#parte1" class="mx-2  button-prymary ">
                    Conocenos
                </a>
            </div>
           
           
        </section>


    </header>

    <section id="parte1" class="min-h-screen  bg-center  flex flex-col justify-center items-center p-4 " style="background-image:url('src/img/fondo4.png') ;">
        <article class="backdrop-blur-md bg-white/30 w-5/6 p-4  rounded-md">
           
            <article class="flex flex-col justify-center items-center ">
                <h2 class="text-5xl font-extrabold mx-4 ">
                    ¿Que somos?
                </h2>
                <p class="my-2 font-bold">Comparte y transforma vidas,
                    Compartir es el verdadero lujo
                </p>
                <div class="flex justify-center p-2">
                    <div class="w-80 flex flex-col items-center">
                        <div>
                            <img src="src/img/Group.png" alt="">
                        </div>
                        <p class="line-clamp-4 font-semibold text-center">Somos una empresa dedicada a recopilar las mejores casas de toda Villahermosa</p>
                    </div>
                    <div class="w-80 flex flex-col items-center bg-sk
                    ">
                        <div>
                            <img src="src/img/03.png" alt="">
                        </div>
                        <p class="line-clamp-4 font-semibold text-center">Nos dedicamos a brindar la mejor información según sus necesidades.
                        </p>
                    </div>
                    <div class="w-80 flex flex-col items-center">
                        <div>
                            <img src="src/img/Group3.png" alt="">
                        </div>
                        <p class="line-clamp-4 font-semibold text-center">Ofrecemos las mejores interfaces diseñadas para brindar una navegación fácil e intuitiva.</p>
                    </div>

                </div>
                <div class="flex justify-center ">
                <div class="w-80 flex flex-col items-center">
                        <div>
                            <img src="src/img/07.png" alt="">
                        </div>
                        <p class="line-clamp-4 font-semibold text-center">Tenemos a nuestra disposición las mejores empresas inmobiliarias de Villahermosa.</p>
                    </div>
                                        <div class="w-80 flex flex-col items-center">
                        <div>
                            <img src="src/img/01.png" alt="">
                        </div>
                        <p class="line-clamp-4 font-semibold text-center">Contamos con una amplia gama de servicios para garantizar una experiencia excepcional en nuestros inmuebles.</p>
                    </div>
                </div>
            </article>
        </article>
    </section>
    <section class="min-h-screen  bg-center  flex  items-center  p-4 " style="background-image:url('src/img/Desktop.png') ;">
    <main class="flex    p-2 my-5">
            <section class="flex  ">
                <!-- titulo -->
                <div class="w-96 ">
                    <h2 class="text-5xl  font-extrabold ml-11 mt-11 text-left line-clamp-3 text-gray-900 leading-10
                    ">Empieza subiendo tu inmueble.</h2>
                    <p class="ml-11 mt-4 mb-8">
                        Para poder subir un inmueble tienes que estar registrado como asesor
                    </p>
                    <p class="ml-11 mt-4 mb-8">

                    </p>
                    <a href="public/vista/registroAsesor/registroAsesor.php" class="button-prymary ml-11">Comenzar.</a>
                </div>


            </section>
        </main>

    </section>

    <section class="min-h-screen bg-fondo2 flex items-center">
        <main class=" w-3/4    p-2 my-5">
                <section class="flex  ">
                    <!-- titulo -->
                    <div class="w-fitt">
                        <h2 class="text-5xl  font-extrabold ml-11 mt-11 text-left ">
                           Entrar para comenzar a subir tus inmuebles
                        </h2>
                        <p class="ml-11 mt-4 mb-8">
                            Crea tu cuenta y agrega tu empresa para subir tus inmuebles.
                        </p>
                        <a href="public/" class="button-prymary ml-11">Comenzar.</a>
                    </div>


                </section>
            </main>
    </section>







    <footer class="flex max-w-screen bg-gray-950 p-2 items-center justify-items-center">
    <!-- Contenido del footer -->
    <div class="m-2">
        <h2 class="text-white text-base font-semibold"> © 2023 BienesCompartidos. Todos los derechos reservados.
        </h2>

    </div>
    <div class="ml-12">
        <img class="" src="src/img/icons/bienescompartidosBL.svg" alt="" width="127.78px" height="33px">
    </div>
</footer>
</body>
</html>