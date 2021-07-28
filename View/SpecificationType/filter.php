<?php
                foreach ($specification_type as $spe_tip) {
                    
                    echo "<td>" . $spe_tip['spe_tip_id'] . "</td>";
                    echo "<td>" . $spe_tip['spe_tip_name'] . "</td>";
                    echo "<td><button type='button' onclick='fModal(`SpecificationType`,`Update`,`Modificar Tipo Especificacion`," . $spe_tip['spe_tip_id'] . ")' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal'>Modificar</button><a></td>";
                    echo "<td><button type='button' onclick='fModal(`SpecificationType`,`Delete`,`Estas seguro de Eliminar el Tipo Especificacion <br>" . $spe_tip['spe_tip_name'] . "`," . $spe_tip['spe_tip_id'] . ")' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                    echo "</tr>";
                }
                ?>