<div class="container text-white">
    <header class="navbar-dark d-flex">
        <ul class="nav nav-pills text-white">
            <li class="nav-item ps-3"><a href="#" class="nav-link text-white"><?php echo $cat['cat_name']?></a></li>
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
                        foreach ($cat_sub as $cs) {

                            echo "<div class='col poi' onclick='getProductCatSub(" . $cs['cat_sub_id'] . ")'>
                            <div class='card shadow-sm col-sub-cat'>
                                <img src='" . $cs['cat_sub_img'] . "' alt='' style='margin: auto;'>
                                <div class='card-body'>
                                <div class='text-center' style='margin: auto;'>
                                        <h2>" . $cs['cat_sub_name'] . "</h2>
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
</div>