<div class="container">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h2 class="display-5 fw-bold text-center">Consultar Ciudades</h2>
            <div class="row mt-5">
                <div class="col-3">
                    <a href="admin.php">
                        <button class="btn btn-primary" type="button">Volver</button>
                    </a>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" id="buscar" placeholder="Buscar.." onkeyup="filtar('City')">
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="fModal('City','Create','Crear Ciudad')">
                        Crear
                    </button>
                </div>
            </div>
            <div class="row mt-5 mr-3 ml-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Ciudad</th>
                            <th>Departamento</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        foreach ($city as $city) {
                            echo "<tr>";
                            echo "<td>" . $city['cit_name'] . "</td>";
                            echo "<td>" . $city['dep_name'] . "</td>";
                            echo "<td><button type='button' onclick='fModal(`City`,`Update`,`Modificar Ciudad`," . $city['cit_id'] . ")' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Modificar</button><a></td>";
                            echo "<td><button type='button' onclick='fModal(`City`,`Delete`,`Estas seguro de Eliminar la Ciudad <br>" . $city['cit_name'] . "`," . $city['cit_id'] . ")' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Eliminar</button><a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div id="mdl"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>