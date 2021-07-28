<?php
    foreach ($role as $rol) {
        echo "<tr>";
        echo "<td>" . $rol['rol_id'] . "</td>";
        echo "<td>" . $rol['rol_name'] . "</td>";
        echo "<td><button type='button' onclick='fModal(`Role`,`Update`,`Modificar Rol`," . $rol['rol_id'] . ")' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal'>Modificar</button><a></td>";
        echo "<td><button type='button' onclick='fModal(`Role`,`Delete`,`Estas seguro de Eliminar el Rol <br>" . $rol['rol_name'] . "`," . $rol['rol_id'] . ")' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
        echo "</tr>";
    }
?>