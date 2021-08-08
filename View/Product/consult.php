<div class="container">
            <h2 class="display-5 fw-bold text-center">Consultar Productos</h2>
            <div class="row mt-5">
                <div class="col-3">
                    <a href="admin.php">
                        <button class="btn btn-primary" type="button">Volver</button>
                    </a>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" id="buscar" placeholder="Buscar.." onkeyup="filtar('Product')">
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary float-end"  onclick="loadData('Product','getCreate')">
                        Crear
                    </button>
                </div>
            </div>
            <div class="row mt-5 bg-white">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>SubCategoria</th>
                            <th>Proveedor</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        foreach ($product as $pro) {


                            echo "<td>" . $pro['pro_name'] . "</td>";
                            echo "<td>" . $pro['pro_price'] . "</td>";
                            echo "<td>" . $pro['cat_sub_name'] . "</td>";
                            echo "<td>" . $pro['prov_name'] . "</td>";
                            echo "<td><button type='button' onclick='loadData(`Product`,`getUpdate`,".$pro['pro_id'].")' class='btn btn-warning'>Modificar</button></td>";
                            echo "<td><button type='button' onclick='fModal(`Product`,`Delete`,`Estas seguro de Eliminar el producto <br>" . $pro['pro_name'] . "`," . $pro['pro_id'] . ")' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Eliminar</button></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div id="mdl"></div>
                </div>
            </div>
        </div>
