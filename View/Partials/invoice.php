<div class="row m-3 bg-blue-gd p-5">
  <main>

    <div class="row g-5">
      <div class="col">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-white">Productos en el carrito</span>
        </h4>
        <div class="card text-center ">
          <div class="card-header">
            Productos
          </div>
          
          <div class="card-body">
            <?php
            foreach ($products as $p) {
              $pro_img = $this->objCart->consult("*", "product_img p", "p.pro_id=" . $p['pro_id'] . " ORDER by pro_img_id LIMIT 1");
              $pi = mysqli_fetch_assoc($pro_img);
              echo "<div class='card mb-3' >
                      <div class='row g-0'>
                        <div class='col-md-5' onclick='getProduct(" . $p['pro_id'] . ")'>
                          <img src='".$pi['pro_img_url']."' class='img-fluid rounded-start' alt='...'>
                        </div>
                        <div class='col-md-7'>
                          <div class='card-body'>
                          <img src='".$p['mark_log']."' alt='' width='55px' height='55px'>
                            <h5 class='card-title'>".$p['pro_name']."</h5>
                            <div class='mt-2'>
                                  <h5>Cantidad</h5>
                                  <span class='btn bg-red'>-</span>
                                  <div class='btn btn-dark'>1</div>
                                  <span class='btn btn-success'>+</span>
                              </div>
                            <p class='card-text'><small class='text-muted'>".$p['pro_price']."</small></p>
                              
                          </div>
                        </div>
                      </div>
                    </div>";
            }

            ?>
          </div>
          <div class="card-footer text-muted">
            2 days ago
          </div>
        </div>
      </div>
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-white">Your cart</span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <?php 
          foreach ($products as $p) {
                echo "<li class='list-group-item d-flex justify-content-between lh-sm'>
                        <div>
                          <h6 class='my-0'>".$p['pro_name']."</h6>
                          <small class='text-muted'>".$p['cat_sub_name']."</small>
                        </div>
                        <span class='text-muted'>$".$p['pro_price']."</span>
                      </li>";
          }
          ?>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">−$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
          </li>
        </ul>

        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </form>
      </div>

    </div>
  </main>
</div>