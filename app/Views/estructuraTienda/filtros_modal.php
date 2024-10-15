    <!-- Shop Filters Modal-->
    <div class="modal fade" id="modalShopFilters" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Filtros</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <!-- Widget Categories-->
              <section class="widget widget-categories">
                <h3 class="widget-title">Categorias</h3>

                  <?php  if (isset($lista2)): ?>
                   <ul>
                        <?php 
                          $db = \Config\Database::connect();
                          $query = $db->query('SELECT * FROM productos p INNER JOIN categoria c on p.categoria = c.id');
                          $results = $query->getResult();
                        ?>
                    <li class="has-children expanded"><a href="<?=base_url()?>tienda">Todas</a><span>(<?=count($results)?>)</span>
                      <ul>
                    <?php foreach ($lista2 as $row){ ?>
                      <li class="has-children"><a href="<?=base_url()?>tienda/filtroCategoria?categoria=<?=$row->nombre?>"><?=$row->nombre?></a>
                        <?php 
                          $query2 = $db->query('SELECT * FROM productos p INNER JOIN categoria c on p.categoria = c.id WHERE c.id='.$row->id);
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
                <form action="<?=base_url()?>tienda/filtroRangoPrecio" class="price-range-slider" method="get" data-start-min="10" data-start-max="100" data-min="10" data-max="200" data-step="1">
                  <div class="ui-range-slider2"></div>
                  <footer class="ui-range-slider-footer">
                    <div class="column">
                      <button class="btn btn-outline-warning btn-sm" type="submit">Filtrar</button>
                    </div>
                    <div class="column">
                      <div class="ui-range-values">
                        <div class="ui-range-value-min2" style="display: inline-block;font-size: 14px;">S/<span></span>
                          <input type="hidden" name="precio-min">
                        </div>&nbsp;-&nbsp;
                        <div class="ui-range-value-max2" style="display: inline-block;font-size: 14px;">S/<span></span>
                          <input type="hidden" name="precio-max">
                        </div>
                      </div>
                    </div>
                  </footer>
                </form>
              </section>

              
              <!-- Widget Brand Filter-->
              <section class="widget widget-categories">
                <h3 class="widget-title">Filtrar por Marca</h3>


                <?php  if (isset($lista3)): ?>
                   <ul>
                        <?php 
                          $db = \Config\Database::connect();
                          $query = $db->query('SELECT * FROM productos p INNER JOIN marca m on p.marca = m.id');
                          $results = $query->getResult();
                        ?>
                    <li class="has-children expanded"><a href="<?=base_url()?>tienda">Todas</a><span>(<?=count($results)?>)</span>
                      <ul>
                    <?php foreach ($lista3 as $row){ ?>
                      <li class="has-children"><a href="<?=base_url()?>tienda/filtroMarca?marca=<?=$row->nombre?>"><?=$row->nombre?></a>
                        <?php 
                          $query2 = $db->query('SELECT * FROM productos p INNER JOIN marca m on p.marca = m.id WHERE m.id='.$row->id);
                          $results2 = $query2->getResult();
                        ?>
                        <span>(<?=count($results2)?>)</span></li>
                  <?php } ?>
                  <?php endif; ?>
                     </ul>
                  </li>
                </ul>


              </section>