<form id="form">
    <div class="row mt-2">
        <div class="col-12">
            <label>Nombre De la Ciudad</label>
            <input type="text" class="form-control" name="name" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <label>Departamento</label>
            <select name="dep" class="form-control">
                <option>Seleccione...</option>
                <?php
                foreach ($department as $dep) {
                    echo "<option value='" . $dep['dep_id'] . "' >" . $dep['dep_name'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="loadData('City','create')">Crear</button>
    </div>
</form>