<div class="container bg-dark">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 ">
    <a href="index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 p-2 text-dark text-decoration-none">
      <img src="img/log.png" alt="" width="200px" height="50px">
    </a>
    <div class="col-md-3 text-end me-3  text-white">

      <?php
      if (isset($_SESSION['id'])) {
        echo "<div class='cart border-end me-1 link' onclick='getCart()'>
                      <span class='counter' id='counter'>" . $_SESSION['cart'] . "</span>
                      <img class='me-2' src='img/cart.png' alt='' width='50px' height='50px'>
                </div>";

        echo "<img class='me-2' src='img/usuario.png' alt='' width='50px' height='50px'>";
        echo "<span class='me-2 link' id='dropdownMenu2' data-bs-toggle='dropdown' aria-expanded='false'>" . $_SESSION['nombre'] . " " . $_SESSION['apellido'] . "</span>";
      } else {
        echo  "<a href='login.php'><button type='button' class='btn nav-sup text-white me-2'>Inicia Sesión</button></a>";
      }

      ?>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <li><button class="dropdown-item" type="button">Mis Pedidos</button></li>
        <li><button class="dropdown-item" type="button">Mi cuenta</button></li>
        <li><a href="<?php echo getUrl("Auth","Auth","cerrarSesion",false,"ajax")?>"><button class="dropdown-item" type="button">Cerrar Sesión</button></a></li>
      </ul>
    </div>
  </header>
</div>
<header class="navbar-dark d-flex justify-content-center nav-sup">
  <ul class="nav nav-pills text-white">
    <!-- <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li> -->
    <li class="nav-item" onclick="getProductCat(1)"><a class="nav-link text-white link">Computadores</a></li>
    <li class="nav-item" onclick="getProductCat(2)"><a class="nav-link text-white link">Celulares</a></li>
    <li class="nav-item" onclick="getProductCat(3)"><a class="nav-link text-white link">Audio</a></li>
    <li class="nav-item" onclick="getProductCat(4)"><a class="nav-link text-white link">Video</a></li>
    <li class="nav-item" onclick="getProductCat(5)"><a class="nav-link text-white link">Tecno Hogar</a></li>
  </ul>
</header>