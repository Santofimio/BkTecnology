<?php
                foreach ($provider as $prov) {
                    
                    echo "<td>" . $prov['prov_nit'] . "</td>";
                    echo "<td>" . $prov['prov_name'] . "</td>";
                    echo "<td>" . $prov['prov_address'] . "</td>";
                    echo "<td>" . $prov['prov_tel'] . "</td>";
                    echo "<td><button type='button' onclick='fModal(`Provider`,`Update`,`Modificar Proveedor`," . $prov['prov_id'] . ")' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal'>Modificar</button><a></td>";
                    echo "<td><button type='button' onclick='fModal(`Provider`,`Delete`,`Estas seguro de Eliminar el Proveedor <br>" . $prov['prov_name'] . "`," . $prov['prov_id'] . ")' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                    echo "</tr>";
                }
                ?>