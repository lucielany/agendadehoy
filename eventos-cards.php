<!-- Buscador -->
<input type="text" id="buscador" name="buscador" onkeyup="buscarTexto()" class="m-4 form-control form-control-dark text-bg-dark" placeholder="Buscar nombre de evento" aria-label="Search" style="width: fit-content">

<div id="ancla_eventos"></div>
<?php
$conexion = conectar_db();

$consulta = "
  SELECT E.id_evento, E.nombre_evento, E.fecha_evento, E.hora_evento, E.modalidad, E.precio, E.descripcion,
    (SELECT nombre_empresa FROM empresa WHERE id_empresa = E.id_empresa) AS nombre_empresa,
    (SELECT nombre_tipo FROM tipo_de_eventos WHERE id_tipo = E.id_tipo) AS nombre_tipo,
    (SELECT nombre_tematica FROM tematica_evento WHERE id_tematica = E.id_tematica) AS nombre_tematica,
    (SELECT nombre_provincia FROM provincias WHERE id_provincia = E.id_provincia) AS nombre_provincia
  FROM eventos E
  ORDER BY E.fecha_evento, E.hora_evento
";

$resultado_consulta = $conexion->query($consulta);

$resultado_consulta->fetch_assoc();

?>
<div id="cards_evento" class="container-events">
    <?php
    foreach ($resultado_consulta as $evento) {
        event_card($evento);
    }
    ?>
</div>

<!--  Añadir evento-->
<div class="d-flex flex-column my-5 align-items-center gap-4 botones">
    <h3>¿No encuentras el evento de tu empresa?</h3>
    <a href="<?php echo isset($_SESSION["nombre_empresa"]) ? 'add-event-modal.php' : 'login.php' ?>" data-bs-toggle="modal" data-bs-target="#<?php echo isset($_SESSION["nombre_empresa"]) ? 'addEventModal' : 'loginModal' ?>">
        <button type="button" class="btn btn-warning">Añádelo</button>
    </a>
</div>

<!--  Entidades colaboradoras-->
<section class="container_partner">
    <div class="d-flex flex-column my-4 align-items-center gap-4 botones">
        <h3>Entidades colaboradoras</h3>
    </div>
    <div class="logos_companias d-flex m-3">
        <div class="col-4 d-block m-auto">
            <img src="./img/companiademarketing.png" alt="companiademarketing" title="companiademarketing">
        </div>
        <div class="col-4 d-block  m-auto">
            <img src="./img/escueladeventasalmeria.png" alt="escueladeventasalmeria" title="escueladeventasalmeria">
        </div>
        <div class="col-4 d-block  m-auto">
           <img src="./img/escueladeventasandalucia.png" alt="escueladeventasandalucia" title="escueladeventasandalucia">
        </div>
    </div>
</section>


<script type="text/javascript">
    function buscarTexto() {
        const buscador = document.getElementById("buscador").value;
        var ajax_url = "./buscador.php"; //ruta del archivo que será lanzado
        var ajax_request = new XMLHttpRequest(); //clase. creo un objeto de esa clase

        // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
        ajax_request.onreadystatechange = function() { //cuando cambie de estado, salta una funcion que mira  el estado de conexion
            // si el readyState es 4, proseguir
            if (ajax_request.readyState == 4) {

                // Analizaos el responseText que contendrá el JSON enviado desde el servidor
                var response = ajax_request.responseText;
                document.getElementById("cards_evento").innerHTML = response;
            }
        }

        // Definimos como queremos realizar la comunicación
        ajax_request.open("GET", ajax_url + "?buscador=" + buscador);

        //Enviamos la solictud con los parámetros que habíamos definido
        ajax_request.send();
    }
</script>