<div class="container">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h2 class="display-5 fw-bold text-center">Consultar Departamentos</h2>
    <div class="row mt-5">
        <div class="col-3">
            <a href="admin.php">
                <button class="btn btn-primary" type="button">Volver</button>
            </a>
        </div>
        <div class="col-6">
            <input type="text" class="form-control" id="buscar" placeholder="Buscar.." onkeyup="filtar('Department')">
        </div>
        <div class="col-3">
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="fModal('Department','Create','Crear Departamento')">
                Crear
            </button>
        </div>
    </div>
    <div class="row mt-5 mr-3 ml-3">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Departamento</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php
                foreach ($department as $dep) {
                    
                    echo "<td>" . $dep['dep_id'] . "</td>";
                    echo "<td>" . $dep['dep_name'] . "</td>";
                    echo "<td><button type='button' onclick='fModal(`Department`,`Update`,`Modificar Departamento`," . $dep['dep_id'] . ")' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Modificar</button><a></td>";
                    echo "<td><button type='button' onclick='fModal(`Department`,`Delete`,`Estas seguro de Eliminar el Departamento <br>" . $dep['dep_name'] . "`," . $dep['dep_id'] . ")' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Eliminar</button><a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div id="mdl"></div>
</div>