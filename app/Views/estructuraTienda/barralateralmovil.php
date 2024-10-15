        <!-- Off-Canvas Mobile Menu-->
    <div class="offcanvas-container" id="mobile-menu"><a class="account-link" href="#">
        <div class="user-info">
          <h6 class="user-name"><?= session('nombre')?></h6>
          <span class="text-xs text-muted"><?= session('correo')?></span>
        </div></a>
      <nav class="offcanvas-menu">
      <ul class="menu">
          <?php if(isset($lista2)){
            foreach($lista2 as $row){?>
              <li class="has-children"><span><a href="<?=base_url()?>tienda/filtroCategoria?categoria=<?=$row->nombre?>"><?=$row->nombre?></a></span></li>
          <?php }} ?>

        </ul>
      </nav>
    </div>