<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Buscar inmueble</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style type="text/css">@-ms-viewport {
            width: auto !important;
        }</style>
    <link href="dist/output.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }
    </style>
    <script>
        function formatCurrency(input) {
            if(input.value.length>0 && input.value[input.value.length-1] !="." && input.value[input.value.length-1] !=","){
                const value = parseLocaleNumber(input.value, "es-MX");
                const format = new Intl.NumberFormat("es-MX").format(value);
                input.value = format;
            }
        }

        function parseLocaleNumber(stringNumber, locale) {
            var thousandSeparator = Intl.NumberFormat(locale).format(11111).replace(/\p{Number}/gu, "");
            var decimalSeparator = Intl.NumberFormat(locale).format(1.1).replace(/\p{Number}/gu, "");

            return parseFloat(
                stringNumber.replace(new RegExp("\\" + thousandSeparator, "g"), "").replace(new RegExp("\\" + decimalSeparator), ".")
            );
        }
    </script>
</head>
<?php
require_once('public/Controlador/conector.php');
$query = "SELECT
      subtipodeinmueble.nombre, 
      subtipodeinmueble.ID_subtipodeinmueble
    FROM
      subtipodeinmueble";
$consulta1 = mysqli_query($conexion, $query);
$query3 = "SELECT
colonias.ID_colonias, 
colonias.nombre
FROM
colonias
";
$consulta3 = mysqli_query($conexion, $query3);
$query2 = "SELECT tipooperacion.ID_operacion,tipooperacion.nombre FROM tipooperacion";
$consulta2 = mysqli_query($conexion, $query2);

?>


<body class="flex flex-col min-h-screen">

<header class="bg-fondo bg-cover min-h-screen w-full">
    <nav class="flex flex-row p-2 max-w-screen justify-between items-center sticky top-0 bg-white z-10">
        <div class="flex ml-12 ">
            <img class="" src="src/img/icons/bienescompartidosCL.svg" alt="" width="127.78px" height="33px">
            <a href="index.php" class="a-primary ">Inicio</a>
            <a href="#" class="a-primary ">Buscar</a>
        </div>
        <div class="flex">
            <a href="public/index.php"
               class="mx-3  button-prymary">Iniciar</a>
            <a href="public/vista/registroasesor/registroAsesor.php"
               class="mx-3 button-tercery">Registrarse</a>
        </div>
    </nav>
    <section class="flex flex-col justify-center items-center ">

        <form class="backdrop-blur-sm bg-white/25  self-center w-fit p-3 m-12 rounded-md" action="public/casasEncontradas.php
            " method="post">
            <h1 class="text-4xl font-black m-5 text-center">Encuentra el hogar de tus sueños</h1>
            <div class="flex bg-white p-3 m-2 rounded-md items-center">
                <select
                    data-te-select-init
                    data-te-select-visible-options=""
                    class="h-9 py-1 m-2 focus:outline-none focus:ring-0 focus:border-morado rounded-md"
                    id="tipoInmueble"
                    name="tipoInmueble"
                    required
                >
                    <option value="" disabled selected>Tipo de inmueble</option>
                    <?php
                    foreach ($consulta1 as $tipoCasa) {
                        echo '<option value="' . $tipoCasa['ID_subtipodeinmueble'] . '">' . $tipoCasa['nombre'] . '</option>';
                    }
                    ?>
                </select>
                <select
                    data-te-select-init
                    data-te-select-visible-options=""
                    class="h-9 py-1 m-2 w-fit focus:outline-none focus:ring-0 focus:border-morado rounded-md"
                    id="Ubicacion"
                    name="Ubicacion" required
                >
                    <option value="" disabled selected>Ubicacion</option>
                    <?php
                    foreach ($consulta3 as $ubicacion) {
                        echo '<option value="' . $ubicacion['ID_colonias'] . '">' . $ubicacion['nombre'] . '</option>';
                    }
                    ?>
                </select>
                <input id="precio" name="precio"
                       class=" m-2 border w-36 text-base px-2 h-9 focus:outline-none focus:ring-0 focus:border-morado rounded-md"
                       type="text"
                       oninput="formatCantidad(this)"
                       placeholder="Precio" required/>
                <div class="">
                    <select
                        data-te-select-init
                        data-te-select-visible-options=""
                        class="h-9 py-1 m-2 focus:outline-none focus:ring-0 focus:border-morado rounded-md"
                        name="operacion"
                        required
                        id="Operacion"
                    >
                        <option value="" disabled selected>Operacion</option>
                        <?php
                        foreach ($consulta2 as $tipoOperacion) {
                            echo '<option value="' . $tipoOperacion['ID_operacion'] . '">' . $tipoOperacion['nombre'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit"
                        class="w-fit button-prymary">Buscar
                </button>
            </div>
            </form>
    </section>
</header>

<script>
    const input = document.getElementById("precio");
    input.addEventListener("input", function () {
        formatCurrency(this);
    });
</script>

</body>

</html>