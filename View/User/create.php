<form id="form">
    <div class="row mt-2">
        <div class="col-6">
            <label>Nombres</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="col-6">
            <label>Apellidos</label>
            <input type="text" class="form-control" name="last_name" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <label>Correo electrónico</label>
            <input type="text" class="form-control" name="email" required>
        </div>
        <div class="col-6">
            <label>Rol</label>
            <select name="rol" class="form-control">
                <option>Seleccione...</option>
                <?php
                foreach ($role as $rol) {
                    echo "<option value='" . $rol['rol_id'] . "' >" . $rol['rol_name'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" onclick="loadData('User','create')">Crear</button>
    </div>
</form>