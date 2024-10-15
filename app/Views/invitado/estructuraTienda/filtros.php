          <style type="text/css">
            .widget-categories ul>li>a:hover, .widget-links ul>li>a:hover {
    color: #ff914d;
          </style>
          <div class="col-xl-3 col-lg-4 order-lg-1">
            <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters"><i class="icon-layout"></i></button>
            <aside class="sidebar sidebar-offcanvas">
              <!-- Widget Categories-->

              <section class="widget widget-categories">
                <h3 class="widget-title">Categorias</h3>

                  <?php  if (isset($lista2)): ?>
                   <ul>
                        <?php 
                          $db = \Config\Database::connect();
                          $query = $db->query('SELECT * FROM productos p INNER JOIN categoria c on p.categoria = c.id WHERE p.mostrar=1');
                          $results = $query->getResult();
                        ?>
                    <li class="has-children expanded"><a href="<?=base_url()?>invitado">Todas</a><span>(<?=count($results)?>)</span>
                      <ul>
                    <?php foreach ($lista2 as $row){ ?>
                      <li class="has-children"><a href="<?=base_url()?>invitado/filtroCategoria?categoria=<?=$row->nombre?>"><?=$row->nombre?></a>
                        <?php 
                          $query2 = $db->query('SELECT * FROM productos p INNER JOIN categoria c on p.categoria = c.id WHERE p.mostrar=1 AND c.id='.$row->id);
                          $results2 = $query2->getResult();
                        ?>
                        <span>(<?=count($results2)?>)</span></li>
                  <?php } ?>
                  <?php endif; ?>
                     </ul>
                  </li>
                </ul>

              </section>


              <!-- Widget Price Range-->
              <section class="widget widget-categories">
                <h3 class="widget-title">Rango de Precio</h3>
                <form action="<?=base_url()?>invitado/filtroRangoPrecio" class="price-range-slider" method="get" data-start-min="10" data-start-max="100" data-min="10" data-max="200" data-step="1">
                  <div class="ui-range-slider"></div>
                  <footer class="ui-range-slider-footer">
                    <div class="column">
                      <button class="btn btn-outline-warning btn-sm" type="submit">Filtrar</button>
                    </div>
                    <div class="column">
                      <div class="ui-range-values">
                        <div class="ui-range-value-min">S/<span></span>
                          <input type="hidden" name="precio-min">
                        </div>&nbsp;-&nbsp;
                        <div class="ui-range-value-max">S/<span></span>
                          <input type="hidden" name="precio-max">
                        </div>
                      </div>
                    </div>
                  </footer>
                </form>
              </section>
              <!-- Widget Brand Filter-->
              <form method="" action="">
              <section class="widget widget-categories">
                <h3 class="widget-title">Filtrar por Marca</h3>


                <?php  if (isset($lista3)): ?>
                   <ul>
                        <?php 
                          $db = \Config\Database::connect();
                          $query = $db->query('SELECT * FROM productos p INNER JOIN marca m on p.marca = m.id WHERE p.mostrar=1');
                          $results = $query->getResult();
                        ?>
                    <li class="has-children expanded"><a href="<?=base_url()?>invitado">Todas</a><span>(<?=count($results)?>)</span>
                      <ul>
                    <?php foreach ($lista3 as $row){ ?>
                      <li class="has-children"><a href="<?=base_url()?>invitado/filtroMarca?marca=<?=$row->nombre?>"><?=$row->nombre?></a>
                        <?php 
                          $query2 = $db->query('SELECT * FROM productos p INNER JOIN marca m on p.marca = m.id WHERE p.mostrar=1 AND m.id='.$row->id);
                          $results2 = $query2->getResult();
                        ?>
                        <span>(<?=count($results2)?>)</span></li>
                  <?php } ?>
                  <?php endif; ?>
                     </ul>
                  </li>
                </ul>


              </section>
              </form>