    <!-- Shop Filters Modal-->
    <div class="modal fade" id="modalprueba" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">           
            <h4 class="modal-title" id="prosss"></h4>
            <button id="cerr" class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">

        <div class="row">
          <!-- Poduct Gallery-->
          <div class="col-md-6 d-flex justify-content-center py-5" style="width: 100%; height: 100%;">
            <img id="imagita" src="<?= base_url() ?>plantilla/img/loading.gif" width="100%" style="height: 100%;">
          </div>
          <!-- Product Info-->
          <div class="col-md-6">
            <div class="padding-top-2x mt-2 hidden-md-up"></div>
            <h2 class="padding-top-1x text-normal text-center" id="titu" ></h2>
            <span class="h2 d-block text-center" id="preci"></span>
            <p id="desxx" class="text-center"></p>
            
            <div class="row margin-top-1x">
              <div class="col-sm-4"></div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="reg-email">Cantidad</label>
                  <input class="form-control" type="number" id="vacant" name="cantidad" required>
                </div>
              </div>
              <div class="col-sm-4"></div>
            </div>
            <div class="mb-2"><span class="text-medium">Categoria:&nbsp;</span><a class="navi-link" id="catego" href="<?=base_url()?>tienda">Cargando...</a></div>
            <div class="padding-bottom-1x mb-1"><span class="text-medium">Marca:&nbsp;</span><a class="navi-link" id="marc" href="<?=base_url()?>tienda">Cargando.....</a></div>
            <hr class="mb-3">
            <div class="d-flex flex-wrap justify-content-center">
              <!--<div class="entry-share mt-2 mb-2"><span class="text-muted">Share:</span>
                <div class="share-links"><a class="social-button shape-circle sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google +"><i class="socicon-googleplus"></i></a></div>
              </div>-->
              <div class="sp-buttons mt-2 mb-2 text-center">
                <button class="btn btn-warning text-center aggre" ><i class="icon-bag"></i> Añadir</button>
              </div>
            </div>
          </div>
        </div>



          </div>
        </div>
      </div>
    </div>

