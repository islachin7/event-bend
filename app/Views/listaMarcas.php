

  <?php 
 echo view("estructuraDashboard/cabecera");
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"/>

<style>

.pagination{display:flex;padding-left:0;list-style:none}

.page-link{position:relative;display:block;color:#0d6efd;text-decoration:none;background-color:#fff;border:1px solid #dee2e6;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out}@media (prefers-reduced-motion:reduce){

.page-link{transition:none}}

.page-link:hover{z-index:2;color:#0a58ca;background-color:#e9ecef;border-color:#dee2e6}

.page-link:focus{z-index:3;color:#0a58ca;background-color:#e9ecef;outline:0;box-shadow:0 0 0 .25rem rgba(13,110,253,.25)}

.page-item:not(:first-child) .page-link{margin-left:-1px}

.page-item.active .page-link{z-index:3;color:#fff;background-color:#0d6efd;border-color:#0d6efd}

.page-item.disabled .page-link{color:#6c757d;pointer-events:none;background-color:#fff;border-color:#dee2e6}

.page-link{padding:.375rem .75rem}

.page-item:first-child .page-link{border-top-left-radius:.25rem;border-bottom-left-radius:.25rem}

.page-item:last-child .page-link{border-top-right-radius:.25rem;border-bottom-right-radius:.25rem}


</style>

  <?php 
 echo view("estructuraDashboard/barraLateralDashboard");
?>

<button id="errorsito" data-toast data-toast-type="danger" data-toast-position="topRight" data-toast-icon="fas fa-times" data-toast-title="Error" data-toast-message="al registrar" hidden="true">
</button>

    <div class="modal fade" id="modalprueba" tabindex="-1">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">           
            <h4 class="modal-title">Crear Nueva Marca</h4>
            <button id="cerr" class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form enctype="multipart/form-data" id="fupForm">
        <div class="row">

          <!-- Product Info-->
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="reg-email">Nombre</label>
                  <input class="form-control" type="text" id="nombre" name="nombre" required>
                </div>
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-8 py-4 text-center">
                <div class="form-group">
                  <label for="imagen" class="btn btn-secondary">
                  <i class="icon-cloud-upload"></i> Subir archivo
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
              <div class="sp-buttons mt-2 mb-2 text-center"></div>
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
        <h2>Lista de Marcas</h2>
        <button class="btn btn-outline-warning" data-toggle="modal" data-target="#modalprueba">Nuevo</button>
      	
      	<table class="table-responsive table table-hover console-log" id="peass">
                <thead class="thead-inverse">

                  <tr>
                    <th width="300">Nombre</th>
                    <th class="text-center" width="600">Imagen</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Eliminar</th>
                  </tr>
                </thead>
                <tbody id="tabla">
                  <?php  if (isset($lista)): ?>
                    <?php foreach ($lista as $row){ ?>
                  <tr>
                    <th class="align-middle"><?php echo $row->nombre; ?></th>
                    <td class="align-middle">
                      <div style="width: 100%; min-width: 70px; min-height: 70px; height: auto;text-align:center;">
                        <img src="<?=base_url()?>plantilla/img/marcas/<?=$row->imagenMarca?>" class="" alt="carga incompleta">
                      </div>
                    </td>
                    <td class="align-middle text-center"><a class="btn btn-outline-primary">
                      <i class="fas fa-edit"></i>
                    </a></td>
                    <td class="align-middle text-center"><a class="btn btn-outline-danger">
                      <i class="fas fa-trash-alt"></i>
                    </a></td>
                  </tr>
                  <?php } ?>
                  <?php endif; ?>
                </tbody>
              </table>
      </section>



<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 <script type="text/javascript">
                        (function(){
                          function filePreview(input){
                            if(input.files && input.files[0]){
                              var reader = new FileReader();
                              reader.onload = function(e){
                                $('#info').html("<img class='elimIma' src='"+e.target.result+"'/>");
                              }
                              reader.readAsDataURL(input.files[0]);
                            }
                          }
                          $('#imagen').change(function(){
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
            url: base_url + '/marca/nuevaMarca',
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData:false,
            success: function(resp){        
              $("#tabla").html(resp);
              $("#cerr").click();
              $("#nombre").val('');
              $("#imagen").val('');
              $(".elimIma").remove();
            }
        });
    });
 });

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