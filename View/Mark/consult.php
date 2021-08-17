<div class="container">

    <h2 class="display-5 fw-bold text-center">Consultar Marcas</h2>
    <div class="row mt-5">
        <div class="col-3">
            <a href="admin.php">
                <button class="btn btn-primary" type="button">Volver</button>
            </a>
        </div>
        <div class="col-6">
            <input type="text" class="form-control" id="buscar" placeholder="Buscar.." onkeyup="filtar('Mark')">
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="fModal('Mark','Create','Crear Marca')">
                Crear
            </button>
        </div>
    </div>
    <div class="row mt-5 mr-3 ml-3">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th >Marca</th>
                    <th>Logo</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    
                </tr>
            </thead>
            <tbody id="tbody">
                <?php
                foreach ($mark as $m) {
                    echo "<tr>";
                    echo "<td width='20%'>" . $m['mark_name'] . "</td>";
                    echo "<td><img src='" . $m['mark_log'] . "' alt='' width='40%' height='40px'></td>";
                    echo "<td width='20%'><button type='button' onclick='fModal(`Mark`,`Update`,`Modificar marca`," . $m['mark_id'] . ")' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Modificar</button><a></td>";
                    echo "<td  width='20%'><button type='button' onclick='fModal(`Mark`,`Delete`,`Estas seguro de Eliminar la marca <br>" . $m['mark_name'] . "`," . $m['mark_id'] . ")' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Eliminar</button><a></td>";
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