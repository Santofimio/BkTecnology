<div class="container mt-3 mb-5">
    <div class="row">
        <div class="col-3">
            <a href="admin.php">
                <button class="btn btn-primary mt-3" type="button">Volver</button>
            </a>
        </div>
        <div class="col-6">
            <h2 class="display-5 fw-bold text-center">Modificar Producto</h2>
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
                        <input type="hidden" class="form-control" name="id" value="<?php echo $pro['pro_id'] ?>">
                        <input type="text" class="form-control" name="name" value="<?php echo $pro['pro_name'] ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="number" class="form-control" name="price" value="<?php echo $pro['pro_price'] ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" class="form-control" name="stock" value="<?php echo $pro['pro_stock'] ?>" required>
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
                                if ($m['mark_id'] === $pro['mark_id']) {
                                    echo "<option value='" . $m['mark_id'] . "' selected >" . $m['mark_name'] . "</option>";
                                } else {
                                    echo "<option value='" . $m['mark_id'] . "' >" . $m['mark_name'] . "</option>";
                                }
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
                                if ($prov['prov_id'] === $pro['prov_id']) {
                                    echo "<option value='" . $prov['prov_id'] . "' selected >" . $prov['prov_name'] . "</option>";
                                } else {
                                    echo "<option value='" . $prov['prov_id'] . "' >" . $prov['prov_name'] . "</option>";
                                }
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
                        <textarea class="form-control" rows="3" name="summary"><?php echo $pro['pro_summary'] ?></textarea>
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
                                if ($cat['cat_id'] === $cs['cat_id']) {
                                    echo "<option value='" . $cat['cat_id'] . "' selected >" . $cat['cat_name'] . "</option>";
                                } else {
                                    echo "<option value='" . $cat['cat_id'] . "' >" . $cat['cat_name'] . "</option>";
                                }
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
                            <?php
                            foreach ($category_sub as $cat_sub) {
                                if ($cat_sub['cat_sub_id'] === $cs['cat_sub_id']) {
                                    echo "<option value='" . $cat_sub['cat_sub_id'] . "' selected >" . $cat_sub['cat_sub_name'] . "</option>";
                                } else {
                                    echo "<option value='" . $cat_sub['cat_sub_id'] . "' >" . $cat_sub['cat_sub_name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <h4>Especificación</h4>
                </div>
            </div>
            <div id="container_spe">
                <table class="table">
                    <thead>
                        <tr>
                            <td width="33%">Tipo de Especificación</td>
                            <td width="33%">Especificación</td>
                            <td width="33%">Descripción Especificación</td>
                            <td><button type="button" class="btn btn-success float-end" onclick="spe()">+</button></td>
                        </tr>
                    </thead>
                </table>
                <table class="table">
                    <tbody id="tbody">
                        <?php
                        foreach ($specifications as $spe) {

                            echo "<tr id='spe-" . $spe['pro_spe_id'] . "'>";
                            echo "<td width='33%'>" . $spe['spe_tip_name'] . "</td>";
                            echo "<td width='33%'>" . $spe['spe_name'] . "</td>";
                            echo "<td width='33%'>" . $spe['pro_spe_description'] . "</td>";
                            echo "<td><button type='button' class='btn btn-danger float-end' onclick='nodeDelete(`spe-" . $spe['pro_spe_id'] . "`,`tbody`," . $spe['pro_spe_id'] . ",`pro_spe`)'>-</button></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="32%">
                                <select class="form-select" onchange="sd('Specification','specificationType-1','specification-1')" id="specificationType-1">
                                    <div id="select-specification">
                                        <option value="false">Seleccione...</option>

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
                            <td>
                            </td>
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
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="img-container">
                <?php
                foreach ($product_img as $pro_img) {

                    echo "<div class='col' id='img-" . $pro_img['pro_img_id'] . "'>
                            <div class='card shadow-sm'>
                            <img src='" . $pro_img['pro_img_url'] . "' alt=''>
                                <div class='card-body'>
                                    <div class='d-grid gap-2 d-md-flex justify-content-md-center'>
                                        <p class='card-text'><button type='button' class='btn btn-sm btn-danger end' onclick='nodeDelete(`img-" . $pro_img['pro_img_id'] . "`,`img-container`," . $pro_img['pro_img_id'] . ",`pro_img`)'>Eliminar</button></p>
                                    </div>
                                </div>
                            </div>
                        </div>";
                }
                ?>
            </div>
            <div class="row mt-3">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="loadData('Product','update')">Guardar</button>
            </div>
        </form>
    </div>

</div>