<?php 
 echo view("estructuraDashboard/cabecera");
?>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"/>

<link rel="stylesheet" type="text/css" href="<?=base_url()?>plantilla/css/styles_personalizados.css">

<?php 
 echo view("estructuraTienda/modal");
 echo view("estructuraDashboard/barraLateralDashboard");
 echo view("estructuraDashboard/navbar");
?>


      <section class="container padding-top-3x padding-bottom-3x">
        <h2>Lista de Productos</h2>
        <a class="btn btn-outline-warning mb-4" href="<?= base_url() ?>producto/nuevoProducto">Nuevo</a>
      	

              <table class="table-responsive table table-hover console-log" id="peass">
                <thead class="thead-inverse">

                  <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center" width="200">Descripcion</th>
                    <th class="text-center">precio</th>
                    <th class="text-center">Descuento</th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Categoria</th>
                    <th class="text-center" width="100">Mostrar Producto</th>
                    <th class="text-center">Habilitar</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  if (isset($lista)): ?>
                    <?php foreach ($lista as $row){ ?>
                  <tr>
                    <th class="align-middle text-center">
                      <?php echo $row->titulo ?>
                      </th>
                    <td class="align-middle text-center" style="overflow-wrap: anywhere;">
                      <?php echo $row->detalle; ?>
                      </td>
                    <td class="align-middle text-center">S/ <?php echo $row->precio; ?></td>
                    <td class="align-middle text-center"><?php echo $row->descuento; ?>%</td>
                    <td class="align-middle text-center"><?php echo $row->marca; ?></td>
                    <td class="align-middle text-center"><?php echo $row->categoria; ?></td>
                    <td class="align-middle text-center">
                      <button valor="<?php echo $row->id; ?>" class="btn btn-outline-secondary mostrar" 
                              data-toggle="modal" data-target="#modalprueba">
                        <i class="icon-eye"></i>
                      </button>
                    </td>

                    <?php if($row->mostrar==1){ ?>
                      <td class="align-middle">
                        <div>
                          <div class="swtich-container">
                            <input type="checkbox"   id="switch<?=$row->id?>" style="display: none;">
                            <label id="eicolo<?=$row->id?>"  valor="<?=$row->id?>"  for="switch<?=$row->id?>" class=" botin lbl "></label>
                          </div>
                    </td>
                  <?php }else{ ?>
                    <td class="align-middle">
                      <div>
                        <div class="swtich-container">
                          <input type="checkbox" class="siese" checked  id="switch<?=$row->id?>" style="display: none;">
                          <label id="eicolo<?=$row->id?>"  valor="<?=$row->id?>"  for="switch<?=$row->id?>" class=" botin lbl-active "></label>
                        </div>
                  </td>
                  <?php } ?>
                    <td class="align-middle text-right"><a class="btn btn-outline-primary">
                      <i class="fas fa-edit"></i>
                    </a></td>
                    <td class="align-middle text-left"><a class="btn btn-outline-danger">
                      <i class="fas fa-trash-alt"></i>
                    </a></td>
                  </tr>
                  <?php } ?>
                  <?php endif; ?>
                </tbody>
              </table>
              <input type="hidden" id="csrf_uff" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
      </section>

<?php 
 echo view("estructuraDashboard/footer");
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
  var csrf = $("#csrf_uff").val();
</script>

<script type="text/javascript">
  var base_url = '<?php echo base_url(); ?>';
      $('.botin').on('click', function() {
        var asc = $(this).attr("valor");
      
        if ($("#switch"+asc).prop('checked')) {
          //activando
          $.ajax({
              type: 'post',
              url: base_url + 'producto/activando',
              data: {id: asc,csrf_test_name:csrf},
              dataType: "json",
              success: function(resp){
                  $("#switch"+asc).removeClass('siese');
                  $("#eicolo"+asc).removeClass('lbl-active');
                  $("#eicolo"+asc).addClass('lbl');
                  toastr.success('Activado','Notificación',{"closeButton": true,"debug": false,"newestOnTop": false,"progressBar": true,"positionClass": "toast-top-right","preventDuplicates": false,"onclick": null,"showDuration": "5000","hideDuration": "5000","timeOut": "15000","extendedTimeOut": "15000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"});
              },
              error:function(resp) {
                toastr.error('Error','Alerta',{"closeButton": true,"debug": false,"newestOnTop": false,"progressBar": true,"positionClass": "toast-top-right","preventDuplicates": false,"onclick": null,"showDuration": "5000","hideDuration": "5000","timeOut": "15000","extendedTimeOut": "15000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"});
              }

          });

       } else {

         //desactivando

         $.ajax({
             type: 'post',
             url: base_url + 'producto/desactivando',
             data: {id: asc,csrf_test_name:csrf },
             dataType: "json",
             success: function(resp){
                 $("#switch"+asc).addClass('siese');
                 $("#eicolo"+asc).removeClass('lbl');
                 $("#eicolo"+asc).addClass('lbl-active');
                 toastr.error('Desactivado','Notificación',{"closeButton": true,"debug": false,"newestOnTop": false,"progressBar": true,"positionClass": "toast-top-right","preventDuplicates": false,"onclick": null,"showDuration": "5000","hideDuration": "5000","timeOut": "15000","extendedTimeOut": "15000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"});
             },
             error:function(resp) {
               toastr.error('Error','Alerta',{"closeButton": true,"debug": false,"newestOnTop": false,"progressBar": true,"positionClass": "toast-top-right","preventDuplicates": false,"onclick": null,"showDuration": "5000","hideDuration": "5000","timeOut": "15000","extendedTimeOut": "15000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"});
             }

         });
       }
     });

 </script>

<script type="text/javascript">

$(document).on('click', ".mostrar", function() { 
      var base_url = '<?php echo base_url(); ?>';
      var vari = $(this).attr("valor");
        $.ajax({
            type: 'POST',
            url: base_url + '/tienda/mostrarProducto',
            data: {id: vari,csrf_test_name:csrf },
            dataType: "json",
            success: function(resp){
              $("#vacant").val('');          
              $("#prosss").html(resp.titulo);
              $("#titu").html(resp.titulo);
              $("#imagita").attr('src', base_url+'/plantilla/fotoProducto/'+resp.imagen);
              $("#preci").html('S/.'+resp.precio);
              $("#desxx").html(resp.detalle);
              $("#catego").html(resp.categoria);
              $("#catego").attr('href', '#');
              $("#marc").html(resp.marca);
              $("#marc").attr('href', '#');
            }
        });
    }); 



    $(document).ready(function(){
      var base_url = '<?php echo base_url(); ?>';
      $(".mostrar").click(function(){
            var vari = $(this).attr("valor");
            $.ajax({
                type: 'POST',
                url: base_url + '/tienda/mostrarProducto',
                data: {id: vari,csrf_test_name:csrf },
                dataType: "json",
                success: function(resp){  
                  $("#vacant").val('');        
                  $("#prosss").html(resp.titulo);
                  $("#titu").html(resp.titulo);
                  $("#imagita").attr('src', base_url+'/plantilla/fotoProducto/'+resp.imagen);
                  $("#preci").html('S/.'+resp.precio);
                  $("#desxx").html(resp.detalle);
                  $("#catego").html(resp.categoria);
                  $("#catego").attr('href', '#');
                  $("#marc").html(resp.marca);
                  $("#marc").attr('href', '#');
                }
            });
        });
    });

</script>



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

