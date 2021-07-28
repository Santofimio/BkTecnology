<form id="form">
    <div class="row mt-2">
        <div class="col-6">
            <label>Nombres</label>
            <input type="hidden" class="form-control" name="id" value="<?php echo $u['user_id']; ?>">
            <input type="text" class="form-control" name="name" value="<?php echo $u['user_name']; ?>" required>
        </div>
        <div class="col-6">
            <label>Apellidos</label>
            <input type="text" class="form-control" name="last_name" value="<?php echo $u['user_last_name']; ?>" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <label>Correo electrónico</label>
            <input type="text" class="form-control" name="email" value="<?php echo $u['user_email']; ?>" required>
        </div>
        <div class="col-6">
            <label>Rol</label>
            <select name="rol" class="form-control">
                <option>Seleccione...</option>
                <?php
                foreach ($role as $rol) {
                    if ($u['rol_id'] == $rol['rol_id']) {
                        echo "<option value='" . $rol['rol_id'] . "'selected >" . $rol['rol_name'] . "</option>";
                    } else {
                        echo "<option value='" . $rol['rol_id'] . "' >" . $rol['rol_name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="loadData('User','update')">Crear</button>
    </div>
</form>