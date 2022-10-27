<!-- Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header modal-colors">
        <h5 class="modal-title ml-2" id="signupModalLabel">Añadir Evento</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal-colors">
        <div class="col-9">
          <section class="add_event">
            <form action="add_event.php" method="POST" class="needs-validation">
              <div class="form-group m-3">
                <label for="nombre_evento">Nombre de evento</label>
                <input type="text" class="form-control" id="nombre_evento" name="nombre_evento" placeholder="Nombre del evento" required>
                <div class="invalid-feedback">Este campo no puede permanecer vacío</div>
              </div>
              <div class="form-group m-3">
                <select class="form-select" name="modalidad" id="modalidad">
                  <option value="todos">Modalidad...</option>
                  <option value="online">Online</option>
                  <option value="presencial">Presencial</option>
                </select>
             </div>
              <div class="form-group m-3">
                <label for="hora_evento">Hora</label>
                <input type="time" id="hora_evento" name="hora_evento" class="form-control time" style="width:auto">
                <div class="invalid-feedback">Debe añadir una hora de comienzo del evento</div>
              </div>
              <div class="form-group m-3">
                <label for="fecha_evento">Fecha</label>
                <input type="date" id="fecha_evento" name="fecha_evento" class="form-control date" style="width:auto" required>
                <div class="invalid-feedback">Debe añadir una fecha</div>
              </div>
              <div class="form-group m-3">
                <label for="hora_evento">Hora</label>
                <input type="time" id="hora_evento" name="hora_evento" class="form-control time" style="width:auto">
                <div class="invalid-feedback">Debe añadir una hora de comienzo del evento</div>
              </div>
              <div class="form-group m-3 selector">
                <?php selector_provincia(); ?>
              </div>
              <div class="form-group m-3 selector">
                <?php selector_tematica() ?>
              </div>
              <div class="form-group m-3 selector">
                <?php selector_tipo() ?>
              </div>
              <div class="form-group m-3">
                <label for="descripcion">Descripción del evento</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="5" maxlength="2000"></textarea>
              </div>
              <div class="form-group m-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox">
                  <label class="form-check-label" for="checkbox">
                    Quiero promocionar el evento
                  </label>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
      <div class="modal-footer pt-0 modal-colors" style="border-top: none">
        <button class="btn btn-outline-warning mt-2" onclick="addEvent()">Añadir evento</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function addEvent() {
    $.ajax({
      url: "add_event.php",
      method: "POST",
      data: $('#addEventModal form').serialize(),
      beforeSend: function() {
        $('#addEventModal button.btn-outline-warning').prop('disabled', true);
        $('#addEventModal button.btn-outline-warning').html('Añadiendo...');
      },
      success: function() {
        setTimeout(() => location.reload(), 1000);
      }
    });
  }
</script>