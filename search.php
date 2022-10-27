<?php
include("funciones.php");

if ($_POST) {
  $id_provincia = $_POST["id_provincia"];
  $fecha_inicio = $_POST["fecha_inicio"];
  $fecha_fin = $_POST["fecha_fin"];
  $id_tematica = $_POST["id_tematica"];
  $modalidad = $_POST["modalidad"];

  $conexion = conectar_db();

  $where_array = array();
  if ($id_provincia !== "todos") {
    array_push($where_array, "E.id_provincia = '$id_provincia'");
  }
  if ($id_tematica !== "todos") {
    array_push($where_array, "E.id_tematica = '$id_tematica'");
  }
  if ($modalidad !== "todos") {
    array_push($where_array, "E.modalidad = '$modalidad'");
  }
  if ($fecha_inicio !== "" && $fecha_fin !== "") {
    array_push($where_array, "E.fecha_evento BETWEEN '$fecha_inicio' AND '$fecha_fin'");
  }

  $consulta = "
    SELECT E.id_evento, E.nombre_evento, E.fecha_evento, E.hora_evento, E.modalidad, E.precio, E.descripcion,
      (SELECT nombre_empresa FROM empresa WHERE id_empresa = E.id_empresa) AS nombre_empresa,
      (SELECT nombre_tipo FROM tipo_de_eventos WHERE id_tipo = E.id_tipo) AS nombre_tipo,
      (SELECT nombre_tematica FROM tematica_evento WHERE id_tematica = E.id_tematica) AS nombre_tematica,
      (SELECT nombre_provincia FROM provincias WHERE id_provincia = E.id_provincia) AS nombre_provincia
    FROM eventos E"
    . (count($where_array) > 0 ? ' WHERE ' . implode(' AND ', $where_array) : '')
    . " ORDER BY E.fecha_evento, E.hora_evento
  ";

  $resultado = $conexion->query($consulta);

  $resultado->fetch_assoc();

  foreach ($resultado as $evento) {
    event_card($evento);
  }
}
