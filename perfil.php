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
  <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- DateRangePicker -->
  <link href="./css/daterangepicker.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="./js/daterangepicker.js"></script>

  <link rel="stylesheet" href="./css/estilos.css">

</head>

<body>
  <!-- Header -->
  <?php include("header.php"); ?>
  <!-- Fin de header -->
  <h1 class="text-center" style="margin-top: 120px;">Mi perfil</h1>
  <h3 class="text-center mb-4">Eventos publicados</h3>
  <?php
  $conexion = conectar_db();

  $consulta = "
    SELECT E.id_evento, E.nombre_evento, E.fecha_evento, E.hora_evento, E.modalidad, E.precio, E.descripcion,
      (SELECT nombre_empresa FROM empresa WHERE id_empresa = E.id_empresa) AS nombre_empresa,
      (SELECT nombre_tipo FROM tipo_de_eventos WHERE id_tipo = E.id_tipo) AS nombre_tipo,
      (SELECT nombre_tematica FROM tematica_evento WHERE id_tematica = E.id_tematica) AS nombre_tematica,
      (SELECT nombre_provincia FROM provincias WHERE id_provincia = E.id_provincia) AS nombre_provincia
    FROM eventos E 
    WHERE E.id_empresa=" . $_SESSION["id_empresa"] . "
    ORDER BY E.fecha_evento, E.hora_evento
  ";

  $resultado_consulta = $conexion->query($consulta);

  $resultado_consulta->fetch_assoc();

  ?>
  <div id="cards_evento" class="container-events fill">
    <?php
    foreach ($resultado_consulta as $evento) {
      event_card($evento, true);
    }
    ?>
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
    function updateEvent(id_evento) {
      $.ajax({
        url: "update_event.php",
        method: "POST",
        data: $('#edit_event_' + id_evento + '_modal form').serialize(),
        beforeSend: function() {
          $('#edit_event_' + id_evento + '_modal button.btn-outline-warning').prop('disabled', true);
          $('#edit_event_' + id_evento + '_modal button.btn-outline-warning').html('Guardando...');
        },
        success: function() {
          setTimeout(() => location.reload(), 10000);
        }
      });
    }
    
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