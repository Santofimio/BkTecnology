<?php

include_once "../Lib/helpers.php";
include_once "../View/Partials/head.php";

?>

<body onload="loadIndex()">
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 ">
      <a href="index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="img/log.png" alt="" width="200px" height="50px">
      </a>



      <div class="col-md-3 text-end">
        <a href="login.php"><button type="button" class="btn btn-outline-primary me-2">Inicia Sesión</button></a>
        <button type="button" class="btn btn-primary">registrate</button>
      </div>
    </header>
  </div>
  <header class="navbar-dark d-flex justify-content-center  bg-dark text-white">
    <ul class="nav nav-pills text-white">
      <!-- <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li> -->
      <li class="nav-item"><a href="#" class="nav-link text-white">Computadores</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white">Celulares</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white">Audio</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white">Video</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white">Tecno Hogar</a></li>
    </ul>
  </header>


  <main class="bg-body">

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/slider.jpg" alt="" width="100%" height="100%">
          <div class="container">
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/slider-1.jpg" alt="" width="100%" height="100%">
          <div class="container">
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/slider-2.jpg" alt="" width="100%" height="100%">
          <div class="container">
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>


    <!-- Marketing messaging and featurettes
  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="bd-placeholder-img rounded-circle" src="img/pagos-seguros.png" alt="" width="140" height="140">
          <h2>Pago Seguro</h2>
          <p>Multiple medios de pago seguro.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="bd-placeholder-img rounded-circle" src="img/oferta.png" alt="" width="140" height="140">
          <h2>Ofertas</h2>
          <p>Conoce todas las ofertas que tenemos para ti</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="bd-placeholder-img rounded-circle" src="img/free.jpg" alt="" width="140" height="140">
          <h2>Envio Gratis</h2>
          <p>Envios gratis a nivel nacional.</p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <h3 class="mt-3 mb-3">Computadores</h3>
      <div class="row">
        <div class="col-6">
          <div class="card p-3 bg-card-xl">
            <div class="row g-0">
              <div class="col-md-6 mt-5 text-center">
                <img src="img/Computadores/logo_asus.svg" alt="" width="80%" height="20%">
                <h3>Portátil 14"</h3>
                <h4 class="mt-3 mb-3">A314-22-R1C8</h4>
                <div class="label ">
                  <span>24%</span>
                  <div>Dcto</div>
                </div>
                <div class="precio">1.500.000</div>
              </div>
              <div class="col-md-6 text-center">
                <div class="card-body">
                  <img src="img/Computadores/4711081078869.png" class="img-fluid rounded-start mx-auto" alt="...">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card p-3 bg-card-xm">
            <div class="row text-center">
              <img src="img/Computadores/acer.png" class="" alt="..." width="44%" height="33%">
              <img src="img/Computadores/acer-green.svg" alt="" width="33%" height="6%">
              <span class="m-0">Portátil 14"<br>A314-22-R1C8</span>
              <div class="precio">1.500.000</div>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card p-3 bg-card-xm">
            <div class="row text-center">
              <img src="img/Computadores/acer.png" class="card-img-top" alt="..." width="66%" height="33%">
              <img src="img/Computadores/acer-green.svg" alt="" width="33%" height="6%">
              <span class="m-0">Portátil 14"<br>A314-22-R1C8</span>
              <div class="precio">1.500.000</div>
            </div>
          </div>
        </div>
      </div>
      <hr class="featurette-divider">

      <h3 class="mt-3 mb-3">Celulares</h3>
      <div class="row">
        <div class="col-6">
          <div class="card p-3 bg-card-xl">
            <div class="row g-0">
              <div class="col-md-6 mt-5 text-center">
                <img src="img/Computadores/logo_asus.svg" alt="" width="80%" height="20%">
                <div class="mt-3 mb-3">
                  <span class="m-0">Portátil 14"<br>A314-22-R1C8</span>
                </div>
                <div class="label">
                  <span>24%</span>
                  <div>Dcto</div>
                </div>
                <div class="precio">1.500.000</div>
              </div>
              <div class="col-md-6 text-center">
                <div class="card-body">
                  <img src="img/Computadores/4711081078869.png" class="img-fluid rounded-start mx-auto" alt="...">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card p-3 bg-card-xm">
            <div class="row text-center">
              <img src="img/Computadores/acer.png" class="card-img-top" alt="..." width="66%" height="33%">
              <img src="img/Computadores/acer-green.svg" alt="" width="33%" height="6%">
              <span class="m-0">Portátil 14"<br>A314-22-R1C8</span>
              <div class="precio">1.500.000</div>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card p-3 bg-card-xm">
            <div class="row text-center">
              <img src="img/Computadores/acer.png" class="card-img-top" alt="..." width="66%" height="33%">
              <img src="img/Computadores/acer-green.svg" alt="" width="33%" height="6%">
              <span class="m-0">Portátil 14"<br>A314-22-R1C8</span>
              <div class="precio">1.500.000</div>
            </div>
          </div>
        </div>
      </div>
      <hr class="featurette-divider">

      <h3 class="mt-3 mb-3">Audio</h3>
      <div class="row">
        <div class="col-6">
          <div class="card p-3 bg-card-xl">
            <div class="row g-0">
              <div class="col-md-6 mt-5 text-center">
                <img src="img/Computadores/logo_asus.svg" alt="" width="80%" height="20%">
                <div class="mt-3 mb-3">
                  <span class="m-0">Portátil 14"<br>A314-22-R1C8</span>
                </div>
                <div class="label">
                  <span>24%</span>
                  <div>Dcto</div>
                </div>
                <div class="precio">1.500.000</div>
              </div>
              <div class="col-md-6 text-center">
                <div class="card-body">
                  <img src="img/Computadores/4711081078869.png" class="img-fluid rounded-start mx-auto" alt="...">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card p-3 bg-card-xm">
            <div class="row text-center">
              <img src="img/Computadores/acer.png" class="card-img-top" alt="..." width="66%" height="33%">
              <img src="img/Computadores/acer-green.svg" alt="" width="33%" height="6%">
              <span class="m-0">Portátil 14"<br>A314-22-R1C8</span>
              <div class="precio">1.500.000</div>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card p-3 bg-card-xm">
            <div class="row text-center">
              <img src="img/Computadores/acer.png" class="card-img-top" alt="..." width="66%" height="33%">
              <img src="img/Computadores/acer-green.svg" alt="" width="33%" height="6%">
              <span class="m-0">Portátil 14"<br>A314-22-R1C8</span>
              <div class="precio">1.500.000</div>
            </div>
          </div>
        </div>
      </div>
      <hr class="featurette-divider">

      <h3 class="mt-3 mb-3">Video</h3>
      <div class="row">
        <div class="col-6">
          <div class="card p-3 bg-card-xl">
            <div class="row g-0">
              <div class="col-md-6 mt-5 text-center">
                <img src="img/Computadores/logo_asus.svg" alt="" width="80%" height="20%">
                <div class="mt-3 mb-3">
                  <span class="m-0">Portátil 14"<br>A314-22-R1C8</span>
                </div>
                <div class="label">
                  <span>24%</span>
                  <div>Dcto</div>
                </div>
                <div class="precio">1.500.000</div>
              </div>
              <div class="col-md-6 text-center">
                <div class="card-body">
                  <img src="img/Computadores/4711081078869.png" class="img-fluid rounded-start mx-auto" alt="...">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card p-3 bg-card-xm">
            <div class="row text-center">
              <img src="img/Computadores/acer.png" class="card-img-top" alt="..." width="66%" height="33%">
              <img src="img/Computadores/acer-green.svg" alt="" width="33%" height="6%">
              <span class="m-0">Portátil 14"<br>A314-22-R1C8</span>
              <div class="precio">1.500.000</div>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card p-3 bg-card-xm">
            <div class="row text-center">
              <img src="img/Computadores/acer.png" class="card-img-top" alt="..." width="66%" height="33%">
              <img src="img/Computadores/acer-green.svg" alt="" width="33%" height="6%">
              <span class="m-0">Portátil 14"<br>A314-22-R1C8</span>
              <div class="precio">1.500.000</div>
            </div>
          </div>
        </div>
      </div>
      <hr class="featurette-divider">
      <!-- /END THE FEATURETTES -->
      <h3 class="mt-3 mb-3">Tecno Hogar</h3>
      <div class="row">
        <div class="col-6">
          <div class="card p-3 bg-card-xl">
            <div class="row g-0">
              <div class="col-md-6 mt-5 text-center">
                <img src="img/Computadores/logo_asus.svg" alt="" width="80%" height="20%">
                <div class="mt-3 mb-3">
                  <span class="m-0">Portátil 14"<br>A314-22-R1C8</span>
                </div>
                <div class="label">
                  <span>24%</span>
                  <div>Dcto</div>
                </div>
                <div class="precio">1.500.000</div>
              </div>
              <div class="col-md-6 text-center">
                <div class="card-body">
                  <img src="img/Computadores/4711081078869.png" class="img-fluid rounded-start mx-auto" alt="...">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card p-3 bg-card-xm">
            <div class="row text-center">
              <img src="img/Computadores/acer.png" class="card-img-top" alt="..." width="66%" height="33%">
              <img src="img/Computadores/acer-green.svg" alt="" width="33%" height="6%">
              <span class="m-0">Portátil 14"<br>A314-22-R1C8</span>
              <div class="precio">1.500.000</div>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card p-3 bg-card-xm">
            <div class="row text-center">
              <img src="img/Computadores/acer.png" class="card-img-top" alt="..." width="66%" height="33%">
              <img src="img/Computadores/acer-green.svg" alt="" width="33%" height="6%">
              <span class="m-0">Portátil 14"<br>A314-22-R1C8</span>
              <div class="precio">1.500.000</div>
            </div>
          </div>
        </div>
      </div>
      <hr class="featurette-divider">
    </div><!-- /.container -->
  </main>
  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; 2017–2021 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
  <script src="bootstrap-5/js/bootstrap.bundle.min.js"></script>
</body>

</html>