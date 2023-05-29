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
session_start();
require_once ('../../Controlador/conector.php');
$query="SELECT
      estadoinmuebles.ID_estadoinmuebles, 
      estadoinmuebles.nombre
  FROM
      estadoinmuebles";
$consulta1 = mysqli_query($conexion,$query);





?>
<body class="flex flex-col min-h-screen bg-fondoRegistro bg-cover bg-center bg-scale-75">

<main class="flex-grow">
    <!-- Contenido principal de la página -->
    <section class="flex h-fit text-left  p-2 my-5">
        <aside class="flex flex-col p-3.5 m-2 w-80 h-fit rounde rounded-xl border border-gray-950 bg-white  ">
            <h3 class="text-center font-semibold text-2xl my-3">Principales</h3>
            <button disabled
                    class="text-left px-2 py-1 mt-2 rounded font-semibold rounde-md  bg-purple-50/40 text-purple-700/40 border-2 border-purple-700/40 ">Operación
                y tipo de inmueble</button>
            <button
                class="text-left px-2 py-1 mt-2 rounded font-semibold rounde-md  bg-purple-100 text-purple-700 border-2 border-purple-700">Ubicación
            </button>
            <button disabled
                    class="text-left px-2 py-1 mt-2 rounded font-semibold rounde-md  bg-purple-50/40 text-purple-700/40 border-2 border-purple-700/40 mb-6">Características</button>
        </aside>

        <form class=" bg-gray-200 rounded-md px-1 w-10/12 container mx-auto" action="guardardatos3.php" method="post">
            <article class="w-full bg-white mt-3 rounded-md p-4">
                <div class="px-2">
                    <h1 class="text-3xl font-extrabold ">!Hola, comencemos a crear tu aviso¡ </h1>
                    <hr class="border-gray-900  mt-2">
                </div>

                <h2 class="mt-6 font-bold text-2xl px-2">Características principales</h2>

                <div class="flex  px-2 mt-3"">
                <div class=" mt-3 px-2">
                    <label for="noNivelesCasa" class="block text-base mb-2 font-bold">Niveles de la casa</label>
                    <input type="number"  id="noNivelesCasa" name="noNivelesCasa" class="w-40 input-prymary"
                           placeholder="0" required />
                </div>
                <div class=" mt-3 px-2">
                    <label for="recamaras" class="block text-base mb-2 font-bold">Recamaras</label>
                    <input type="number" id="recamaras" name="recamaras" class="w-40 input-prymary"
                           placeholder="0" required />
                </div>
                <div class="mt-3 px-2">
                    <label for="banos" class="block text-base mb-2 font-bold">Baños</label>
                    <input type="number" id="banos" name="banos" class="w-40 input-prymary" placeholder="0" required />
                </div>
                </div>
                <div class="flex  px-2 mt-3"">
                <div class=" mt-3 px-2">
                    <label for="estacionamiento" class="block text-base mb-2 font-bold">Estacionamiento</label>
                    <input type="number" id="estacionamiento" name="estacionamiento" class="w-40 input-prymary"
                           placeholder="0" required/>
                </div>
                </div>
                <h2 class="mt-2 font-bold text-xl px-2">Superficie</h2>

                <div class="flex  px-2 ">
                    <div class="mt-3 px-2">
                        <label for="superficieConstruida" class="block text-base mb-2 font-bold">Superficie Construida</label>
                        <input type="number" id="superficieConstruida" name="superficieConstruida" class="w-40 input-prymary" 
                               placeholder="0" required/>
                    </div>
                    <div class="mt-3 px-2">
                        <label for="superficieTerrestre" class="block text-base mb-2 font-bold">Superficie Terrestre</label>
                        <input required type="number" id="superficieTerrestre" name="superficieTerrestre" class="w-40 input-prymary" placeholder="0" />
                    </div>
                </div>
                <p class="text-slate-500 text-xs">La superficie tiene que ser ingresada en metros cuadrados</p>
                <h2 class="mt-2 font-bold text-xl px-2">Antiguedad</h2>
                <div class="flex flex-col px-2 mx-2 w-60">
                    <select data-te-select-init data-te-select-visible-options="3" id="colonia"
                            class="h-9 py-1 m-2 focus:outline-none focus:ring-0 focus:border-morado rounded-md"
                            id="Antiguedad" name="antiguedad" required>
                        <option class="" disabled selected>Selecione una opcion</option>
                        <?php
                        foreach ($consulta1 as $Antiguedad) {
                            echo '<option value="' . $Antiguedad['ID_estadoinmuebles'] . '">' . $Antiguedad['nombre'] . '</option>';
                        }
                        ?>ion>
                    </select>

                </div>
                <h2 class="mt-2 font-bold text-xl px-2">Precio</h2>
                <div class="mt-1 px-2 mx-2">
                    <label for="precio" class="block text-base mb-2 font-bold text-gray-500">Precio del
                        inmueble</label>
                    <input type="text" id="precio" name="precio" class="w-40 input-prymary" placeholder="0" required/>
                </div>
        <p class="text-slate-500 text-xs">El precio tiene que ser correspondiente a la moneda actual(pesos Méxicanos)</p>

                <h2 class="mt-2 font-bold text-xl px-2">Describe el inmueble</h2>
                <div class="mt-1 px-2 mx-2">
                    <label for="nombreinmueble" class="block text-base mb-2 font-bold text-gray-500">Titulo del
                        inmueble</label>
                    <input type="text" id="nombreinmueble" name="nombreinmueble"
                           class="  border w-80 text-base px-2 py-1  focus:outline-none focus:ring-0 focus:border-morado rounded-md"
                           placeholder="titulo.."  required />
                </div>

                <div class="mt-3 px-2 mx-2">
                    <label for="descripciónInmueble" class="block text-base mb-2">Descripción del inmueble</label>
                    <textarea name="descripciónInmueble" id="descripciónInmueble" cols="30" rows="5"
                           maxlength="700px" required placeholder="Descripción Inmueble"
                          class="border resize-x w-80  text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-morado rounded-md"></textarea>

                </div>
            </article>

            <!-- Botones de confirmacion -->
            <div class="flex justify-between m-3">
                <button class="button-orange" onclick="history.back()">Regresar</button>
                <div>
                    <a href="../panelAsesor.php?idasesor=<?php echo $_SESSION['idasesor']?>" class="button-danger mx-3">Salir</a>
                    <button class="button-secundary" type="submit">Continuar</button>
                </div>
            </div>
        </form>
    </section>
</main>

<footer class="flex max-w-screen bg-gray-950 p-2 items-center justify-items-center">
    <!-- Contenido del footer -->
    <section class="m-2">
        <h2 class="text-white text-base font-semibold"> © 2023 BienesCompartidos. Todos los derechos reservados.
        </h2>

    </section>
    <div class="ml-12">
        <img src="../../../src/img/icons/bienescompartidosBL.svg" alt="BienesCompartidos" width="135px">
    </div>
</footer>

<script>
    const input = document.getElementById("precio");
    input.addEventListener("input", function () {
        formatCurrency(this);
    });
</script>
</body>

</html>