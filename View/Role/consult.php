<div class="container">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h2 class="display-5 fw-bold text-center">Consultar Roles</h2>
            <div class="row mt-5">
                <div class="col-3">
                    <a href="admin.php">
                        <button class="btn btn-primary" type="button">Volver</button>
                    </a>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" id="buscar" placeholder="Buscar.." onkeyup="filtar('Role')">
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="fModal('Role','Create','Crear Rol')">
                        Crear
                    </button>
                </div>
            </div>
            <div class="row mt-5 mr-3 ml-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Rol</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        foreach ($role as $rol) {

                            echo "<td>" . $rol['rol_id'] . "</td>";
                            echo "<td>" . $rol['rol_name'] . "</td>";
                            echo "<td><button type='button' onclick='fModal(`Role`,`Update`,`Modificar Rol`," . $rol['rol_id'] . ")' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Modificar</button><a></td>";
                            echo "<td><button type='button' onclick='fModal(`Role`,`Delete`,`Estas seguro de Eliminar el Rol <br>" . $rol['rol_name'] . "`," . $rol['rol_id'] . ")' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Eliminar</button><a></td>";
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
    </div>
</div>