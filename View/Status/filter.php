<?php
                foreach ($status as $sta) {
                    
                    echo "<td>" . $sta['sta_id'] . "</td>";
                    echo "<td>" . $sta['sta_name'] . "</td>";
                    echo "<td><button type='button' onclick='fModal(`stae`,`Update`,`Modificar Estado`," . $sta['sta_id'] . ")' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal'>Modificar</button><a></td>";
                    echo "<td><button type='button' onclick='fModal(`stae`,`Delete`,`Estas seguro de Eliminar el Estado <br>" . $sta['sta_name'] . "`," . $sta['sta_id'] . ")' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                    echo "</tr>";
                }
                ?>