<form id="form">
    <div class="row mt-2">
        <div class="col-6">
            <label>Nit</label>
            <input type="hidden" name="id" value="<?php echo $prov['prov_id']; ?>">
            <input type="text" class="form-control" name="nit" value="<?php echo $prov['prov_nit']; ?>" required>
        </div>
        <div class="col-6">
            <label>Nombre Del Proveedor</label>
            <input type="text" class="form-control" name="name" value="<?php echo $prov['prov_name']; ?>" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <label>Direccion</label>
            <input type="text" class="form-control" name="address" value="<?php echo $prov['prov_address']; ?>"  required>
        </div>
        <div class="col-6">
            <label>Telefono</label>
            <input type="text" class="form-control" name="tel" value="<?php echo $prov['prov_tel']; ?>"  required>
        </div>
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="loadData('Provider','update')">Guardar</button>
    </div>
</form>