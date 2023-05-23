<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>
    <title>Login</title>


</head>
<body class="flex flex-col min-h-screen">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- Encabezado de la pagina -->
<nav class="flex flex-row p-1 max-w-screen justify-between items-center ">
<div class="flex ml-12 ">
            <img class="" src="../src/img/icons/bienescompartidosCL.svg" alt="" width="127.78px" height="33px">
            <a href="" class="a-primary ">Inicio</a>
            <a href="../buscar.php" class="a-primary ">Buscar</a>
        </div>
        <div class="flex">
            
        </div>
</nav>

<main class="flex flex-grow bg-cover bg-center " style="background-image:url(../src/img/fondovilaher.jpg) ;">

    <!-- login de Bienes Compartidos para hacesor -->
    <article id="devblog" class=" bg-cover bg-center rounded-r-lg   flex flex-initial w-4/6 "
             >
        <figcaption class="flex items-stretch  px-2 py-5  w-full ">
            <blockquote class=" rounded-lg max-w-full h-fit  p-2 m-2 self-end  bg-stone-50 shadow-2xl w-full">
                <h2 class="text-2xl font-extrabold  p-2">Bienes Compartidos</h2>
                <hr class="border-slate-600/20 pl-2 ">
                <!-- <p class=" text-sm  text-slate-900 pl-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet saepe, molestiae ea obcaecati ab dolore fugit explicabo aspernatur doloribus nemo. A sequi corrupti earum, enim harum quas quod dolor. Molestiae.</p> -->
            </blockquote>
        </figcaption>
    </article>


    <section class=" flex flex-auto justify-center items-center   "
             style="background-image:url('../../img/wave.svg') ;">
        <form action="validar.php" method="post" class="flex  h-fit w-80 select-none">
            <div class="w-96 p-6 shadow-lg bg-stone-50 rounded-md   ">
                <div class="flex justify-center items-center ">
                    <div class=" h-14 w-14 p-3 text-center   shadow-lg text-3xl text-white rounded-full bg-purple-700 ">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <h1 class="text-4xl block text-center font-bold"></i> Login</h1>
                <hr class="mt-3">
                <div class="mt-3">
                    <label for="username" class="block text-base mb-2">Usuario</label>
                    <input type="text" id="username" name="username" class="  input-prymary w-full"
                           placeholder="Usuario..."/>
                </div>
                <div class="mt-3">
                    <label for="password" class="block text-base mb-2">Contraseña</label>
                    <input type="password" id="password" name="password" class="input-prymary w-full"
                           placeholder="Contraseña..."/>
                </div>


                <div class="mt-5">
                    <button type="submit" class="button-prymary w-full">Iniciar</button>
                </div>
                <a href="vista/registroasesor/registroAsesor.php" class="a-primary">Registrarse</a>

            </div>

        </form>

    </section>
</main>

</body>
</html>