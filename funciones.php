<?php
session_start();

function conectar_db()
{
  $servidor = "localhost";
  $usuario_bb_dd = "root";
  $password_bb_dd = "";
  $base_datos = "agendadehoy";
  $conexion = new mysqli($servidor, $usuario_bb_dd, $password_bb_dd, $base_datos);
  return $conexion;
}

function selector_provincia($id_provincia = null)
{
  $conexion = conectar_db();
  $sql = "SELECT * FROM provincias";
  $resultado_provincias = $conexion->query($sql);
  $resultado_provincias->fetch_assoc();
?>
  <div class="input-group">
    <select class="form-select" name="id_provincia">
      <option value="todos" <?php echo $id_provincia == null ? 'selected' : '' ?>>Provincia...</option>
      <?php foreach ($resultado_provincias as $fila_provincia) { ?>
        <option value="<?php echo $fila_provincia["id_provincia"]; ?>" <?php echo $fila_provincia["id_provincia"] == $id_provincia ? 'selected' : '' ?>><?php echo $fila_provincia["nombre_provincia"]; ?></option>
      <?php } ?>
    </select>
  </div>
<?php
}

function selector_tematica($id_tematica = null)
{
  $conexion = conectar_db();
  $sql = "SELECT * FROM tematica_evento";
  $resultado_tematica = $conexion->query($sql);
  $resultado_tematica->fetch_assoc();
?>
  <div class="input-group">
    <select class="form-select" name="id_tematica">
      <option value="todos" <?php echo $id_tematica == null ? 'selected' : '' ?>>Temática...</option>
      <?php foreach ($resultado_tematica as $fila_tematica) { ?>
        <option value="<?php echo $fila_tematica["id_tematica"]; ?>" <?php echo $fila_tematica["id_tematica"] == $id_tematica ? 'selected' : '' ?>><?php echo $fila_tematica["nombre_tematica"]; ?></option>
      <?php } ?>
    </select>
  </div>
<?php
}

function selector_tipo($id_tipo = null)
{
  $conexion = conectar_db();
  $sql = "SELECT * FROM tipo_de_eventos";
  $resultado_tipo = $conexion->query($sql);
  $resultado_tipo->fetch_assoc();
?>
  <div class="input-group">
    <select class="form-select" name="id_tipo">
      <option value="todos" <?php echo $id_tipo == null ? 'selected' : '' ?>>Tipo...</option>
      <?php foreach ($resultado_tipo as $fila_tipo) { ?>
        <option value="<?php echo $fila_tipo["id_tipo"]; ?>" <?php echo $fila_tipo["id_tipo"] == $id_tipo ? 'selected' : '' ?>><?php echo $fila_tipo["nombre_tipo"]; ?></option>
      <?php } ?>
    </select>
  </div>
<?php
}

