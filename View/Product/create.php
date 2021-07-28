<div class="container">

    <div class="row">
        <div class="col-3">
            <a href="admin.php">
                <button class="btn btn-primary mt-3" type="button">Volver</button>
            </a>
        </div>
        <div class="col-6">
            <h2 class="display-5 fw-bold text-center">Crear Productos</h2>
        </div>
        <div class="col-3">
        </div>
    </div>
    <div class="row mt-5">
        <form id="form">
            <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <label>Nombre Del Producto</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>
                <div class="col">
                    <label>Precio</label>
                    <input type="text" class="form-control" name="price" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" rows="3" placeholder="Descripción ..." name="description"></textarea>
                    </div>
                </div>
            </div>

    </div>
    <table class="table">

        <thead>
            <tr><td colspan="5"><h4>Categorias</h4></td></tr>
            <tr>
                <td>Categoria</td>
                <td>SubCategoria</td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <select class="form-select" onchange="sd('CategorySub','category','categorySub')" name="category" id="category">
                        <option>Seleccione...</option>
                        <?php
                        foreach ($category as $cat) {
                            echo "<option value='" . $cat['cat_id'] . "' >" . $cat['cat_name'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <select class="form-select" name="categorySub" id="categorySub">
                        <option>Seleccione...</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="loadData('Provider','create')">Crear</button>
    </div>
    </form>
</div>
</div>