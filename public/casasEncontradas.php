
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../dist/output.css" rel="stylesheet" />
  <title>Bines Compartidos</title>
  <style>
    html,
    body {
      height: 100%;
    }
  </style>
</head>

<body class="flex flex-col min-h-screen">

  <?php
  function mostrarPrecioMexicano($precio) {
    // Formatear el número con notación de miles y decimales
    $precioFormateado = number_format($precio, 2, '.', ',');

    // Agregar el símbolo de moneda y el signo de pesos
    $precioFormateado = '$ ' . $precioFormateado;

    // Devolver el precio formateado
    return $precioFormateado;
}

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    <nav class="flex flex-row p-2 max-w-screen justify-between items-center sticky top-0 bg-white z-10">
        <div class="flex ml-12 ">
            <img class="" src="src/img/icons/bienescompartidosCL.svg" alt="" width="127.78px" height="33px">
            <a href="" class="a-primary ">Inicio</a>
            <a href="#" class="a-primary ">Buscar</a>
        </div>
        <div class="flex">
            <a href="public/index.php"
                class="mx-3  button-prymary">Iniciar</a>
            <a href="public/vista/registroasesor/registroAsesor.php"
                class="mx-3 button-tercery">Registrarse</a>
        </div>
    </nav>
    <div class=" ">
        <div class=" bg-indigo-50">
            <!-- Header -->
            <header>
              <h1 class=" py-4 text-center text-4xl font-extrabold bg-gradient-to-r from-violet-500 to-purple-500 bg-clip-text text-transparent">
                Casas Encontradas
              </h1>
            </header>
            <section class="min-h-screen body-font text-gray-600 ">
              <div class="container  px-2 py-5">
                <!-- Espacio donde se menteran todos las targetas -->
                <div class=" flex flex-wrap ">
                    <!-- Targeta de casa -->
              <?php
              while ($columna = mysqli_fetch_assoc($resultados)) {
                echo '<figcaption class="w-full md:w-1/2 lg:w-1/4 bg-white rounded-md m-2">';
                echo '<a href="#" class="relative block h-48 overflow-hidden rounded">';
                echo '<img alt="ecommerce" class="block h-full w-full object-cover object-center cursor-pointer" src=" '.$columna['img'].'" />';
                echo '<p class="absolute top-0 bg-white text-morado rounded-lg m-2 text-base px-1">'.$columna['estado'].'</p>';
                echo '</a>';
                echo '<section class="mt-1 p-4">';
                echo '<h5 class="hyphens-manual text-purple-700 truncate font-bold text-lg">' . $columna['nombre'] . '</h5>';
                echo '<h5 class="hyphens-manual  truncate font-semibold">Desde</h5>';
                echo '<p class="flex hyphens-manual text-base truncate font-bold">' . mostrarPrecioMexicano($columna['precio']) . '</p>';
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