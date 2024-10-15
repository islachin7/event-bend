

  <?php 
 echo view("estructuraDashboard/cabecera");
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>plantilla/customizer/personalizado.css">

<?php 
 echo view("estructuraDashboard/barraLateralDashboard");
?>

<button id="errorsito" data-toast data-toast-type="danger" data-toast-position="topRight" data-toast-icon="fas fa-times" data-toast-title="Error" data-toast-message="al registrar" hidden="true">
</button>

    <div class="modal fade" id="modalprueba" tabindex="-1">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">           
            <h4 class="modal-title">Crear Nueva Categoria</h4>
            <button id="cerr" class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">

        <form enctype="multipart/form-data" id="fupForm" >
        <div class="row">

          <!-- Product Info-->
          <div class="col-md-12">
            <div class="row">

              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="reg-email">Nombre</label>
                  <input class="form-control" type="text" id="nombre" name="nombre" required="" autocomplete="off">
                </div>
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-8 py-1 text-center">
                <div class="form-group">
                  <label for="imagen1" class="btn btn-secondary">
                  <i class="icon-cloud-upload"></i> Subir archivo 1 (Principal)
                  </label>
                  <input id="imagen1" type="file" name="imagen1" style='display: none;'/>
                </div>
              </div>
              <div class="col-sm-2"></div>

              <div class="col-sm-2"></div>
              <div class="col-sm-8 text-center">
                <div class="form-group">
                  <label for="imagen2" class="btn btn-secondary">
                  <i class="icon-cloud-upload"></i> Subir archivo 2
                  </label>
                  <input id="imagen2" type="file" name="imagen2" style='display: none;'/>
                </div>
              </div>
              <div class="col-sm-2"></div>

              <div class="col-sm-2"></div>
              <div class="col-sm-8 text-center">
                <div class="form-group">
                  <label for="imagen3" class="btn btn-secondary">
                  <i class="icon-cloud-upload"></i> Subir archivo 3
                  </label>
                  <input id="imagen3" type="file" name="imagen3" style='display: none;'/>
                </div>
              </div>
              <div class="col-sm-2"></div>

              <div class="col-sm-12">
                <div class="grid-container text-center">
                  <div class="caja1">
                    <div id="info1"></div>
                  </div>

                  <div class="caja2">
                    <div id="info2"></div>
                  </div>

                  <div class="caja3">
                    <div id="info3"></div>
                  </div>
                </div>
              </div>

              <?= csrf_field() ?>


            </div>
            <hr class="mb-3">
            <div class="d-flex flex-wrap justify-content-center">
              <div class="sp-buttons mt-2 mb-2 text-center">
                <button class="btn btn-warning text-center" id="agregar" >Guardar</button>
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
        <h2>Lista de Categorias</h2>
        <button id='btnnue' onclick="limpiarModal();" class="btn btn-outline-success" data-toggle="modal" data-target="#modalprueba">Nuevo</button>

        <!-- Top Categories-->
        <section class="container">
          <div id="resultado" class="row justify-content-center">
            <?php  if (isset($lista)): ?>
              <?php foreach ($lista as $row){ ?>
                <div class="col-md-4 col-sm-6">
                  <div class="card mb-30">
                    <a class="card-img-tiles" href="shop-grid-ls.html">
                      <div class="inner">
                        <div class="main-img">
                          <img src="<?=base_url()?>plantilla/img/categorias/<?=$row->imagen1?>" alt="Category">
                        </div>
                        <div class="thumblist">
                          <img src="<?=base_url()?>plantilla/img/categorias/<?=$row->imagen2?>" alt="Category">
                          <img src="<?=base_url()?>plantilla/img/categorias/<?=$row->imagen3?>" alt="Category">
                        </div>
                      </div>
                    </a>
                    <div class="card-body text-center">
                      <h4 class="card-title"><?php echo $row->nombre; ?></h4>
                      <a class="btn btn-outline-primary">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="btn btn-outline-danger">
                        <i class="fas fa-trash-alt"></i>
                      </a>
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
                                $('#info1').html("<img class='elimIma' src='"+e.target.result+"'/>");
                              }
                              reader.readAsDataURL(input.files[0]);
                            }
                          }
                          $('#imagen1').change(function(){
                            filePreview(this);
                          });
                        })();

                        (function(){
                          function filePreview(input){
                            if(input.files && input.files[0]){
                              var reader = new FileReader();
                              reader.onload = function(e){
                                $('#info2').html("<img class='elimIma' src='"+e.target.result+"'/>");
                              }
                              reader.readAsDataURL(input.files[0]);
                            }
                          }
                          $('#imagen2').change(function(){
                            filePreview(this);
                          });
                        })();

                        (function(){
                          function filePreview(input){
                            if(input.files && input.files[0]){
                              var reader = new FileReader();
                              reader.onload = function(e){
                                $('#info3').html("<img class='elimIma' src='"+e.target.result+"'/>");
                              }
                              reader.readAsDataURL(input.files[0]);
                            }
                          }
                          $('#imagen3').change(function(){
                            filePreview(this);
                          });
                        })();
</script>

<script>
$(document).ready(function(e){
  var base_url = '<?php  echo base_url(); ?>';
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: base_url + 'categoria/nuevaCategoria',
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData:false,
            success: function(resp){   
              $("#resultado").html('');     
              $("#resultado").html(resp);
              $("#cerr").click();
              $("#nombre").val('');
              $("#imagen1").val('');
              $("#imagen2").val('');
              $("#imagen3").val('');
              $(".elimIma").remove();
            }
        });
    });
 });


</script>

<script>

    function limpiarModal(){
      $("#nombre").val('');
      $("#imagen1").val('');
      $("#imagen2").val('');
      $("#imagen3").val('');
      $(".elimIma").remove();
    }

</script>


  <?php 
 echo view("estructuraDashboard/footer");
?>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

       <script type="text/javascript">

       $(document).ready(function() {

     $('#peass').DataTable({
     //para cambiar el lenguaje a español

         "language": {
                 "lengthMenu": "Mostrar _MENU_ registros",
                 "zeroRecords": "No se encontraron resultados",
                 "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                 "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                 "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                 "sSearch": "Buscar:",
                 "oPaginate": {
                     "sFirst": "Primero",
                     "sLast":"Último",
                     "sNext":">>",
                     "sPrevious": "<<"
            },
            "sProcessing":"Procesando...",
             }

     });

 });

       </script>

  </body>
</html>
