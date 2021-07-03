<div class="container">
    <header class="mt-5 text-center">
        <h2>Consultar Departamentos</h2>
    </header>
    <div class="row mt-5">
        <div class="col-2 ml-3">
            <a href="index.php">
                <button class="btn btn-primary" type="button">Volver</button>
            </a>
        </div>
        <div class="col-7">
            <input type="text" class="form-control" id="buscar" placeholder="Buscar.." onkeyup="filtar('Departamento')">
        </div>
        <div class="col-2 mr-3 float-right">
            <a class="float-right" href="<?php echo getUrl("Department", "Department", "getCreate") ?>"><button class="btn btn-primary">CREAR</button></a>
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
                foreach ($depto as $depto) {
                    
                    echo "<td>" . $depto['dep_id'] . "</td>";
                    echo "<td>" . $depto['dep_name'] . "</td>";
                    echo "<td><a href='" . getUrl("Departamento", "Departamento", "getEditar", array("id" => $depto['dep_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
                    echo "<td><button type='button' onclick='pasarPk(`Departamento`," . $depto['dep_id'] . ",`" . $depto['dep_name'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div id="mdl"></div>
</div>