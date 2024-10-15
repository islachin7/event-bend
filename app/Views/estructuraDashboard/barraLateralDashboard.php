    <!-- Off-Canvas Category Menu   BARRA LATERAL-->
    <div class="offcanvas-container" id="shop-categories">

      <div class="offcanvas-header">

        <h3 class="offcanvas-title"><?= session('nombre')?></h3>
        <h3 class="offcanvas-title"><?= session('correo')?></h3>
      </div>
      <nav class="offcanvas-menu">
        <ul class="menu">
          <li class="has-children"><span><a href="<?= base_url() ?>dashboard"> <i class="fas fa-home"></i> Panel</a></span>
          </li>
          <li class="has-children"><span><a href="<?= base_url() ?>tienda"> <i class="fas fa-store-alt"></i> Tienda</a></span>
          </li>
          <li class="has-children"><span><a href="<?= base_url() ?>usuario"><i class="fas fa-users"></i> Usuarios</a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <li><a href="<?= base_url() ?>usuario">Lista</a></li>
              <li><a href="#">Nuevo</a></li>
            </ul>
          </li>
          <li class="has-children"><span><a href="<?=base_url()?>producto"><i class="fas fa-tshirt"></i> Productos</a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <li><a href="<?=base_url()?>producto">Lista</a></li>
              <li><a href="#">Nuevo</a></li>
            </ul>
          </li>
          <li class="has-children"><span><a href="<?= base_url() ?>categoria"><i class="fas fa-chart-pie"></i> Categorias</a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <li><a href="<?= base_url() ?>categoria">Lista</a></li>
              <li><a href="#">Nuevo</a></li>
            </ul>
          </li>
          <li class="has-children"><span><a href="<?= base_url() ?>marca"><i class="fas fa-tag"></i> Marcas</a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <li><a href="<?= base_url() ?>marca">Lista</a></li>
              <li><a href="#">Nuevo</a></li>
            </ul>
          </li>
          <li class="has-children"><span><a href="<?= base_url() ?>carrusel"><i class="fas fa-sliders-h"></i> Carrusel</a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <li><a href="<?= base_url() ?>carrusel">Lista</a></li>
              <li><a href="#">Nuevo</a></li>
            </ul>
          </li>
          <li class="has-children"><span><a href="#"> <i class="fas fa-shopping-cart"></i> Ventas</a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <li><a href="#">Lista</a></li>
              <li><a href="#">Nuevo</a></li>
            </ul>
          </li>
      
          <li class="has-children"><span><a href="<?= base_url() ?>auth/logout"><i class="fas fa-sign-out-alt"></i> Salir</a></span>
          </li>
        </ul>
      </nav>
    </div>
    <!-- Off-Canvas Mobile Menu-->
    <div class="offcanvas-container" id="mobile-menu">
      <div class="offcanvas-header">

        <h3 class="offcanvas-title"><?= session('nombre')?></h3>
        <h3 class="offcanvas-title"><?= session('correo')?></h3>
      </div>
      <nav class="offcanvas-menu">

      <ul class="menu">
          <li class="has-children"><span><a href="<?= base_url() ?>dashboard"> <i class="fas fa-home"></i> Panel</a></span>
          </li>
          <li class="has-children"><span><a href="<?= base_url() ?>tienda"> <i class="fas fa-store-alt"></i> Tienda</a></span>
          </li>
          <li class="has-children"><span><a href="<?= base_url() ?>usuario"><i class="fas fa-users"></i> Usuarios</a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <li><a href="<?= base_url() ?>usuario">Lista</a></li>
              <li><a href="#">Nuevo</a></li>
            </ul>
          </li>
          <li class="has-children"><span><a href="<?=base_url()?>producto"><i class="fas fa-tshirt"></i> Productos</a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <li><a href="<?=base_url()?>producto">Lista</a></li>
              <li><a href="#">Nuevo</a></li>
            </ul>
          </li>
          <li class="has-children"><span><a href="<?= base_url() ?>categoria"><i class="fas fa-chart-pie"></i> Categorias</a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <li><a href="<?= base_url() ?>categoria">Lista</a></li>
              <li><a href="#">Nuevo</a></li>
            </ul>
          </li>
          <li class="has-children"><span><a href="<?= base_url() ?>marca"><i class="fas fa-tag"></i> Marcas</a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <li><a href="<?= base_url() ?>marca">Lista</a></li>
              <li><a href="#">Nuevo</a></li>
            </ul>
          </li>
          <li class="has-children"><span><a href="<?= base_url() ?>carrusel"><i class="fas fa-sliders-h"></i> Carrusel</a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <li><a href="<?= base_url() ?>carrusel">Lista</a></li>
              <li><a href="#">Nuevo</a></li>
            </ul>
          </li>
          <li class="has-children"><span><a href="#"> <i class="fas fa-shopping-cart"></i> Ventas</a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <li><a href="#">Lista</a></li>
              <li><a href="#">Nuevo</a></li>
            </ul>
          </li>
      
          <li class="has-children"><span><a href="<?= base_url() ?>auth/logout"><i class="fas fa-sign-out-alt"></i> Salir</a></span>
          </li>
        </ul>
        
      </nav>
    </div>