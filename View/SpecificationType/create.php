<form id="form">
    <div class="row mt-2">
        <div class="col-12">
            <label>Nombre Del Tipo de Especificacion</label>
            <input type="text" class="form-control" name="name" required>
        </div>
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" onclick="loadData('SpecificationType','create')">Crear</button>
    </div>
</form>