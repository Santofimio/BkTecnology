<!-- START THE FEATURETTES -->

<hr class="featurette-divider">

<h3 class="mt-3 mb-3">Computadores</h3>
<div class="row">
    <?php
    $c_com = 1;
    while ($fila = mysqli_fetch_array($computadores)) {

        $pro_spe = $this->objProduct->consult("*", "product_specification p", "p.pro_id=" . $fila['pro_id']);
        $pro_img = $this->objProduct->consult("*", "product_img p", "p.pro_id=" . $fila['pro_id'] . " ORDER by pro_img_id LIMIT 1");

        foreach ($pro_img  as $pi) {
        }

        foreach ($pro_spe  as $ps) {
            if ($ps['spe_id'] == 17) {
                $display = $ps['pro_spe_description'];
            } else if ($ps['spe_id'] == 13) {
                $ref = $ps['pro_spe_description'];
            }
        }

        if ($c_com === 1) {

            echo "<div class='col-6'>
                        <div class='card p-3 bg-card-xl m-auto'>
                            <div class='row g-0 m-auto'>
                                <div class='col-md-6 text-center'>
                                    <img src='" . $fila['mark_log'] . "' class='log-xl'>
                                    <h4 class='mt-3'>Ref-$ref</h4>
                                    <h5>$display</h5>
                                    <div class='label'>
                                        <span>24%</span>
                                        <div>Dcto</div>
                                    </div>
                                    <div class='precio'>" . $fila['pro_price'] . "</div>
                                </div>
                                <div class='col-md-6 text-center' >
                                    <div class='card-body'>
                                    <img src='" . $pi['pro_img_url'] . "' class='img-fluid rounded-start mx-auto' alt='...'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
        } else {
            echo "<div class='col-3'>
                            <div class='card p-3 bg-card-xm text-center'>
                                <img src='" . $fila['mark_log'] . "' class='log'  alt='' width='20%' height='10%'>
                                <img src='" . $pi['pro_img_url'] . "' class='img' alt='' width='50%' height='50%'>
                                <span class='m-0'>Ref-$ref<br>$display</span>
                                <div class='precio'>" . $fila['pro_price'] . "</div>
                            </div>
                        </div>";
        }
        $c_com++;
    }
    ?>



</div>
<hr class="featurette-divider">

<h3 class="mt-3 mb-3">Celulares</h3>
<div class="row">
    <?php
    $c_com = 1;
    while ($fila = mysqli_fetch_array($celulares)) {

        $pro_spe_cel = $this->objProduct->consult("*", "product_specification p", "p.pro_id=" . $fila['pro_id']);
        $pro_img_cel = $this->objProduct->consult("*", "product_img p", "p.pro_id=" . $fila['pro_id'] . " ORDER by pro_img_id LIMIT 1");

        foreach ($pro_img_cel  as $pi) {}

        foreach ($pro_spe_cel  as $psc) {
            if ($psc['spe_id'] == 3) {
                $ram = $psc['pro_spe_description'];
            } else if ($psc['spe_id'] == 5) {
                $dd = $psc['pro_spe_description'];
            }
        }

        if ($c_com === 3) {

            echo "<div class='col-6'>
                        <div class='card p-3 bg-card-xl m-auto'>
                            <div class='row g-0 m-auto'>
                                <div class='col-md-6 text-center m-auto'>
                                    <img src='" . $fila['mark_log'] . "' class='log-xl'>
                                    <h4 class='mt-3'>RAM $ram</h4>
                                    <h5>Almacenamiento $dd</h5>
                                    <div class='label'>
                                        <span>24%</span>
                                        <div>Dcto</div>
                                    </div>
                                    <div class='precio'>" . $fila['pro_price'] . "</div>
                                </div>
                                <div class='col-md-6 text-center'>
                                    <div class='card-body'>
                                    <img src='" . $pi['pro_img_url'] . "' class='img-fluid rounded-start mx-auto' alt='...'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
        } else {
            echo "<div class='col-3'>
                            <div class='card p-3 bg-card-xm text-center'>
                                <img src='" . $fila['mark_log'] . "' class='log'  alt='' width='20%' height='10%'>
                                <img src='" . $pi['pro_img_url'] . "' class='img' alt='' width='50%' height='50%'>
                                <span class='m-0'>RAM $ram<br>Almacenamiento $dd</span>
                                <div class='precio'>" . $fila['pro_price'] . "</div>
                            </div>
                        </div>";
        }
        $c_com++;
    }
    ?>
</div>
<hr class="featurette-divider">

