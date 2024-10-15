<?php 
 echo view("estructuraDashboard/cabecera");
 echo view("estructuraDashboard/barraLateralDashboard");
 echo view("estructuraDashboard/navbar");
?>
      <section class="container padding-top-3x padding-bottom-3x">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10 console-log">
            <div class="padding-top-3x hidden-md-up"></div>
            <h3 class="margin-bottom-1x">Registro de Productos</h3>
            <p>Llene todos los campos con la información requerida.</p>
            <form class="row" method="post" enctype="multipart/form-data" action="<?= base_url() ?>producto/registroProducto">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-fn">Nombre del Producto</label>
                  <input class="form-control" type="text" id="reg-fn" name="nombre" required>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="reg-email">Precio</label>
                  <input class="form-control" type="text" id="reg-email" name="precio" required>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="reg-email">Descuento (opcional)</label>
                  <input class="form-control" type="number" id="reg-email" name="descuento">
                </div>
              </div>
               <div class="col-sm-3">
                <div class="form-group">
                  <label for="reg-ln">Marca</label>
                  <select class="form-control" name="marca" required="">
                    <?php  if (isset($lista2)): ?>
                    <?php foreach ($lista2 as $row){ ?>
                      <option value="<?=$row->id?>"><?=$row->nombre?></option>
                  <?php } ?>
                  <?php endif; ?>
                  </select>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="reg-ln">Categoria</label>
                  <select class="form-control" name="categoria" required="">
                    <?php  if (isset($lista1)): ?>
                    <?php foreach ($lista1 as $row){ ?>
                      <option value="<?=$row->id?>"><?=$row->nombre?></option>
                  <?php } ?>
                  <?php endif; ?>                    
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-ln">Detalle del Producto</label>
                  <textarea class="form-control" name="detalle" required onkeyup="contar(this)" onkeydown="contar(this)" maxlength="500"></textarea>
                  <div class="text-right">
                    <span id="cont_palabras">0/500</span>
                  </div>
                </div>
              </div>

              <div class="col-sm-3 py-4 text-center">
                <div class="form-group">
                  <label for="imagen" class="btn btn-secondary">
                      <i class="icon-cloud-upload"></i> Subir archivo
                  </label>
                  <input id="imagen" type="file" name="archivo" style='display: none;'/>
	
                </div>
              </div>

              <div class="col-sm-2 col-md-3">
                <div id="info"></div>
              </div>
              <div class="col-sm-1">
              </div>

              <?= csrf_field() ?>

              <?php if (isset($validation)): ?>
                <div class="col-sm-12">
                  <div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x">
                   <?= $validation->listErrors() ?>
                  </div>
                </div>
              <?php endif; ?>

              <div class="col-1"></div>

              <div class="col-2 text-center text-sm-right py-4">
                <input class="btn btn-warning margin-bottom-none" type="submit" value="Registrar">
              </div>
              <div class="col-9"></div>
            </form>
          </div>
          <div class="col-md-1"></div>
        </div>

        </section>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        function filePreview(input){
          console.log(input.files)
          console.log(input.files[0])
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
    </script>

    <script type="text/javascript">
      function contar(valor){
        let cant = valor.value.length;
        $("#cont_palabras").html(cant + "/500");
      }
    </script>


<?php 
 echo view("estructuraDashboard/footer");
?>