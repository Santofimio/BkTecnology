<?php
                foreach ($category as $cat) {
                    
                    echo "<td>" . $cat['cat_id'] . "</td>";
                    echo "<td>" . $cat['cat_name'] . "</td>";
                    echo "<td><button type='button' onclick='fModal(`Category`,`Update`,`Modificar Categoria`," . $cat['cat_id'] . ")' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal'>Modificar</button><a></td>";
                    echo "<td><button type='button' onclick='fModal(`Category`,`Delete`,`Estas seguro de Eliminar la Categoria <br>" . $cat['cat_name'] . "`," . $cat['cat_id'] . ")' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                    echo "</tr>";
                }
                ?>