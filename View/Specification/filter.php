<?php
                foreach ($specification as $spe) {
                    
                    echo "<td>" . $spe['spe_id'] . "</td>";
                    echo "<td>" . $spe['spe_name'] . "</td>";
                    echo "<td>" . $spe['spe_tip_name'] . "</td>";
                    echo "<td><button type='button' onclick='fModal(`Specification`,`Update`,`Modificar Especificacion`," . $spe['spe_id'] . ")' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal'>Modificar</button><a></td>";
                    echo "<td><button type='button' onclick='fModal(`Specification`,`Delete`,`Estas seguro de Eliminar la Especificacion <br>" . $spe['spe_name'] . "`," . $spe['spe_id'] . ")' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                    echo "</tr>";
                }
                ?>