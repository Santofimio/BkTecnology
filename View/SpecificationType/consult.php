<div class="container">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h2 class="display-5 fw-bold text-center">Consultar Tipos de Especificacion</h2>
            <div class="row mt-5">
                <div class="col-3">
                    <a href="admin.php">
                        <button class="btn btn-primary" type="button">Volver</button>
                    </a>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" id="buscar" placeholder="Buscar.." onkeyup="filtar('SpecificationType')">
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="fModal('SpecificationType','Create','Crear Tipo de Especificacion')">
                        Crear
                    </button>
                </div>
            </div>
            <div class="row mt-5 mr-3 ml-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Tipo De Especificacion</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        foreach ($specification_type as $spe_tip) {

                            echo "<td>" . $spe_tip['spe_tip_id'] . "</td>";
                            echo "<td>" . $spe_tip['spe_tip_name'] . "</td>";
                            echo "<td><button type='button' onclick='fModal(`SpecificationType`,`Update`,`Modificar Tipo Especificacion`," . $spe_tip['spe_tip_id'] . ")' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Modificar</button><a></td>";
                            echo "<td><button type='button' onclick='fModal(`SpecificationType`,`Delete`,`Estas seguro de Eliminar el Tipo Especificacion <br>" . $spe_tip['spe_tip_name'] . "`," . $spe_tip['spe_tip_id'] . ")' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Eliminar</button><a></td>";
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