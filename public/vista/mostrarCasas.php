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
    inm.nombre, 
    inm.precio, 
    inm.descripcion, 
    ubi.calle, 
    inm.ID_inmueble, 
    gal.img, 
    est.nombre AS estado
  FROM
    inmueble AS inm
    INNER JOIN
    ubicacion AS ubi
    ON 
      inm.ID_inmueble = ubi.fk_inmueble
    INNER JOIN
    galeria AS gal
    ON 
      inm.ID_inmueble = gal.fk_inmueble
    INNER JOIN
    caracteristicas AS car
    ON 
      inm.ID_inmueble = car.fk_inmueble
    INNER JOIN
    estadoinmuebles AS est
    ON 
      car.fk_estadoinmueble = est.ID_estadoinmuebles
  WHERE
    fk_asesor = ?
  GROUP BY
    inm.ID_inmueble";

$stmt = mysqli_prepare($conexion, $query);
mysqli_stmt_bind_param($stmt, "s", $idasesor);
mysqli_stmt_execute($stmt);
$resultados = mysqli_stmt_get_result($stmt);

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
<main class="min-h-screen w-full bg-cover bg-white bg-origin-content text-gray-700 " x-data="layout"  >
    <!-- header page -->
    <header class="flex w-full items-center justify-between  border-gray-300 bg-white p-2 z-10">
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
                    <a href="../vista/registroCasa/registroCasa.php?idasesor=<?php echo $idasesor?>"  class="transition hover:text-purple-600">Subir casa</a>
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
    <div class=" ">
        <div class=" bg-indigo-50">
            <!-- Header -->
            <header>
              <h1 class="bg-white py-4 text-center">
              <a href="/" class="text-xl font-bold text-gray-700 cursor-pointer">Catalago de casas</h1>
              </h1>
            </header>
            <section class="min-h-screen body-font text-gray-600 ">
              <div class="container  px-2 py-5">
                <!-- Espacio donde se menteran todos las targetas -->
                <div class=" flex flex-wrap ">
                    <!-- Targeta de casa -->
              <?php
              while ($columna = mysqli_fetch_assoc($resultados)) {
                echo '<figcaption class="w-full md:w-1/2 lg:w-1/4 bg-white rounded-md m-2 border">';
                echo '<a href="#" class="relative block h-48 overflow-hidden rounded">';
                echo '<img alt="ecommerce" class="block h-full w-full object-cover object-center cursor-pointer" src=" '.$columna['img'].'" />';
                echo '<p class="absolute top-0 bg-white text-morado rounded-lg m-2 text-base px-1">'.$columna['estado'].'</p>';
                echo '</a>';
                echo '<section class="mt-1 p-4">';
                echo '<h5 class="hyphens-manual text-purple-700 truncate font-bold text-lg">' . $columna['nombre'] . '</h5>';
                echo '<h5 class="hyphens-manual  truncate font-semibold">Desde</h5>';
                echo '<p class="flex hyphens-manual text-base truncate font-bold">$' . $columna['precio'] . '</p>';
                echo '<p class="flex hyphens-manual text-base truncate leading-7 tracking-tight">' . $columna['descripcion'] . '</p>';
                echo '<p class="hyphens-manual text-base truncate font-bold">' . $columna['calle'] . '</p>';
                echo '</section>';
                echo '</figcaption>';
              }
              
              
              ?>
              </div>
            </div>
            </section>

          </div>
 
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