<h3 class="mt-3 mb-3">Audio</h3>
<div class="row">
<?php
    $c_com = 1;
    while ($fila = mysqli_fetch_array($computadores)) {

        $pro_spe = $this->objProduct->consult("*", "product_specification p", "p.pro_id=" . $fila['pro_id']);
        $pro_img = $this->objProduct->consult("*", "product_img p", "p.pro_id=" . $fila['pro_id'] . " ORDER by pro_img_id LIMIT 1");

        foreach ($pro_img  as $pi) {
        }

        foreach ($pro_spe  as $ps) {
            if ($ps['spe_id'] == 17) {
                $display = $ps['pro_spe_description'];
            } else if ($ps['spe_id'] == 13) {
                $ref = $ps['pro_spe_description'];
            }
        }

        if ($c_com === 1) {

            echo "<div class='col-6'>
                        <div class='card p-3 bg-card-xl m-auto'>
                            <div class='row g-0 m-auto'>
                                <div class='col-md-6 text-center'>
                                    <img src='" . $fila['mark_log'] . "' class='log-xl'>
                                    <h4 class='mt-3'>Ref-$ref</h4>
                                    <h5>$display</h5>
                                    <div class='label'>
                                        <span>24%</span>
                                        <div>Dcto</div>
                                    </div>
                                    <div class='precio'>" . $fila['pro_price'] . "</div>
                                </div>
                                <div class='col-md-6 text-center' >
                                    <div class='card-body'>
                                    <img src='" . $pi['pro_img_url'] . "' class='img-fluid rounded-start mx-auto' alt='...'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
        } else {
            echo "<div class='col-3'>
                            <div class='card p-3 bg-card-xm text-center'>
                                <img src='" . $fila['mark_log'] . "' class='log'  alt='' width='20%' height='10%'>
                                <img src='" . $pi['pro_img_url'] . "' class='img' alt='' width='50%' height='50%'>
                                <span class='m-0'>Ref-$ref<br>$display</span>
                                <div class='precio'>" . $fila['pro_price'] . "</div>
                            </div>
                        </div>";
        }
        $c_com++;
    }
    ?>
</div>
<hr class="featurette-divider">

<h3 class="mt-3 mb-3">Video</h3>
<div class="row">
<?php
    $c_com = 1;
    while ($fila = mysqli_fetch_array($celulares)) {

        $pro_spe_cel = $this->objProduct->consult("*", "product_specification p", "p.pro_id=" . $fila['pro_id']);
        $pro_img_cel = $this->objProduct->consult("*", "product_img p", "p.pro_id=" . $fila['pro_id'] . " ORDER by pro_img_id LIMIT 1");

        foreach ($pro_img_cel  as $pi) {}

        foreach ($pro_spe_cel  as $psc) {
            if ($psc['spe_id'] == 3) {
                $ram = $psc['pro_spe_description'];
            } else if ($psc['spe_id'] == 5) {
                $dd = $psc['pro_spe_description'];
            }
        }

        if ($c_com === 3) {

            echo "<div class='col-6'>
                        <div class='card p-3 bg-card-xl m-auto'>
                            <div class='row g-0 m-auto'>
                                <div class='col-md-6 text-center m-auto'>
                                    <img src='" . $fila['mark_log'] . "' class='log-xl'>
                                    <h4 class='mt-3'>RAM $ram</h4>
                                    <h5>Almacenamiento $dd</h5>
                                    <div class='label'>
                                        <span>24%</span>
                                        <div>Dcto</div>
                                    </div>
                                    <div class='precio'>" . $fila['pro_price'] . "</div>
                                </div>
                                <div class='col-md-6 text-center'>
                                    <div class='card-body'>
                                    <img src='" . $pi['pro_img_url'] . "' class='img-fluid rounded-start mx-auto' alt='...'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
        } else {
            echo "<div class='col-3'>
                            <div class='card p-3 bg-card-xm text-center'>
                                <img src='" . $fila['mark_log'] . "' class='log'  alt='' width='20%' height='10%'>
                                <img src='" . $pi['pro_img_url'] . "' class='img' alt='' width='50%' height='50%'>
                                <span class='m-0'>RAM $ram<br>Almacenamiento $dd</span>
                                <div class='precio'>" . $fila['pro_price'] . "</div>
                            </div>
                        </div>";
        }
        $c_com++;
    }
    ?>
</div>
<hr class="featurette-divider">

<h3 class="mt-3 mb-3">Tecno Hogar</h3>
<div class="row">
<?php
    $c_com = 1;
    while ($fila = mysqli_fetch_array($computadores)) {

        $pro_spe = $this->objProduct->consult("*", "product_specification p", "p.pro_id=" . $fila['pro_id']);
        $pro_img = $this->objProduct->consult("*", "product_img p", "p.pro_id=" . $fila['pro_id'] . " ORDER by pro_img_id LIMIT 1");

        foreach ($pro_img  as $pi) {
        }

        foreach ($pro_spe  as $ps) {
            if ($ps['spe_id'] == 17) {
                $display = $ps['pro_spe_description'];
            } else if ($ps['spe_id'] == 13) {
                $ref = $ps['pro_spe_description'];
            }
        }

        if ($c_com === 1) {

            echo "<div class='col-6'>
                        <div class='card p-3 bg-card-xl m-auto'>
                            <div class='row g-0 m-auto'>
                                <div class='col-md-6 text-center'>
                                    <img src='" . $fila['mark_log'] . "' class='log-xl'>
                                    <h4 class='mt-3'>Ref-$ref</h4>
                                    <h5>$display</h5>
                                    <div class='label'>
                                        <span>24%</span>
                                        <div>Dcto</div>
                                    </div>
                                    <div class='precio'>" . $fila['pro_price'] . "</div>
                                </div>
                                <div class='col-md-6 text-center' >
                                    <div class='card-body'>
                                    <img src='" . $pi['pro_img_url'] . "' class='img-fluid rounded-start mx-auto' alt='...'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
        } else {
            echo "<div class='col-3'>
                            <div class='card p-3 bg-card-xm text-center'>
                                <img src='" . $fila['mark_log'] . "' class='log'  alt='' width='20%' height='10%'>
                                <img src='" . $pi['pro_img_url'] . "' class='img' alt='' width='50%' height='50%'>
                                <span class='m-0'>Ref-$ref<br>$display</span>
                                <div class='precio'>" . $fila['pro_price'] . "</div>
                            </div>
                        </div>";
        }
        $c_com++;
    }
    ?>
</div>
<hr class="featurette-divider">
<!-- /END THE FEATURETTES -->