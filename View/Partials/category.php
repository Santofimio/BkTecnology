<div >
    <div class="col ms-4 mt-2 text-white">
        <span><?php echo $cat['cat_name'] ?></span>
    </div>
</div>
<main id="container-category" class="row">
    <div class="col-12">
        <div class="album py-5 bg-blue-gd">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    foreach ($cat_sub as $cs) {

                        echo "<div class='col' onclick='getProductCatSub(" . $cs['cat_sub_id'] . ")'>
                                    <div class='col card-sub-cat'>
                                        <div class='card-sub-cat-img'>
                                            <img src='" . $cs['cat_sub_img'] . "' alt=''>
                                        </div>
                                        <h2>" . $cs['cat_sub_name'] . "</h2>
                                    </div>
                                </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>