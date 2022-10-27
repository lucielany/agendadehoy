<?php
include("funciones.php");

$conexion = conectar_db();

$buscador = $_GET["buscador"];

if ($buscador === "") {
  $consulta = "
    SELECT E.id_evento, E.nombre_evento, E.fecha_evento, E.hora_evento, E.modalidad, E.precio, E.descripcion,
      (SELECT nombre_empresa FROM empresa WHERE id_empresa = E.id_empresa) AS nombre_empresa,
      (SELECT nombre_tipo FROM tipo_de_eventos WHERE id_tipo = E.id_tipo) AS nombre_tipo,
      (SELECT nombre_tematica FROM tematica_evento WHERE id_tematica = E.id_tematica) AS nombre_tematica,
      (SELECT nombre_provincia FROM provincias WHERE id_provincia = E.id_provincia) AS nombre_provincia
    FROM eventos E
    ORDER BY E.fecha_evento, E.hora_evento
  ";
} else {
  $consulta = "
    SELECT E.id_evento, E.nombre_evento, E.fecha_evento, E.hora_evento, E.modalidad, E.precio, E.descripcion,
      (SELECT nombre_empresa FROM empresa WHERE id_empresa = E.id_empresa) AS nombre_empresa,
      (SELECT nombre_tipo FROM tipo_de_eventos WHERE id_tipo = E.id_tipo) AS nombre_tipo,
      (SELECT nombre_tematica FROM tematica_evento WHERE id_tematica = E.id_tematica) AS nombre_tematica,
      (SELECT nombre_provincia FROM provincias WHERE id_provincia = E.id_provincia) AS nombre_provincia
    FROM eventos E
    WHERE E.nombre_evento LIKE '%{$buscador}%'
    ORDER BY E.fecha_evento, E.hora_evento
  ";
}

$resultado_consulta = $conexion->query($consulta);

$resultado_consulta->fetch_assoc();

foreach ($resultado_consulta as $evento) {
  event_card($evento);
}
