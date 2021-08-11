<!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ Mobile header ] start -->
<div class="pc-mob-header pc-header">
  <div class="pcm-logo">
    <img src="assets/images/logo.svg" alt="" class="logo logo-lg">
  </div>
  <div class="pcm-toolbar">
    <a href="#!" class="pc-head-link" id="mobile-collapse">
      <div class="hamburger hamburger--arrowturn">
        <div class="hamburger-box">
          <div class="hamburger-inner"></div>
        </div>
      </div>
    </a>
    <a href="#!" class="pc-head-link" id="headerdrp-collapse">
      <i data-feather="align-right"></i>
    </a>
    <a href="#!" class="pc-head-link" id="header-collapse">
      <i data-feather="more-vertical"></i>
    </a>
  </div>
</div>
<!-- [ Mobile header ] End -->

<!-- [ navigation menu ] start -->
<nav class="pc-sidebar ">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="admin.php" class="b-brand">
        <!-- ========   change your logo hear   ============ -->
        <img src="img/log.png" alt="" class="logo logo-lg" style="width: 200px;">
        <img src="assets/images/logo-sm.svg" alt="" class="logo logo-sm">
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item" onclick="loadData('Product','consult')">
          <a class="pc-link"><span class="pc-micon"><i class="material-icons-two-tone">bubble_chart</i></span><span class="pc-mtext">Productos</span></a>
        </li>
        <li class="pc-item" onclick="loadData('Provider','consult')">
          <a class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">history_edu</i></span><span class="pc-mtext">Proveedores</span></a>
        </li>
        <li class="pc-item" onclick="loadData('Customer','consult')">
          <a class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">history_edu</i></span><span class="pc-mtext">Clientes</span></a>
        </li>
        
        <li class="pc-item pc-caption">
          <label>Panel De Control</label>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">edit</i></span><span class="pc-mtext">Configuración</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item" onclick="loadData('Category','consult')"><a class="pc-link">Categoria</a></li>
            <li class="pc-item" onclick="loadData('CategorySub','consult')"><a class="pc-link">SubCategoria</a></li>
            <li class="pc-item" onclick="loadData('SpecificationType','consult')"><a class="pc-link">Tipo Especificación</a></li>
            <li class="pc-item" onclick="loadData('Specification','consult')"><a class="pc-link">Especificación</a></li>
            <li class="pc-item" onclick="loadData('Mark','consult')"><a class="pc-link">Marca</a></li>
            <li class="pc-item" onclick="loadData('Role','consult')"><a class="pc-link">Rol</a></li>
            <li class="pc-item" onclick="loadData('Status','consult')"><a class="pc-link">Estado</a></li>
            <li class="pc-item" onclick="loadData('User','consult')"><a class="pc-link">Usuario</a></li>
            <li class="pc-item" onclick="loadData('City','consult')"><a class="pc-link">Ciudad</a></li>
            <li class="pc-item" onclick="loadData('Department','consult')"><a class="pc-link">Departamento</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- [ navigation menu ] end -->