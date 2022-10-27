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
    <h1>Política de Privacidad</h1>
    <h2>Datos personales</h2>
    Los datos de carácter personal recabados a través del presente sitio web serán tratados en todo momento de acuerdo con lo previsto en la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal (LOPD), así como en el RD 1720/2007, de 21 de diciembre, por el que se aprueba el Reglamento de desarrollo de la Ley Orgánica de Protección de Datos (RLOPD).

    También se informa que todos los datos almacenados en nuestra base de datos son administrados única y exclusivamente por Compañía de Marketing.

    <h2 class="mt-3">Finalidad de la recogida y tratamiento de datos personales</h2>
    La información que se recabe de los usuarios a través del apartado “Contacto” se utilizará con la finalidad de atender la petición de información que realice en cada caso. No obstante, sus datos no se incorporarán a ningún fichero de carácter personal a menos que la naturaleza del servicio que nos solicite así lo requiera.

    <h2 class="mt-3">Derecho de revocación</h2>
    Si el interesado desea ejercitar sus derechos de acceso, rectificación, cancelación y oposición, podrá dirigir un escrito mediante correo postal a la siguiente dirección: C/ Juan Francés Bosca, 4 – Oficina 2 – 29010 (Málaga) España o enviarnos un e-mail: info@companiademarketing.com.
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