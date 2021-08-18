<div class="container text-white">
    <header class="navbar-dark d-flex">
        <ul class="nav nav-pills text-white">
            <li class="nav-item"><a href="#" class="nav-link text-white"><?php echo $pro['cat_name'] ?></a></li>
            <li class="nav-item"><a href="#" class="nav-link text-white">---</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-white"><?php echo $pro['cat_sub_name'] ?></a></li>
        </ul>
    </header>
    <main id="container-product">
        <div id="product-gallery">
            <?php
            $i = 0;
            foreach ($product_img as $pro_i) {
                echo "<div class='gallery-item' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='$i' aria-label='Slide " . $i + (1) . "'>
                        <img src='" . $pro_i['pro_img_url'] . "' alt=''>
                    </div>";
                $i++;
            }
            ?>
        </div>
        <div id="product-img">
            <div id="container-carousel">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php
                        for ($i = 0; $i < $product_img->num_rows; $i++) {
                            if ($i == 0) {
                                echo "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='$i' class='active' aria-current='true' aria-label='Slide " . $i + (1) . "'></button>";
                            } else {
                                echo "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='$i' aria-label='Slide " . $i + (1) . "'></button>";
                            }
                        }
                        ?>
                    </div>
                    <div class="carousel-inner">

                        <?php
                        $i = 0;
                        foreach ($product_img as $pro_img) {
                            if ($i == 0) {
                                echo "<div class='carousel-item active'>
                                        <img src='" . $pro_img['pro_img_url'] . "' class='d-block' alt='...'>
                                    </div>";
                            } else {
                                echo "<div class='carousel-item'>
                                        <img src='" . $pro_img['pro_img_url'] . "' class='d-block' alt='...'>
                                    </div>";
                            }
                            $i++;
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div id="product-price">
            <div id="card-price" class="card p-4">
                <div class="card-head text-center">
                    <img src="<?php echo $pro['mark_log']; ?>" alt="" height="66px" width="77px">
                </div>
                <div class="card-body">
                    <div class="row">
                        <h5 class="card-title"><?php echo $pro['pro_name']; ?></h5>
                    </div>
                    <div class="row mt-2">
                        <h4 class="c-red">$ <?php echo $pro['pro_price']; ?></h4>
                    </div>
                    <div class="mt-2">
                        <h5>Cantidad</h5>
                        <span class="btn bg-red">-</span>
                        <div class="btn btn-dark">1</div>
                        <span class="btn btn-success">+</span>
                    </div>
                    <div class="row mt-3">
                        <button class="btn bg-red btn-lg col-11 m-auto" onclick="addCart(<?php echo $pro['pro_id'];?>)">Añadir Al Carrito</button>
                    </div>
                    <div class="row border-top mt-3"></div>
                    <div class="row mt-2 text-center" id="mediosPago">
                        <h4>Medios De pago</h4>
                        <div class="d-flex flex-row mt-2">
                            <img src="img/MediosDePago/visa-white-icon.png" alt="" width="44px" height="33px" class="me-3">
                            <img src="img/MediosDePago/mastercard-icon.png" alt="" width="44px" height="33px" class="me-3">
                            <img src="img/MediosDePago/pse-icon.png" alt="" width="44px" height="33px" class="me-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="product-vac"></div>
        <div id="product-specifications">
            <div id="card-specifications" class="card">
                <div class="card-header text-center">
                    <h3>Especificaciones</h3>
                </div>
                <div class="card-body text-white">
                    <div class="accordion" id="accordionExample">

                        <?php



                        for ($i = 0; $i < count($spe); $i++) {

                            echo "<div class='accordion-item bo'>
                                        <h2 class='accordion-header bo' id='heading$i'>
                                            <button class='accordion-button collapsed btn-acordion' type='button' data-bs-toggle='collapse' data-bs-target='#collapse$i' aria-expanded='false' aria-controls='collapse$i'>";
                            foreach ($specificationType as $st) {
                                if ($st['spe_tip_id'] == $spe[$i]) {
                                    echo "<div class='text-black'>" . $st['spe_tip_name'] . "</div>";
                                }
                            }
                            echo "</button>
                                        </h2>
                                        <div id='collapse$i' class='accordion-collapse collapse' aria-labelledby='heading$i' data-bs-parent='#accordionExample'>
                                            <div class='accordion-body bo'>";

                            foreach ($specifications as $s) {
                                if ($s['spe_tip_id'] == $spe[$i]) {
                                    echo "<div class='item-specification mb-2'>
                                                            <div class='p-2 bd-highlight'>" . $s['spe_name'] . "</div>
                                                            <div class='p-2 bd-highlight text-end'>" . $s['pro_spe_description'] . "</div>
                                                        </div>";
                                }
                            }

                            echo "</div>
                                        </div>
                                    </div>";
                        }
                        ?>

                    </div>
                </div>
            </div>


        </div>
        <div id="product-summary" class="text-white">
            <h3>Resumen Del producto</h3>
            <p class="card-text"><?php echo $pro['pro_summary']; ?></p>
        </div>
    </main>
</div>