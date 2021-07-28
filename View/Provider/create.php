<form id="form">
    <div class="row mt-2">
        <div class="col-6">
            <label>Nit</label>
            <input type="text" class="form-control" name="nit" required>
        </div>
        <div class="col-6">
            <label>Nombre Del Proveedor</label>
            <input type="text" class="form-control" name="name" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <label>Direccion</label>
            <input type="text" class="form-control" name="address" required>
        </div>
        <div class="col-6">
            <label>Telefono</label>
            <input type="text" class="form-control" name="tel" required>
        </div>
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" onclick="loadData('Provider','create')">Crear</button>
    </div>
</form>