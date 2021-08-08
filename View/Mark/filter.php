<?php
                foreach ($mark as $m) {

                    echo "<td>" . $m['mark_name'] . "</td>";
                    echo "<td>" . $m['mark_log'] . "</td>";
                    echo "<td><button type='button' onclick='fModal(`Role`,`Update`,`Modificar marca`," . $m['mark_id'] . ")' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Modificar</button><a></td>";
                    echo "<td><button type='button' onclick='fModal(`Role`,`Delete`,`Estas seguro de Eliminar la marca <br>" . $m['mark_name'] . "`," . $m['mark_id'] . ")' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Eliminar</button><a></td>";
                    echo "</tr>";
                }
                ?>