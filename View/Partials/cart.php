<div class="row m-3 bg-blue-gd p-5">
  <main>

    <div class="row g-5">
      <div class="col" id="cont-cart">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-white">Productos en el carrito</span>
        </h4>
        <div class="card text-center border-secondary">
          <div class="card-header">
            Productos
          </div>
          
          <div class="card-body border-secondary" id="cont-card-list">
            <?php
            if ($_SESSION['cart'] == 0) {
              echo "<div class='alert alert-danger' role='alert'>
                      <h4 class='alert-heading'>No tienes productos en el carrito!</h4>
                      <hr>
                  </div>";
            }
            foreach ($products as $p) {
              $pro_img = $this->objCart->consult("*", "product_img p", "p.pro_id=" . $p['pro_id'] . " ORDER by pro_img_id LIMIT 1");
              $pi = mysqli_fetch_assoc($pro_img);
              echo "<div class='card mb-3 border-secondary' height='600px' id='pk-" . $p['pro_id'] . "'>
                      <div class='row g-0'>
                        <div class='col-md-6' onclick='getProduct(" . $p['pro_id'] . ")'>
                          <img src='".$pi['pro_img_url']."' class='img-fluid rounded-start' alt='...'>
                        </div>
                        <div class='col-md-6'>
                          <div class='card-body'>
                          <img src='".$p['mark_log']."' alt='' width='55px' height='55px'>
                            <h5 class='card-title'>".$p['pro_name']."</h5>
                            <div class='row mt-2'>
                                  <div class='col'><h5>Cantidad<br><span class='btn btn-dark mt-2'>" . $p['quantity'] . "</span></h5></div>
                              </div>
                              <div class='precio-c'><h5> $".$p['pro_price']."</h5></div>
                            
                            <img src='img/delete.png' alt='' width='55px' height='55px' style='cursor: pointer;' onclick='deleteCart(" . $p['pro_id'] . ")'>
                          </div>
                        </div>
                      </div>
                    </div>";
            }

            ?>
          </div>
        </div>
      </div>
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-white">Tu Carrito</span>
          <span class="badge bg-primary rounded-pill" id="cont-sup"><?php echo $_SESSION['cart']; ?></span>
        </h4>
        <ul class="list-group mb-3">
          <div>
          <?php 
          $total = 0;
          foreach ($products as $p) {

                if ($p['quantity'] > 1) {
                  $precio = $p['pro_price']* $p['quantity'];
                }else{
                  $precio = $p['pro_price'];
                }
                echo "<div id='pkt-" . $p['pro_id'] . "'>
                <li class='list-group-item d-flex justify-content-between lh-sm' height='150px' >
                        <div>
                          <h6 class='my-0'>".$p['pro_name']."</h6>
                          <small class='text-muted'>".$p['cat_sub_name']."</small>
                        </div>
                        <span class='text-muted'>$".$precio."</span>
                      </li>
                      </div>";
                $total = $total + $precio;
          }
          ?>
          </div>
        </ul>

        <form class="card p-2">
          <div class="row">
              <span class="col-6">Total</span>
              <strong class="col-6 col-red text-end" id="cont-total">$<?php echo $total; ?></strong>
              <input type="hidden" id="total" value="<?php echo $total; ?>">
          </div>
        </form>
        <div class="row mt-3" id="btn-getPay">
              <div class="btn bg-red m-auto link m-3 col-6" onclick="pay()">IR A PAGAR</div>
          </div>
        </div>
    </div>
  </main>
</div>