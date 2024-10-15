    <!-- Off-Canvas Category Menu   BARRA LATERAL-->
    <div class="offcanvas-container" id="shop-categories">
      <div class="offcanvas-header">
        <h3 class="offcanvas-title">Categorias</h3>
      </div>
      <nav class="offcanvas-menu">
        <ul class="menu">
          <?php if(isset($categoo)){
            foreach($categoo as $row){?>
              <li class="has-children"><span><a href="<?=base_url()?>invitado/filtroCategoria?categoria=<?=$row->nombre?>"><?=$row->nombre?></a></span></li>
          <?php }} ?>
          

        </ul>
      </nav>
    </div>
    <!-- Off-Canvas Mobile Menu-->
    <div class="offcanvas-container" id="mobile-menu"><a class="account-link" href="<?=base_url()?>home">
        <div class="user-info">
          <h6 class="user-name">Navegación</h6>
        </div></a>
      <nav class="offcanvas-menu">
        <ul class="menu">
          <li class="has-children active"><span><a href="<?=base_url()?>home"><span>INICIO</span></a></span></li>
          <li class="has-children"><span><a href="<?=base_url()?>invitado">TIENDA</a></span></li>
          <li class="has-children"><span><a href="#">QUIENES SOMOS</a></span></li>
          <li class="has-children"><span><a href="<?=base_url()?>auth">LOGIN</a></span></li>


        </ul>
      </nav>
    </div>