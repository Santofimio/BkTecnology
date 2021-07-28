<div class="container">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h2 class="display-5 fw-bold text-center">Consultar Usuarios</h2>
            <div class="row mt-5">
                <div class="col-3">
                    <a href="admin.php">
                        <button class="btn btn-primary" type="button">Volver</button>
                    </a>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" id="buscar" placeholder="Buscar.." onkeyup="filtar('User')">
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="fModal('User','Create','Crear Usuario')">
                        Crear
                    </button>
                </div>
            </div>
            <div class="row mt-5 mr-3 ml-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Correo Electronico</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Modificar</th>
                            <th>Desactivar</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        foreach ($user as $u) {
                            echo "<tr>";
                            echo "<td>" . $u['user_name'] . "</td>";
                            echo "<td>" . $u['user_last_name'] . "</td>";
                            echo "<td>" . $u['user_email'] . "</td>";
                            echo "<td>" . $u['rol_name'] . "</td>";
                            echo "<td>" . $u['sta_name'] . "</td>";
                            echo "<td><button type='button' onclick='fModal(`User`,`Update`,`Modificar Usuario`," . $u['user_id'] . ")' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Modificar</button><a></td>";
                            if ($u['sta_id'] == 1) {
                                echo "<td><button type='button' onclick='fModal(`User`,`Delete`,`Estas seguro de Desactivar el usuario <br>" . $u['user_name'] . "`," . $u['user_id'] . ")' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Desactivar</button><a></td>";
                            } else {
                                echo "<td><button type='button' onclick='fModal(`User`,`Delete`,`Estas seguro de Desactivar el usuario <br>" . $u['user_name'] . "`," . $u['user_id'] . ")' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Desactivar</button><a></td>";
                            }
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