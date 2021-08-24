<form id="form">
    <div class="row mt-2">
        <div class="col-12">
            <label>Nombre De La SubCategoria</label>
            <input type="hidden" name="id" value="<?php echo $cat_sub['cat_sub_id']; ?>">
            <input type="text" class="form-control" name="name" value="<?php echo $cat_sub['cat_sub_name']; ?>" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <label>Categoria</label>
            <select name="cat" class="form-control">
                <option>Seleccione...</option>
                <?php
                foreach ($category as $cat) {
                    if ($cat_sub['cat_id'] == $cat['cat_id']) {
                        echo "<option value='" . $cat['cat_id'] . "'selected>" . $cat['cat_name'] . "</option>";

                    } else {
                        echo "<option value='" . $cat['cat_id'] . "' >" . $cat['cat_name'] . "</option>";

                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-group">
                <label>Imagen SubCategoria</label>
                <input class="form-control" type="file" id="formFile" name="imagen">
                <input class="form-control" type="hidden"  name="imagen_old">
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-group p-3">
                <img src="<?php echo $cat_sub['cat_sub_img']; ?>" alt="" width="130px" height="150px">
            </div>
        </div>
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="loadData('CategorySub','update')">Guardar</button>
    </div>
</form>