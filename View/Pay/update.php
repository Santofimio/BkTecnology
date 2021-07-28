<form id="form">
    <div class="row mt-2">
        <div class="col-12">
            <label>Nombre Del Metodo de Pago</label>
            <input type="hidden" name="id" value="<?php echo $p['pay_id']; ?>">
            <input type="text" class="form-control" name="name" value="<?php echo $p['pay_name']; ?>" required>
        </div>
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="loadData('Pay','update')">Guardar</button>
    </div>
</form>