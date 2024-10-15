
   <!-- Off-Canvas Category Menu   BARRA LATERAL-->
    <div class="offcanvas-container" id="shop-categories">
      <div class="offcanvas-header">
        <h3 class="offcanvas-title">Categorias</h3>
      </div>
      <nav class="offcanvas-menu">
        <ul class="menu">
          <?php if(isset($lista2)){
            foreach($lista2 as $row){?>
              <li class="has-children"><span><a href="<?=base_url()?>invitado/filtroCategoria?categoria=<?=$row->nombre?>"><?=$row->nombre?></a></span></li>
          <?php }} ?>
          

        </ul>
      </nav>
    </div>