<form id="form">
    <div class="row mt-2">
        <div class="col-12">
            <label>Nombre De La SubCategoria</label>
            <input type="hidden" name="id" value="<?php echo $spe['spe_id']; ?>">
            <input type="text" class="form-control" name="name" value="<?php echo $spe['spe_name']; ?>" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <label>Categoria</label>
            <select name="spe_tip" class="form-control">
                <option>Seleccione...</option>
                <?php
                foreach ($specificationType as $spe_tip) {
                    if ($spe['spe_tip_id'] == $spe_tip['spe_tip_id']) {
                        echo "<option value='" . $spe_tip['spe_tip_id'] . "'selected>" . $spe_tip['spe_tip_name'] . "</option>";

                    } else {
                        echo "<option value='" . $spe_tip['spe_tip_id'] . "' >" . $spe_tip['spe_tip_name'] . "</option>";

                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="loadData('Specification','update')">Guardar</button>
    </div>
</form>