<?php
                        foreach ($product as $pro) {


                            echo "<td>" . $pro['pro_name'] . "</td>";
                            echo "<td>" . $pro['pro_price'] . "</td>";
                            echo "<td>" . $pro['cat_sub_name'] . "</td>";
                            echo "<td>" . $pro['prov_name'] . "</td>";
                            echo "<td><button type='button' onclick='loadData(`Product`,`getUpdate`,".$pro['pro_id'].")' class='btn btn-warning'>Modificar</button></td>";
                            echo "<td><button type='button' onclick='fModal(`Product`,`Delete`,`Estas seguro de Eliminar el producto <br>" . $pro['pro_name'] . "`," . $pro['pro_id'] . ")' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Eliminar</button></td>";
                            echo "</tr>";
                        }
                        ?>