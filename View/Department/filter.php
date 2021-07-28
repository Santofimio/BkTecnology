<?php
    foreach ($department as $dep) {
                    
    echo "<td>" . $dep['dep_id'] . "</td>";
    echo "<td>" . $dep['dep_name'] . "</td>";
    echo "<td><button type='button' onclick='fModal(`Department`,`Update`,`Modificar Departamento`," . $dep['dep_id'] . ")' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal'>Modificar</button><a></td>";
    echo "<td><button type='button' onclick='fModal(`Department`,`Delete`,`Estas seguro de Eliminar el Departamento <br>" . $dep['dep_name'] . "`," . $dep['dep_id'] . ")' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
    echo "</tr>";
    }
