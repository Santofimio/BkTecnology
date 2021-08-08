<form id="form" enctype="multipart/form-data">
    <div class="row mt-2">
        <div class="col-12">
            <label>Nombre De La Marca</label>
            <input type="hidden" name="id" value="<?php echo $m['mark_id']; ?>">
            <input type="text" class="form-control" name="name" value="<?php echo $m['mark_name']; ?>" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-group">
                <label>Logo De La Marca</label>
                <input class="form-control" type="file" id="formFile" name="log">
                <input class="form-control" type="hidden"  name="log_old">
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-group">
                <img src="<?php echo $m['mark_log']; ?>" alt="" width="150px" height="50px">
            </div>
        </div>
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="loadData('Mark','update')">Guardar</button>
    </div>
</form>