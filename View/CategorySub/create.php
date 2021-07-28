<form id="form">
    <div class="row mt-2">
        <div class="col-12">
            <label>Nombre De la SubCategoria</label>
            <input type="text" class="form-control" name="name" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <label>Categoria</label>
            <select name="cat" class="form-control">
                <option>Seleccione...</option>
                <?php
                foreach ($category as $cat) {
                    echo "<option value='" . $cat['cat_id'] . "' >" . $cat['cat_name'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" onclick="loadData('CategorySub','create')">Crear</button>
    </div>
</form>