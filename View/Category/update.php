<form id="form">
    <div class="row mt-2">
        <div class="col-12">
            <label>Nombre De La Categoria</label>
            <input type="hidden" name="id" value="<?php echo $cat['cat_id']; ?>">
            <input type="text" class="form-control" name="name" value="<?php echo $cat['cat_name']; ?>" required>
        </div>
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="loadData('Category','update')">Guardar</button>
    </div>
</form>