<?php
                foreach ($pay as $p) {
                    
                    echo "<td>" . $p['pay_id'] . "</td>";
                    echo "<td>" . $p['pay_name'] . "</td>";
                    echo "<td><button type='button' onclick='fModal(`Pay`,`Update`,`Modificar Metodo de Pago`," . $p['pay_id'] . ")' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal'>Modificar</button><a></td>";
                    echo "<td><button type='button' onclick='fModal(`Pay`,`Delete`,`Estas seguro de Eliminar el Metodo de Pago <br>" . $p['pay_name'] . "`," . $p['pay_id'] . ")' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                    echo "</tr>";
                }
                ?>