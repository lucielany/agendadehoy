<?php
include("funciones.php");

if ($_POST) {
  $conexion = conectar_db();

  $id_evento = $_POST["id_evento"];
  $nombre_evento = $conexion->real_escape_string($_POST["nombre_evento"]);
  $fecha_evento = $_POST["fecha_evento"];
  $hora_evento = $_POST["hora_evento"];
  $id_provincia = $_POST["id_provincia"];
  $id_tematica = $_POST["id_tematica"];
  $id_tipo = $_POST["id_tipo"];
  $descripcion = $conexion->real_escape_string($_POST["descripcion"]);

  $consulta = "INSERT INTO eventos VALUES (
        nombre_evento = '$nombre_evento',
        fecha_evento = '$fecha_evento',
        hora_evento = '$hora_evento',
        id_provincia = $id_provincia,
        id_tematica = $id_tematica,
        id_tipo = $id_tipo,
        descripcion = '$descripcion')";

  $resultado_consulta = $conexion->query($consulta);
}