function event_card($evento, $editable = false)
{
?>
  <!-- Card -->
  <div class="card text-bg-dark mb-3 card-event<?php echo $editable === true ? ' editable' : '' ?>">
    <?php if ($editable == true) { ?>
      <div class="card-header pb-0 pt-3 d-flex justify-content-between">
        <a data-bs-toggle="modal" data-bs-target="#edit_event_<?php echo $evento["id_evento"] ?>_modal"><button class="btn btn-warning botones p-2"><i class="bi bi-pencil-fill"></i></button></a>
        <a data-bs-toggle="modal" data-bs-target="#remove_event_<?php echo $evento["id_evento"] ?>_modal"><button class="btn btn-warning botones p-2"><i class="bi bi-trash-fill"></i></button></a>
      </div>
    <?php } ?>
    <div class="card-body d-flex flex-column<?php echo $editable === true ? ' pt-1' : '' ?>">
      <h5 class="card-title p-2"><?php echo $evento["nombre_evento"] ?></h5>
      <p class="card-text p-2"><b>Modalidad:</b><br><?php echo $evento["modalidad"] ?></p>
      <p class="card-text p-2"><b>Fecha:</b><br><?php echo $evento["fecha_evento"] ?></p>
      <p class="card-text p-2"><b>Hora:</b><br><?php echo $evento["hora_evento"] ?></p>
      <p class="card-text p-2"><?php echo $evento["descripcion"] ?></p>
      <a data-bs-toggle="modal" data-bs-target="#event_<?php echo $evento["id_evento"] ?>_modal" class="btn btn-warning botones p-2"><b>Leer más</b></a>
    </div>
  </div>

  <!-- Modal (Leer más) -->
  <div class="modal fade" id="event_<?php echo $evento["id_evento"] ?>_modal" tabindex="-1" aria-labelledby="Modal <?php echo $evento["nombre_evento"] ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark">
        <div class="modal-header modal-colors">
          <h5 class="modal-title ml-2" id="signupModalLabel"><?php echo $evento["nombre_evento"] ?></h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body modal-colors">
          <div class="row mb-3">
            <div class="col-sm-6">
              <p class="card-text p-2"><b>Entidad:</b> <?php echo $evento["nombre_empresa"] ?></p>
              <p class="card-text p-2"><b>Modalidad:</b> <?php echo $evento["modalidad"] ?></p>
              <p class="card-text p-2"><b>Fecha:</b> <?php echo $evento["fecha_evento"] ?></p>
              <p class="card-text p-2"><b>Hora:</b> <?php echo $evento["hora_evento"] ?></p>
            </div>
            <div class="col-sm-6">
              <p class="card-text p-2"><b>Temática:</b> <?php echo $evento["nombre_tematica"] ?></p>
              <p class="card-text p-2"><b>Tipo:</b> <?php echo $evento["nombre_tipo"] ?></p>
              <p class="card-text p-2"><b>Provincia:</b> <?php echo $evento["nombre_provincia"] ?></p>
              <p class="card-text p-2"><b>Precio:</b> <?php echo $evento["precio"] ?></p>
            </div>
          </div>
          <p class="card-text p-2"><b>Descripción:</b> <?php echo $evento["descripcion"] ?></p>
        </div>
      </div>
    </div>
  </div>

  <?php if ($editable == true) { ?>
    <!-- Modal (remove) -->
    <div class="modal fade" id="remove_event_<?php echo $evento["id_evento"] ?>_modal" tabindex="-1" aria-labelledby="Modal <?php echo $evento["nombre_evento"] ?>" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
          <div class="modal-header modal-colors">
            <h5 class="modal-title ml-2" id="signupModalLabel">Eliminar evento</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body modal-colors">
            <p class="card-text p-2">¿Seguro que desea eliminar definitivamente el evento '<?php echo $evento["nombre_evento"] ?>'?</p>
          </div>
          <div class="modal-footer pt-0 modal-colors" style="border-top: none">
            <a class="btn btn-outline-warning mt-2" href="borrar_evento.php?id_evento=<?php echo $evento['id_evento'] ?>">Eliminar</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal (edit) -->
    <div class="modal fade" id="edit_event_<?php echo $evento["id_evento"] ?>_modal" tabindex="-1" aria-labelledby="Modal <?php echo $evento["nombre_evento"] ?>" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
          <div class="modal-header modal-colors">
            <h5 class="modal-title ml-2" id="signupModalLabel">Editar evento</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body modal-colors">
            <form class="needs-validation">
              <input type="hidden" name="id_evento" value="<?php echo $evento["id_evento"] ?>">
              <div class="form-group m-3">
                <label for="nombre_evento">Nombre de evento</label>
                <input type="text" value="<?php echo $evento["nombre_evento"] ?>" class="form-control" id="nombre_evento" name="nombre_evento" placeholder="Nombre del evento" required>
                <div class="invalid-feedback">Este campo no puede permanecer vacío</div>
              </div>
              <div class="form-group m-3">
                <label for="fecha_evento">Fecha</label>
                <input type="date" value="<?php echo $evento["fecha_evento"] ?>" id="fecha_evento" name="fecha_evento" class="form-control date" style="width:auto" required>
                <div class="invalid-feedback">Debe añadir una fecha</div>
              </div>
              <div class="form-group m-3">
                <label for="hora_evento">Hora</label>
                <input type="time" value="<?php echo $evento["hora_evento"] ?>" id="hora_evento" name="hora_evento" class="form-control time" style="width:auto">
                <div class="invalid-feedback">Debe añadir una hora de comienzo del evento</div>
              </div>
              <div class="form-group m-3 selector">
                <?php selector_provincia($evento["id_provincia"]); ?>
              </div>
              <div class="form-group m-3 selector">
                <?php selector_tematica($evento["id_tematica"]) ?>
              </div>
              <div class="form-group m-3 selector">
                <?php selector_tipo($evento["id_tipo"]) ?>
              </div>
              <div class="form-group m-3">
                <label for="descripcion">Descripción del evento</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="5" maxlength="2000"><?php echo $evento["descripcion"] ?></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer pt-0 modal-colors" style="border-top: none">
            <button class="btn btn-outline-warning mt-2" onclick="updateEvent(<?php echo $evento['id_evento'] ?>)">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
<?php
}
