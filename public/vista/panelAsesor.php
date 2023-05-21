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
    $query="SELECT
	inmobiliarias.nombreEmpresa, 
	inmobiliarias.ubicacion, 
	inmobiliarias.descripcion, 
	inmobiliarias.telefono, 
	inmobiliarias.logo, 
	inmobiliarias.RPC, 
	inmobiliarias.correo, 
	CONCAT(asesor.nombre,' ',asesor.ape_paterno, ' ',asesor.ape_materno ) as nombre,
	asesor.telefono AS telefonoempresa, 
	asesor.correo as correoEmpresa,
  asesor.CURP
FROM
	asesor
	INNER JOIN
	inmobiliarias
	ON 
		asesor.ID_asesor = inmobiliarias.fk_asesor
	WHERE ID_asesor='$idasesor'";
    $resultados= mysqli_query($conexion, $query);

    $columna=mysqli_fetch_assoc($resultados);
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
                    <a href="registroCasa/registroCasa.php" class="transition hover:text-purple-600">Subir casa</a>
                    <a href="" class="transition hover:text-purple-600">Mostrar catalogo</a>
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
          <div class="bg-white rounded-xl p-4 mt-4">
            <h2 class="text-3xl font-extrabold">
              Datos de la inmobiliaria
            </h2>
            <hr class="border-gray-800">
        </div>
        <article class="mt-2 bg-white rounded-md shadow-md">
            <div class="flex items-center justify-center ">
                <img src=" <?php  echo $columna['logo']      ?>" width="150px" height="150px">
            </div>
            <div class="flex mt-4">
              <div class="mx-2">
                <h3 class="text-md font-bold">Nombre de la empresa</h3>
                <p>
                  <?php  echo $columna['nombreEmpresa']      ?>
                </p>
              </div>
              

            </div>
            <div class="mx-2">
                <h3 class="text-md font-bold">ubicacion</h3>
                <p>
                  <?php  echo $columna['ubicacion']      ?>
                </p>
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
                <h3 class="text-md font-bold">Correo</h3>
                <p>
                  <?php  echo $columna['correoEmpresa']      ?>
                </p>
              </div>
            </div>
            <div class="mx-2">
                <h3 class="text-md font-bold">RPC</h3>
                <p>
                  <?php  echo $columna['RPC']      ?>
                </p>
              </div>
          </article>
 
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