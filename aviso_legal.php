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
    <h1>Aviso Legal</h1>
    En cumplimiento de lo previsto en el artículo 10 de la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y Comercio Electrónico (LSSICE) informamos a los usuarios que el presente sitio web es titularidad de la empresa:

    Titular: D. Álvaro Castro Espejo (Agenda De Hoy)
    CIF: 25666776H

    Puede contactar con nosotros a través de nuestro formulario o bien, utilizando nuestros datos.

    Dirección: C/ Juan Francés Bosca, 4 – Oficina 2 – 29010 (Málaga) España
    E-mail: info@companiademarketing.com

    <h2 class="mt-3">Utilización del sitio web</h2>
    A través del presente sitio web ofrecemos información a los usuarios sobre los servicios de asesoramiento a nuestros clientes sobre los servicios de Compañía de Marketing. Este sitio web es único y exclusivamente para uso personal de los usuarios, y se prohíbe su modificación, reproducción, duplicación, copia, distribución, venta, reventa y demás formas de explotación con fines comerciales.

    <h2 class="mt-3">Derechos de propiedad intelectual y propiedad industrial</h2>
    Tanto el diseño del Portal y sus códigos fuente, como los logos, marcas, dibujos, modelos y demás signos distintivos que aparecen en el mismo, pertenecen al titular del sitio web o entidades colaboradoras y están protegidos por los correspondientes derechos de propiedad intelectual e industrial. Su uso, reproducción, distribución, comunicación pública, puesta a disposición, transformación o cualquier otra actividad similar o análoga queda prohibida, salvo que medie expresa autorización del titular del sitio web.
    Las fotografías utilizadas y que aparecen en este sitio web son propias o de terceros libres de uso, siendo el origen de las mismas www.pixabay.com y www.freepix.es

    <h2 class="mt-3">Vínculos a sitios web de terceros</h2>
    Con objeto de mostrar al usuario otra información o servicios de interés, podremos incluir en el presente sitio web hipervínculos directos a otras páginas web, no relacionadas ni mantenidas por nosotros. Las páginas web de destino son totalmente independientes y de ninguna forma la redirección a dichas páginas debe interpretarse como un respaldo, recomendación, representación o garantía de dichos sitio webs o entidades, ni de sus respectivos productos, servicios, información, materiales, opiniones o enlaces que contengan y redirijan a otros sitio webs.

    La navegación e interacción en cualquier otro sitio web, incluidos aquellos que estén enlazados con nuestro sitio web, está sujeta a las normas y políticas de dicho sitio. No obstante, en el caso de que tengamos conocimiento efectivo de la existencia de contenidos ilícitos en los sitios web enlazados desde el nuestro, procederemos de manera inmediata a eliminar el enlace a dichos contenidos, y a poner este hecho en conocimiento de las autoridades competentes.

    <h2 class="mt-3">Modificaciones del Aviso legal</h2>
    Nos reservamos el derecho de modificar el presente Aviso Legal como consecuencia de cambios legislativos, jurisprudenciales o por modificaciones de nuestros contenidos. Si introducimos alguna modificación, el nuevo texto será publicado en esta misma página, donde el usuario podrá consultar el contenido.
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