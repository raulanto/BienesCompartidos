<?php     
    session_start();
    if(!$_SESSION['logueado']==true){
        header("Location: ../login.php");
    } 

?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../../dist/output.css" rel="stylesheet" />
  <title>Panel Asesor</title>
  <style>
    html,
    body {
      height: 100%;
    }
  </style>
</head>

<body class="flex flex-col min-h-screen">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // La solicitud se realizó mediante el método GET
    // Aquí puedes procesar los parámetros recibidos y realizar las validaciones necesarias
    $idasesor = $_GET['idasesor'];
    require_once ('../Controlador/conector.php');
    $query="SELECT
   	CONCAT(asesor.nombre,' ',asesor.ape_paterno, ' ',asesor.ape_materno ) as nombre,
    asesor.telefono, 
    asesor.correo, 
    inmobiliarias.nombreEmpresa, 
    inmobiliarias.ubicacion, 
    inmobiliarias.descripcion, 
    inmobiliarias.telefono AS telefonoempresa, 
    inmobiliarias.RPC, 
    asesor.ID_asesor,
    asesor.CURP
  FROM
    asesor
    INNER JOIN
    inmobiliarias
    ON 
      asesor.fk_inmobiliaria = inmobiliarias.ID_inmobiliarias
  WHERE
  asesor.ID_asesor = '$idasesor'";
    $resultados= mysqli_query($conexion, $query);


    // Validar y procesar los parámetros recibidos
    // ...

    // Continuar con tu lógica de negocio
    // ...
} else {
    // La solicitud no se realizó mediante el método GET
    // Puedes mostrar un mensaje de error o redirigir a otra página
    echo "Error: La solicitud debe realizarse mediante el método GET.";
}

?>



  <main class="flex-grow">
    <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
      <div @click.away="open = false"
        class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0"
        x-data="{ open: false }">
        <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
          <a href="#"
            class="text-lg font-semibold  text-gray-900  rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">BienesCompartidos</a>
          <button class="rounded-lg md:hidden  focus:outline-none focus:shadow-outline" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
              <path x-show="!open" fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                clip-rule="evenodd"></path>
              <path x-show="open" fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
            </svg>
          </button>
        </div>
        <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
          <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-purple-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-purple-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            href="#">informacion</a>
          <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-purple-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            href="#">Mostrar casas</a>
          <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-purple-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            href="registroCasa/registroCasa.php">Subir casa</a>
          <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-red-100 rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-red-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            href="../close.php">salir</a>

        </nav>
      </div>
      <div class="flex flex-col w-full  bg-gray-200">
        <?php
                $columna = mysqli_fetch_array($resultados);
              
              ?>
        <section class=" w-full container mx-auto">
          <h2 class="text-4xl font-extrabold mt-6 mx-4">Datos usuario</h2>
          <article class="mx-4 mt-6 bg-white rounded-md shadow-md">
            <div class="flex mt-4">
              <div class="mx-2">
                <h3 class="text-md font-bold">Nombre</h3>
                <p>
                  <?php  echo $columna['nombre']      ?>
                </p>
              </div>
              <div class="mx-2">
                <h3 class="text-md font-bold">Telefono</h3>
                <p>
                  <?php  echo $columna['telefono']      ?>
                </p>
              </div>
              <div class="mx-2">
                <h3 class="text-md font-bold">Correo</h3>
                <p>
                  <?php  echo $columna['correo']      ?>
                </p>
              </div>
            </div>
            <div class="flex">
              <div class="mx-2">
                <h3 class="text-md font-bold">CURP</h3>
                <p>
                  <?php  echo $columna['CURP']      ?>
                </p>
              </div>

            </div>
          </article>
        </section>
        <section class="  w-full container mx-auto">
          <h2 class="text-4xl font-extrabold mt-6 mx-4">Datos inmobiliaria</h2>
          <article class="mx-4 mt-6 bg-white rounded-md shadow-md">
            <div class="flex mt-4">
              <div class="mx-2">
                <h3 class="text-md font-bold">Nombre de la empresa</h3>
                <p>
                  <?php  echo $columna['nombreEmpresa']      ?>
                </p>
              </div>
              <div class="mx-2">
                <h3 class="text-md font-bold">ubicacion</h3>
                <p>
                  <?php  echo $columna['ubicacion']      ?>
                </p>
              </div>

            </div>
            <div class="mx-2">
              <h3 class="text-md font-bold">Descripcion</h3>
              <p>
                <?php  echo $columna['descripcion']      ?>
              </p>
            </div>
            <div class="flex">
              <div class="mx-2">
                <h3 class="text-md font-bold">telefono</h3>
                <p>
                  <?php  echo $columna['telefonoempresa']      ?>
                </p>
              </div>
              <div class="mx-2">
                <h3 class="text-md font-bold">RPC</h3>
                <p>
                  <?php  echo $columna['RPC']      ?>
                </p>
              </div>


            </div>
          </article>
        </section>
      </div>
    </div>
  </main>
</body>

</html>