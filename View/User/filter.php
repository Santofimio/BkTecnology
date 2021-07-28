<?php
                foreach ($user as $u) {
                    echo "<tr>";
                    echo "<td>" . $u['user_name'] . "</td>";
                    echo "<td>" . $u['user_last_name'] . "</td>";
                    echo "<td>" . $u['user_email'] . "</td>";
                    echo "<td>" . $u['rol_name'] . "</td>";
                    echo "<td>" . $u['sta_name'] . "</td>";
                    echo "<td><button type='button' onclick='fModal(`User`,`Update`,`Modificar Usuario`," . $u['user_id'] . ")' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal'>Modificar</button><a></td>";
                    if ($u['sta_id'] == 1) {
                        echo "<td><button type='button' onclick='fModal(`User`,`Delete`,`Estas seguro de Desactivar el usuario <br>" . $u['user_name'] . "`," . $u['user_id'] . ")' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Desactivar</button><a></td>";

                    }else{
                        echo "<td><button type='button' onclick='fModal(`User`,`Delete`,`Estas seguro de Desactivar el usuario <br>" . $u['user_name'] . "`," . $u['user_id'] . ")' class='btn btn-success' data-toggle='modal' data-target='#exampleModal'>Desactivar</button><a></td>";
                    }
                    echo "</tr>";
                }
                ?>