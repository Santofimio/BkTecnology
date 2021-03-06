<div class="container mt-3 mb-5 ">
    <div class="row">
        <div class="col-3">
            <a href="admin.php">
                <button class="btn btn-primary mt-3" type="button">Volver</button>
            </a>
        </div>
        <div class="col-6">
            <h2 class="display-5 fw-bold text-center">Crear Producto</h2>
        </div>
        <div class="col-3">
        </div>
    </div>
    <div class="card pb-3 pt-3 mb-3">
        <form id="form" class="pl-5 pr-5 pb-5" enctype="multipart/form-data">
            <div class="row mt-5">
                <div class="col">
                    <div class="form-group">
                        <label>Nombre Del Producto</label>
                        <input type="text" class="form-control" name="name" placeholder="Nombre..." required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="number" class="form-control" name="price" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>stock</label>
                        <input type="number" class="form-control" name="stock" required>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <div class="form-group">
                    <label>Marca</label>
                        <select class="form-select" name="mark" id="mark">
                            <option>Seleccione...</option>
                            <?php
                            foreach ($mark as $m) {
                                echo "<option value='" . $m['mark_id'] . "' >" . $m['mark_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Proveedor</label>
                        <select class="form-select" name="provider" id="provider">
                            <option>Seleccione...</option>
                            <?php
                            foreach ($provider as $prov) {
                                echo "<option value='" . $prov['prov_id'] . "' >" . $prov['prov_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <label for="summary">Resumen del Producto</label>
                        <textarea class="form-control" rows="3" placeholder="resumen ..." name="summary"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <h4>Categoria</h4>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <label for="">Categoria</label>
                        <select class="form-select" onchange="sd('CategorySub','category','categorySub')" name="category" id="category">
                            <option>Seleccione...</option>
                            <?php
                            foreach ($category as $cat) {
                                echo "<option value='" . $cat['cat_id'] . "' >" . $cat['cat_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">SubCategoria</label>
                        <select class="form-select" name="categorySub" id="categorySub">
                            <option>Seleccione...</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <h4>Especificaci??n</h4>
                </div>
            </div>
            <div id="container_spe">
                <table  class="table">
                    <thead>
                        <tr>
                            <td width="33%">Tipo de Especificaci??n</td>
                            <td width="33%">Especificaci??n</td>
                            <td width="33%">Descripci??n Especificaci??n</td>
                            <td><button type="button" class="btn btn-success float-end" onclick="spe()">+</button></td>
                        </tr>
                    </thead>
                </table>
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="32%">
                                <select class="form-select" onchange="sd('Specification','specificationType-1','specification-1')" id="specificationType-1">
                                    <div id="select-specification">
                                        <option>Seleccione...</option>

                                        <?php
                                        foreach ($specificationType as $spe_tip) {
                                            echo "<option value='" . $spe_tip['spe_tip_id'] . "' >" . $spe_tip['spe_tip_name'] . "</option>";
                                        }
                                        ?>
                                    </div>
                                </select>
                            </td>
                            <td width="31%">
                                <select class="form-select" name="specification[]" id="specification-1">
                                    <option>Seleccione...</option>
                                </select>
                            </td>
                            <td width="32%">
                                <input type="text" class="form-control" name="spe_description[]" required>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row mt-5">
                <div class="col-11">
                    <h4>Imagen</h4>
                </div>
                <div class="col-1">
                    <div>
                        <button type="button" class="btn btn-success float-end" onclick="speImg('nodeImgContainer')">+</button>
                    </div>
                </div>
            </div>
            <div class="mt-3" id="nodeImgContainer">
                <div class="row">
                    <div class="col-11">
                        <div class="form-group">
                            <input class="form-control" type="file" id="formFile" name="imagen[]">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="loadData('Product','create')">Crear</button>
            </div>
        </form>
    </div>

</div>