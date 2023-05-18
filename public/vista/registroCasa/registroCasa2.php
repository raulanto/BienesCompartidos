<?php     
    // session_start();
    // if(!$_SESSION['logueado']==true){
    //     header("Location: ../login.php");
    // } 

?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- hoja de estilos -->

    <link href="../../../dist/output.css" rel="stylesheet">

    <title>Registro usuario</title>
    <style>
      html,
      body {
        height: 100%;
      }
    </style>
  </head>
<?php
  		require_once ('../../Controlador/conector.php');
      $query="SELECT
      subtipodeinmueble.nombre, 
      subtipodeinmueble.ID_subtipodeinmueble
    FROM
      subtipodeinmueble";
      $consulta1 = mysqli_query($conexion,$query);
      
      $query2="SELECT tipooperacion.ID_operacion,tipooperacion.nombre FROM tipooperacion";
      $consulta2 = mysqli_query($conexion,$query2);




?>
  <body
    class="flex flex-col  bg-fondoRegistro bg-cover bg-center bg-scale-75"
  >
    <nav class="flex flex-row p-1 max-w-screen justify-between items-center ">
      <!-- Contenido de la barra de navegación -->
      <div class="flex ml-12 ">
      <img class="" src="../../../src/img/icons/bienescompartidosCL.svg" alt="" width="127.78px" height="33px">

        <a href="" class="a-primary text-morado">Inicio</a>
        <a href="" class="a-primary ">Inicio</a>
        <a href="" class="a-primary ">Inicio</a>
        <a href="" class="a-primary ">Inicio</a>
      </div>
    </nav>
    <main class="flex-grow">
      <!-- Contenido principal de la página -->
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
            class="text-left px-2 py-1 mt-2 rounded font-semibold rounde-md  bg-purple-50/40 text-purple-700/40 border-2 border-purple-700/40 mb-6"
          >
            Características
          </button>
        </aside>

        <form
          class=" bg-gray-200 rounded-md px-1 w-10/12 container mx-auto"
          action="guardardatos1.php"
          method="post"
        >
          <article class="w-full bg-white mt-3 rounded-md p-4">
            <div class="px-2">
              <h1 class="text-3xl font-extrabold ">
                !Hola, comencemos a crear tu aviso¡
              </h1>
              <hr class="border-gray-900  mt-2" />
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
               <option value="0" >Selecione una opcion</option>
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
                  <option class="">Selecione una opcion</option>
                  <?php
                    foreach ($consulta1 as $tipoCasa) {
                      echo '<option value="' . $tipoCasa['ID_subtipodeinmueble'] . '">' . $tipoCasa['nombre'] . '</option>';
                    }
                  ?>
                </select>
                <div class="px-2 mt-3">
                  <label for="username" class="block font-bold">Cantidad </label>
                  <input type="number" id="cantidad" name="cantidad" class="m-2  input-prymary w-full" placeholder="Cantidad..." />
              </div>
              </div>
              
            </div>
          </article>
          <!-- Botones de confirmacion -->
          <div class="flex justify-between m-3">
            <button class="button-orange">Regresar</button>
            <div>
              <button class="button-danger mx-3">Salir</button>
              <button class="button-secundary" type="submit">Continuar</button>
            </div>
          </div>
        </form>
      </section>
    </main>

    <!-- footer -->
    <footer
      class="flex max-w-screen bg-gray-950 p-2 items-center justify-items-center"
    >
      <!-- Contenido del footer -->
      <section class="m-2">
        <h2 class="text-white text-base font-semibold">
          © 2023 BienesCompartidos. Todos los derechos reservados.
        </h2>
      </section>
      <div class="ml-12">
      <img class="" src="../../../src/img/icons/bienescompartidosBL.svg" alt="" width="127.78px" height="33px">

      </div>
    </footer>
  </body>
</html>
