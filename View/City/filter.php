<?php
                foreach ($city as $city) {
                    echo "<tr>";
                    echo "<td>" . $city['cit_name'] . "</td>";
                    echo "<td>" . $city['dep_name'] . "</td>";
                    echo "<td><button type='button' onclick='fModal(`City`,`Update`,`Modificar Ciudad`," . $city['cit_id'] . ")' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal'>Modificar</button><a></td>";
                    echo "<td><button type='button' onclick='fModal(`City`,`Delete`,`Estas seguro de Eliminar la Ciudad <br>" . $city['cit_name'] . "`," . $city['cit_id'] . ")' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                    echo "</tr>";
                }
