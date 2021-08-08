<form id="form" enctype="multipart/form-data">
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-group">
                <label>Nombre De La Marca</label>
                <input type="text" class="form-control" name="name" required>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-group">
                <label>Logo De La Marca</label>
                <input class="form-control" type="file" id="formFile" name="log">
            </div>
        </div>
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="loadData('Mark','create')">Crear</button>
    </div>
</form>