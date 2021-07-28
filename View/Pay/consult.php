<div class="container">
    <header class="mt-5 text-center">
        <h2>Consultar Metodos de Pago</h2>
    </header>
    <div class="row mt-5">
        <div class="col-2 ml-3">
            <a href="admin.php">
                <button class="btn btn-primary" type="button">Volver</button>
            </a>
        </div>
        <div class="col-7">
            <input type="text" class="form-control" id="buscar" placeholder="Buscar.." onkeyup="filtar('Pay')">
        </div>
        <div class="col-2 mr-3 float-right">
        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="fModal('Pay','Create','Crear Metodo de Pago')">
                Crear
            </button>
        </div>
    </div>
    <div class="row mt-5 mr-3 ml-3">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Metodo de pago</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php
                foreach ($pay as $p) {
                    
                    echo "<td>" . $p['pay_id'] . "</td>";
                    echo "<td>" . $p['pay_name'] . "</td>";
                    echo "<td><button type='button' onclick='fModal(`Pay`,`Update`,`Modificar Metodo de Pago`," . $p['pay_id'] . ")' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Modificar</button><a></td>";
                    echo "<td><button type='button' onclick='fModal(`Pay`,`Delete`,`Estas seguro de Eliminar el Metodo de Pago <br>" . $p['pay_name'] . "`," . $p['pay_id'] . ")' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Eliminar</button><a></td>";
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