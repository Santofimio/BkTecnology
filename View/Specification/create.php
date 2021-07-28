<form id="form">
    <div class="row mt-2">
        <div class="col-12">
            <label>Nombre De la Especificacion</label>
            <input type="text" class="form-control" name="name" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <label>Tipo Especificacion</label>
            <select name="spe_tip" class="form-control">
                <option>Seleccione...</option>
                <?php
                foreach ($specificationType as $spe_tip) {
                    echo "<option value='" . $spe_tip['spe_tip_id'] . "' >" . $spe_tip['spe_tip_name'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" onclick="loadData('Specification','create')">Crear</button>
    </div>
</form>