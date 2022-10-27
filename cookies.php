<!-- FUNCIONES -->
<?php include("funciones.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda de Hoy</title>
  <link rel="shortcut icon" href="./img/favicon.png">
  <!-- complementos y Framework -->
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
 
  <link rel="stylesheet" href="./css/estilos.css">

</head>

<body>
  <!-- Header -->
  <?php include("header.php"); ?>
  <!-- Fin de header -->
  <br><br><br><br>
  <div class="col-xs-12 col-xl-6 text-center my-5 mx-auto fill">
    <h1>Política de Cookies</h1>
    La presente política de cookies tiene por finalidad informarle de manera clara y precisa sobre las cookies que se utilizan en la página web de Compañía de Marketing.

    <h2 class="mt-3">¿Qué son las cookies?</h2>
    Una cookie es un pequeño fragmento de texto que los sitios web que visita envían al navegador y que permite que el sitio web recuerde información sobre su visita, como su idioma preferido y otras opciones, con el fin de facilitar su próxima visita y hacer que el sitio le resulte más útil. Las cookies desempeñan un papel muy importante y contribuyen a tener una mejor experiencia de navegación para el usuario.

    <h2 class="mt-3">Tipos de cookies</h2>
    Según quién sea la entidad que gestione el dominio desde dónde se envían las cookies y se traten los datos que se obtengan, se pueden distinguir dos tipos: cookies propias y cookies de terceros.

    Existe también una segunda clasificación según el plazo de tiempo que permanecen almacenadas en el navegador del cliente, pudiendo tratarse de cookies de sesión o cookies persistentes.

    Por último, existe otra clasificación con cinco tipos de cookies según la finalidad para la que se traten los datos obtenidos: cookies técnicas, cookies de personalización, cookies de análisis, cookies publicitarias y cookies de publicidad comportamental.

    Para más información a este respecto puede consultar la Guía sobre el uso de las cookies de la Agencia Española de Protección de Datos.

    <h2 class="mt-3">Cookies utilizadas en la web</h2>
    A continuación se identifican las cookies que están siendo utilizadas en este portal así como su tipología y función:

    La página web de Compañía de Marketing utiliza Google Analytics, un servicio de analítica web desarrollada por Google, que permite la medición y análisis de la navegación en las páginas web. En su navegador podrá observar cookies de este servicio. Según la tipología anterior se trata de cookies propias, de sesión y de análisis.

    A través de la analítica web se obtiene información relativa al número de usuarios que acceden a la web, el número de páginas vistas, la frecuencia y repetición de las visitas, su duración, el navegador utilizado, el operador que presta el servicio, el idioma, el terminal que utiliza y la ciudad a la que está asignada su dirección IP. Información que posibilita un mejor y más apropiado servicio por parte de este portal.

    Para garantizar el anonimato, Google convertirá su información en anónima truncando la dirección IP antes de almacenarla, de forma que Google Analytics no se usa para localizar o recabar información personal identificable de los visitantes del sitio. Google solo podrá enviar la información recabada por Google Analytics a terceros cuanto esté legalmente obligado a ello. Con arreglo a las condiciones de prestación del servicio de Google Analytics, Google no asociará su dirección IP a ningún otro dato conservado por Google.

    <h2 class="mt-3">Aceptación de la política de cookies</h2>
    Pulsando el botón Acepto se asume que usted acepta el uso de cookies.

    <h2 class="mt-3">Cómo modificar la configuración de las cookies</h2>
    Usted puede restringir, bloquear o borrar las cookies de Compañía de Marketing o cualquier otra página web utilizando su navegador. En cada navegador la operativa es diferente, la función de “Ayuda” le mostrará cómo hacerlo.
  </div>

  <!-- Inicio del pie -->
  <?php include("footer.php"); ?>
  <!-- Fin del pie -->

  <div id="cajacookies">
    <div>
      Este sitio web usa cookies, si permanece aquí acepta su uso.
      Puede leer más sobre el uso de cookies en nuestra <a href="cookies.php">política de cookies</a>.
    </div>
    <button onclick="aceptarCookies()">Aceptar y cerrar éste mensaje</button>
  </div>

  <script type="text/javascript">
    function compruebaAceptaCookies() {
      if (window.localStorage.getItem('aceptaCookies') !== 'true') {
        $('#cajacookies').css('display', 'flex');
      }
    }

    function aceptarCookies() {
      window.localStorage.setItem('aceptaCookies', 'true');
      $('#cajacookies').css('display', 'none');
    }

    $(document).ready(function() {
      compruebaAceptaCookies();
    });
  </script>

</body>

</html>