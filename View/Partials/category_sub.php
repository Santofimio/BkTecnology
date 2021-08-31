<header class="navbar-dark d-flex text-white">
    <ul class="nav nav-pills text-white">
        <?php



        ?>
        <li class="nav-item"><a href="#" class="nav-link text-white"><?php echo $cs['cat_name'] ?></a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white">---</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white"><?php echo $cs['cat_sub_name'] ?></a></li>
    </ul>
</header>
<main id="container-category" class="row">
    <!-- <div class="col-3">
            
        </div> -->
    <div class="col-12">
        <div class="album py-5 bg-blue-gd">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    foreach ($products as $pro) {

                        $product_img = $this->objProduct->consult("*", "product_img", "pro_id=" . $pro['pro_id'] . " ORDER by pro_img_id LIMIT 1");
                        $pro_img = mysqli_fetch_assoc($product_img);
                        echo "<div class='col poi' onclick='getProduct(" . $pro['pro_id'] . ")'>
                            <div class='card shadow-sm bg-card-pro'>
                                <div class='card-head log-sub-cat-pro'>
                                    <img src='" . $pro['mark_log'] . "'>
                                </div>
                                <div class='img-sub-cat-pro'>
                                    <img src='" . $pro_img['pro_img_url'] . "'>
                                </div>
                                <div class='card-body p-3'>
                                        <div class='row text-center'>
                                        <div class='title-pro'><h5>" . $pro['pro_name'] . "</h5></div>
                                        <div class='precio-pro'>" . $pro['pro_price'] . "</div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>