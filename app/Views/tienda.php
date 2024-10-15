<?php 
 echo view("estructuraTienda/cabecera");
 echo view("estructuraTienda/filtros_modal");
 echo view("estructuraTienda/promocion_modal");
 echo view("estructuraTienda/barralateral");
 echo view("estructuraTienda/barralateralmovil");
 echo view("estructuraTienda/navbar");
?>

<style>
  .breadcrumbs>li>a:hover { color: #ff914d; } 

  .pagination .pages>li.active>a {
    border-color: #ff914d;
    background-color: #ff914d;
    color: #fff;
  }

  .navi-link,.navi-link-light{
    transition:color .3s;
    color:#606975;
    text-decoration:none
  }

  .navi-link:hover,.navi-link-light:hover{ color:#ff914d; }
</style>

<?php 
 echo view("estructuraTienda/modal");
?>

    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Tienda</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="<?= base_url() ?>home/index">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Tienda</li>
            </ul>
          </div>
        </div>
      </div>
      <style type="text/css">
        .form-control:focus {
          border-color: #ff914d;
        }
      </style>

      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <div class="row">
          <!-- Products-->
          <div class="col-xl-9 col-lg-8 order-lg-2">
            <!-- Shop Toolbar-->
            <div class="shop-toolbar padding-bottom-1x mb-2">
              <div class="column">
                <div class="shop-sorting">
                  <label for="sorting">Ver por:</label>
                  <select class="form-control" id="sorting" name="ver">
                    <option selected="" value="">Seleccione:</option>
                    <option value="1">Precio Alto</option>
                    <option value="2">Precio Bajo</option>
                    <option value="3">A - Z Ordenar</option>
                    <option value="4">Z - A Ordenar</option>
                  </select><span class="text-muted">Mostrando:&nbsp;</span>
                  <span id="items"><?php echo isset($lista)? count($lista):"" ; ?></span>
                  <span>&nbsp;- </span>
                  <span id="totalsss"><?php echo isset($listaT)? count($listaT):"" ; ?></span>
                  <span> productos</span>
                </div>
              </div>
              <div class="column">
                <div class="shop-view">
                  <a class="grid-view active" href="shop-grid-ls.html" style="border-color: #ff914d;
                      background-color: #ff914d;"><span></span><span></span><span></span></a>
   <!-- <a class="list-view" href="shop-list-ls.html"><span></span><span></span><span></span>
    </a>-->
  </div>
              </div>
            </div>

  <!-- COMENTARIO DE SEGURIDAD -->

  <?= csrf_field() ?>


  <section class="padding-top-1x padding-bottom-1x">
    <div class="row d-flex justify-content-center" id="productos">

          <?php  if (isset($lista)): ?>
            <?php foreach ($lista as $row){ ?>
                <div class="col-lg-4 margin-bottom-1x">
                  <div class="card text-center">
                    <div style="padding: 10px; margin: 0 !important;">
                      <a href="#" valor="<?php echo $row->id; ?>" class="mostrar" 
                              data-toggle="modal" data-target="#modalprueba">
                        <img src="<?= base_url() ?>plantilla/fotoProducto/<?= $row->imagen?>" 
                             alt="Product"style="width: 100%; height: 200px;">
                      </a>
                      </div>
                    <div class="card-body">
                      <h5 class="card-title" style="width: 100%; height: 50px;"><?php echo $row->titulo; ?></h5>
                      <p class="card-text"><?php echo 'S/.'.$row->precio; ?></p>
                      <div class="product-buttons">
                      <button valor="<?php echo $row->id; ?>" class="btn btn-outline-secondary btn-sm mostrar" 
                              data-toggle="modal" data-target="#modalprueba">
                        <i class="icon-eye"></i>
                      </button>
                      <button  valor="<?php echo $row->id; ?>" pre="<?php echo $row->precio; ?>"
                               class="btn btn-outline-warning btn-sm addpro" >
                              Añadir 
                        <i class="fas fa-shopping-cart"></i>
                      </button>
                    </div>
                    </div>
                  </div>
                </div>
            <?php } ?>
          <?php endif; ?>

    </div>
  </section>

            <!-- Pagination-->
            <nav class="pagination text-center ">
              <div class="column">
                <ul class="pages" id="pages">

                  <?php //if(isset($pagi)):?>
                    <?php 
                     // for ($i=1; $i <= $pagi; $i++) { 
                     //   if($i==1){
                      ?>
               <!--     <li id="pagilink<?php // echo $i; ?>" class="nada active">
                      <a href="#" id="pagi<?php // echo $i; ?>"><?php // echo $i; ?></a>
                    </li> -->
                    <?php //}else{ ?>
                  <!--    <li id="pagilink<?php //echo $i; ?>" class="nada">
                        <a href="#" id="pagi<?php //echo $i; ?>"><?php //echo $i; ?></a>
                      </li> -->
                    <?php //}} ?>
                  <?php // endif; ?>

                </ul>
              </div>
              <!--<div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-arrow-right"></i></a></div>-->
            </nav>
          </div>
          <!-- Sidebar          -->

<?php 
 echo view("estructuraTienda/filtros");
 echo view("estructuraTienda/promocion");
?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
  var tok =$("input[name='csrf_test_name']").val()
</script>

<script>
  $(document).ready(function(){
    var base_url = '<?php echo base_url(); ?>';
    $("select[name=ver]").change(function(){
      var valor = $("select[name=ver]").val();
      history.pushState(null, "", base_url + '/tienda/filtroVista?vista='+valor);
      location.reload();
      /* if(valor != 0){
        $.ajax({
            type: 'POST',
            url: base_url + '/tienda/filtroVista',
            data: {vista: valor },
            dataType: "json",
            success: function(resp){             
              $("#productos").html(resp.html);
              $("#items").html(resp.numero);
              $("#totalsss").html(resp.total);
             // history.pushState(null, "", base_url + '/tienda/filtroVista?vista='+valor);
            }
        });
      }
      */
      });
    });

    $(document).on('click', ".mostrar", function() { 
      var base_url = '<?php echo base_url(); ?>';
      var vari = $(this).attr("valor");
        $.ajax({
            type: 'POST',
            url: base_url + '/tienda/mostrarProducto',
            data: {id: vari, csrf_test_name:tok},
            dataType: "json",
            success: function(resp){
              $("#vacant").val('');          
              $("#prosss").html(resp.titulo);
              $("#titu").html(resp.titulo);
              $("#imagita").attr('src', base_url+'/plantilla/fotoProducto/'+resp.imagen);
              $("#preci").html('S/.'+resp.precio);
              $("#desxx").html(resp.detalle);
              $("#catego").html(resp.categoria);
              $("#catego").attr('href', base_url+'/tienda/filtroCategoria?categoria='+resp.categoria);
              $("#marc").html(resp.marca);
              $("#marc").attr('href', base_url+'/tienda/filtroMarca?marca='+resp.marca);
              $(".aggre").addClass('addpro');
              $(".aggre").attr('valor',resp.id);
              $(".aggre").attr('pre',resp.precio);
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
                data: {id: vari },
                dataType: "json",
                success: function(resp){  
                  $("#vacant").val('');        
                  $("#prosss").html(resp.titulo);
                  $("#titu").html(resp.titulo);
                  $("#imagita").attr('src', base_url+'/plantilla/fotoProducto/'+resp.imagen);
                  $("#preci").html('S/.'+resp.precio);
                  $("#desxx").html(resp.detalle);
                  $("#catego").html(resp.categoria);
                  $("#catego").attr('href', base_url+'/tienda/filtroCategoria?categoria='+resp.categoria);
                  $("#marc").html(resp.marca);
                  $("#marc").attr('href', base_url+'/tienda/filtroMarca?marca='+resp.marca);
                  $(".aggre").addClass('addpro');
                  $(".aggre").attr('valor',resp.id);
                  $(".aggre").attr('pre',resp.precio);
                }
            });
        });
    });



$(document).ready(function(){
  $(document).on('click', ".addpro", function() { 
  var base_url = '<?php echo base_url(); ?>';
    var producto = $(this).attr("valor");
    var precio = $(this).attr("pre");
    var cantPro = $("#vacant").val();
    
    if(cantPro == ''){
      cantPro = 1;
    }
    
    var usuario = '<?php echo session('idCliente'); ?>';
        $.ajax({
            type: 'POST',
            url: base_url + '/tienda/agregarCarrito',
            data: {product: producto, usuari:usuario,preci:precio,cant:cantPro, csrf_test_name:tok },
            dataType: "json",
            success: function(resp){          
              $("#subconteo").html(resp.cont);
              $("#subtotalito").html("S/ "+resp.total);
              $("#carrito").html(resp.html);
              if(resp.msg =="inserto"){
                toastr.success('Añadido al Carrito!','Notificación',{"closeButton": false,"debug": false,"newestOnTop": false,"progressBar": true,"positionClass": "toast-bottom-right","preventDuplicates": false,"onclick": null,"showDuration": "300","hideDuration": "1000","timeOut": "5000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"});
                $("#vacant").val('');
                $("#cerr").click();
              }else{
               toastr.error(resp.msg,'Alerta',{"closeButton": false,"debug": false,"newestOnTop": false,"progressBar": true,"positionClass": "toast-bottom-right","preventDuplicates": false,"onclick": null,"showDuration": "300","hideDuration": "1000","timeOut": "5000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"}); 
               $("#vacant").val('');
               $("#cerr").click();
              }
              
            }
        });
  }); 
});

// $(document).ready(function(){
//   $(document).on('click', "#addg<?php //echo $row->id; ?>", function() { 
//   var base_url = '<?php //echo base_url(); ?>';
//     var producto = $("#addg<?php //echo $row->id; ?>").attr("valor");
//     var precio = $("#addg<?php //echo $row->id; ?>").attr("pre");
//     var usuario = '<?php //echo session('idCliente'); ?>';
//     var canti = $("#vacant").val();
//     if(canti==""){
//       canti=1;
//     }
//         $.ajax({
//             type: 'POST',
//             url: base_url + '/tienda/agregarCarrito',
//             data: {product: producto, usuari:usuario,preci:precio,cant:canti},
//             dataType: "json",
//             success: function(resp){          
//               $("#subconteo").html(resp.cont);
//               $("#subtotalito").html("S/ "+resp.total);
//               $("#carrito").html(resp.html);
//               $("#cerr").click();
//               $("#vacant").val('');
//               if(resp.msg =="inserto"){
//               toastr.success('Añadido al Carrito!','Notificación',{"closeButton": false,"debug": false,"newestOnTop": false,"progressBar": true,"positionClass": "toast-bottom-right","preventDuplicates": false,"onclick": null,"showDuration": "300","hideDuration": "1000","timeOut": "5000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"});
//               }else{
//                toastr.error(resp.msg,'Alerta',{"closeButton": false,"debug": false,"newestOnTop": false,"progressBar": true,"positionClass": "toast-bottom-right","preventDuplicates": false,"onclick": null,"showDuration": "300","hideDuration": "1000","timeOut": "5000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"}); 
//               }
// 
//             }
//         });
//   }); 
// });
</script>

<script>
    <?php  if(isset($pagi)):?>
    //Nuevo Script para la paginación
    const ul = document.getElementById("pages");
    let allPages = <?php echo $pagi; ?>;

    function elem(allPages, page){
        let li = '';

        let beforePages = page - 1;
        let afterPages = page + 1;
        let liActive;

        if(page > 1){
          li += `<li class="btn" onclick="elem(allPages, ${page-1})" ><i class="fas fa-angle-left"></i></li>`;
        }

        for (let pageLength = beforePages; pageLength <= afterPages; pageLength++){
            if(pageLength > allPages){ continue; }
            if(pageLength == 0){  pageLength = pageLength + 1;  }
            if(page == pageLength){  
              liActive = 'active';
            }else{
              liActive = '';
            }

            li += `<li class="m-1 ${liActive}" onclick="elem(allPages, ${pageLength})" ><a href="#">${pageLength}</a></li>`
        }

        if(page < allPages){
          li += `<li class="btn" onclick="elem(allPages, ${page+1})" ><i class="fas fa-angle-right"></i></li>`;
        }

        ul.innerHTML = li;

       var base_url = '<?php echo base_url(); ?>';
       var vista = '<?php echo isset($_GET['vista'])? $_GET['vista']:"" ; ?>';
       var cat = '<?php echo isset($_GET['categoria'])? $_GET['categoria']:"" ; ?>';
       var mar = '<?php echo isset($_GET['marca'])? $_GET['marca']:"" ; ?>';
       var premin = '<?php echo isset($_GET['precio-min'])? $_GET['precio-min']:"" ; ?>';
       var premax = '<?php echo isset($_GET['precio-max'])? $_GET['precio-max']:"" ; ?>';

        $.ajax({
            type: 'POST',
            url: base_url + 'tienda/pagina',
            data: {pag: page, varis:cat, marca:mar,pmi: premin, pmax: premax,vis:vista ,csrf_test_name:tok},
            dataType: "json",
            success: function(resp){          
              $("#productos").html(resp.html);
              $("#items").html(resp.itemsa);
            }
        });
    }
    elem(allPages, 1);


    <?php //for ($i=1; $i <= $pagi; $i++) { ?>
/*
$(document).on('click', "#pagi<?php //echo $i; ?>", function() { 
   var base_url = '<?php //echo base_url(); ?>';
   var vista = '<?php //echo isset($_GET['vista'])? $_GET['vista']:"" ; ?>';
   var cat = '<?php //echo isset($_GET['categoria'])? $_GET['categoria']:"" ; ?>';
   var mar = '<?php //echo isset($_GET['marca'])? $_GET['marca']:"" ; ?>';
   var premin = '<?php //echo isset($_GET['precio-min'])? $_GET['precio-min']:"" ; ?>';
   var premax = '<?php //echo isset($_GET['precio-max'])? $_GET['precio-max']:"" ; ?>';
    $(".nada").removeClass("active");
    $("#pagilink<?php //echo $i; ?>").addClass("active");
        $.ajax({
            type: 'POST',
            url: base_url + '/tienda/pagina',
            data: {pag: <?php //echo $i; ?>, varis:cat, marca:mar,pmi: premin, pmax: premax,vis:vista  },
            dataType: "json",
            success: function(resp){          
              $("#productos").html(resp.html);
              $("#items").html(resp.itemsa);
            }
        });
}); 
*/

/*
$(document).ready(function(){
   var base_url = '<?php //echo base_url(); ?>';
   var vista = '<?php //echo isset($_GET['vista'])? $_GET['vista']:"" ; ?>';
   var cat = '<?php //echo isset($_GET['categoria'])? $_GET['categoria']:"" ; ?>';
   var mar = '<?php //echo isset($_GET['marca'])? $_GET['marca']:"" ; ?>';
   var premin = '<?php //echo isset($_GET['precio-min'])? $_GET['precio-min']:"" ; ?>';
   var premax = '<?php //echo isset($_GET['precio-max'])? $_GET['precio-max']:"" ; ?>';
      $("#pagi<?php //echo $i; ?>").click(function(){
        $(".nada").removeClass("active");
        $("#pagilink<?php //echo $i; ?>").addClass("active");
        $.ajax({
            type: 'POST',
            url: base_url + '/tienda/pagina',
            data: {pag: <?php //echo $i; ?>, varis:cat, marca:mar,pmi: premin, pmax: premax,vis:vista },
            dataType: "json",
            success: function(resp){          
              $("#productos").html(resp.html);
              $("#items").html(resp.itemsa);
            }
        });
      
      });
});
*/

     <?php //} ?>
  <?php endif; ?>
</script>

<?php 
 echo view("estructuraTienda/footer");
 ?>