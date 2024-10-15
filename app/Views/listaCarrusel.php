  <?php 
 echo view("estructuraDashboard/cabecera");
?>

<?php 
 echo view("estructuraDashboard/barraLateralDashboard");
?>

<button id="errorsito" data-toast data-toast-type="danger" data-toast-position="topRight" data-toast-icon="fas fa-times" data-toast-title="Error" data-toast-message="al registrar" hidden="true">
</button>

    <div class="modal fade" id="modalprueba" tabindex="-1">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">           
            <h4 class="modal-title">Promocionar nuevo Item</h4>
            <button id="cerr" class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form enctype="multipart/form-data" method="post" action="<?=base_url()?>carrusel/nuevoItem" >
        <div class="row">

          <!-- Product Info-->
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="reg-email">Producto</label>
                  <select class="form-control" name="producto" required="">
                    <option value="nada" selected="">Seleccionar:</option>
                    <?php  if (isset($productos)): ?>
                    <?php foreach ($productos as $row){ ?>
                      <option value="<?=$row->id?>"><?=$row->titulo?></option>
                  <?php } ?>
                  <?php endif; ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="reg-email">Descripción</label>
                  <textarea class="form-control" name="descri"></textarea>
                </div>
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-8 py-4 text-center">
                <div class="form-group">
                  <label for="imagen" class="btn btn-secondary">
                  <i class="icon-cloud-upload"></i> Subir Imagen Promocional
                  </label>
                  <input id="imagen" type="file" name="imagen" style='display: none;'/>
                </div>
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-8 text-center">
                <div id="info"></div>
              </div>
              <div class="col-sm-2"></div>
            </div>
            <hr class="mb-3">
            <div class="d-flex flex-wrap justify-content-center">
              <div class="sp-buttons mt-2 mb-2 text-center">
                <input type="submit" class="btn btn-warning text-center" value="Guardar">
              </div>
            </div>
          </div>
        </div>
          </form>

          </div>
        </div>
      </div>
    </div>

  <?php 
 echo view("estructuraDashboard/navbar");
?>



      <section class="container padding-top-3x padding-bottom-3x">
        <h2>Carrusel en Vivo</h2>
        <button class="btn btn-outline-warning" data-toggle="modal" data-target="#modalprueba">Nuevo</button>
      	
      	<!-- Main Slider-->
      <section class="hero-slider console-log" style="background-image: url(<?=base_url()?>plantilla/img/hero-slider/fondomain_03.jpg);">
        <div class="owl-carousel large-controls dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">

          <?php  if (isset($lista)): ?>
                    <?php foreach ($lista as $row){ ?>
          <div class="item">
            <div class="container padding-top-3x">
              <div class="row justify-content-center align-items-center">
                <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                  <div class="from-bottom"><img class="d-inline-block w-150 mb-4" src="<?=base_url()?>plantilla/img/marcas/<?=$row->imagenMarca?>" alt="<?=$row->imagenMarca?>">
                    <div class="h2 text-body text-normal mb-2 pt-1"><?=$row->descripcion?></div>
                    <div class="h2 text-body text-normal mb-4 pb-1">Por solo <span class="text-bold">S/<?=$row->precio?></span></div>
                  </div>
                  <a class="btn btn-primary scale-up delay-1" href="shop-grid-ls.html">Editar</a>
                  <a class="btn btn-danger scale-up delay-1" href="shop-grid-ls.html">Eliminar</a>
                </div>
                <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto" src="<?=base_url()?>plantilla/img/carrusel/<?=$row->imagen?>" alt="<?=$row->imagen?>"></div>
              </div>
            </div>
          </div>
                  <?php } ?>
          <?php endif; ?>

        </div>
      </section>
      </section>



<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 <script type="text/javascript">
                        (function(){
                          function filePreview(input){
                            if(input.files && input.files[0]){
                              var reader = new FileReader();
                              reader.onload = function(e){
                                $('#info').html("<img src='"+e.target.result+"'/>");
                              }
                              reader.readAsDataURL(input.files[0]);
                            }
                          }
                          $('#imagen').change(function(){
                            filePreview(this);
                          });
                        })();
</script>



  <?php 
 echo view("estructuraDashboard/footer");
?>


  </body>
</html>