
<?php 
if(!session('correo')==""){
  echo view("estructuraIndex/logeado/cabecera");
  echo view("estructuraIndex/logeado/barraLateral");
  echo view("estructuraIndex/logeado/navbar");
  
}else{
  echo view("estructuraIndex/invitado/cabecera");
  echo view("estructuraIndex/invitado/barraLateral");
  echo view("estructuraIndex/invitado/navbar");
}
?>



    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Content-->
        <!-- Main Slider-->
      <section class="hero-slider console-log" style="background-image: url(<?=base_url()?>plantilla/img/hero-slider/fondomain_03.jpg);">
        <div class="owl-carousel large-controls dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">

          <?php  if (isset($carrusel)): ?>
                    <?php foreach ($carrusel as $row){ ?>
          <div class="item">
            <div class="container padding-top-3x">
              <div class="row justify-content-center align-items-center">
                <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                  <div class="from-bottom"><img class="d-inline-block w-150 mb-4" src="<?=base_url()?>plantilla/img/marcas/<?=$row->imagenMarca?>" alt="<?=$row->imagenMarca?>">
                    <div class="h2 text-body text-normal mb-2 pt-1"><?=$row->descripcion?></div>
                    <div class="h2 text-body text-normal mb-4 pb-1">Por solo <span class="text-bold">S/<?=$row->precio?></span></div>
                  </div>
                  <a class="btn btn-primary scale-up delay-1" href="shop-grid-ls.html">Editar</a>
                </div>
                <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto" src="<?=base_url()?>plantilla/img/carrusel/<?=$row->imagen?>" alt="<?=$row->imagen?>"></div>
              </div>
            </div>
          </div>
                  <?php } ?>
          <?php endif; ?>

        </div>
      </section>



      <!-- Top Categories-->
      <section class="container padding-top-3x">
        <h3 class="text-center mb-30">Categorias</h3>
        <div class="row justify-content-center">
          <?php  if (isset($categorias)): ?>
            <?php foreach ($categorias as $row){ ?>
          <div class="col-md-4 col-sm-6">
            <div class="card mb-30"><a class="card-img-tiles" href="shop-grid-ls.html">
                <div class="inner">
                  <div class="main-img"><img src="<?=base_url()?>plantilla/img/categorias/<?=$row->imagen1?>" alt="Category"></div>
                  <div class="thumblist"><img src="<?=base_url()?>plantilla/img/categorias/<?=$row->imagen2?>" alt="Category"><img src="<?=base_url()?>plantilla/img/categorias/<?=$row->imagen3?>" alt="Category"></div>
                </div></a>
              <div class="card-body text-center">
                <h4 class="card-title"><?php echo $row->nombre; ?></h4>
                <a class="btn btn-outline-warning btn-sm" href="<?=base_url()?>invitado/filtroCategoria?categoria=<?=$row->nombre?>">Ver Productos</a>
              </div>
            </div>
          </div>
          <?php } ?>
          <?php endif; ?>

        </div>
        <div class="text-center"><a class="btn btn-outline-secondary margin-top-none" href="<?= base_url() ?>invitado">Ver en Tienda</a></div>
      </section>
      <!-- Promo #1-->
      <!--
      <section class="container-fluid padding-top-3x">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-6 mb-30">
            <div class="rounded bg-faded position-relative padding-top-3x padding-bottom-3x"><span class="product-badge text-danger" style="top: 24px; left: 24px;">Limited Offer</span>
              <div class="text-center">
                <h3 class="h2 text-normal mb-1">New</h3>
                <h2 class="display-2 text-bold mb-2">Sunglasses</h2>
                <h4 class="h3 text-normal mb-4">collection at discounted price!</h4>
                <div class="countdown mb-3" data-date-time="06/30/2018 12:00:00">
                  <div class="item">
                    <div class="days">00</div><span class="days_ref">Days</span>
                  </div>
                  <div class="item">
                    <div class="hours">00</div><span class="hours_ref">Hours</span>
                  </div>
                  <div class="item">
                    <div class="minutes">00</div><span class="minutes_ref">Mins</span>
                  </div>
                  <div class="item">
                    <div class="seconds">00</div><span class="seconds_ref">Secs</span>
                  </div>
                </div><br><a class="btn btn-primary margin-bottom-none" href="#">View Offers</a>
              </div>
            </div>
          </div>
          <div class="col-xl-5 col-lg-6 mb-30" style="min-height: 270px;">
            <div class="img-cover rounded" style="background-image: url(<?=base_url()?>plantilla/img/shop/products/11.jpg);"></div>
          </div>
        </div>
      </section>
      -->
      <!-- Promo #2-->
 
      <section class="container-fluid pt-5 mb-5">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12">
            <div class="fw-section rounded padding-top-4x padding-bottom-4x" style="background-image: url(/plantilla/img/banners/home02.jpg);"><span class="overlay rounded" style="opacity: .35;"></span>
              <div class="text-center">
                <h3 class="display-4 text-normal text-white text-shadow mb-1">Old Collection</h3>
                <h2 class="display-2 text-bold text-white text-shadow">HUGE SALE!</h2>
                <h4 class="d-inline-block h2 text-normal text-white text-shadow border-default border-left-0 border-right-0 mb-4">at our outlet stores</h4><br><a class="btn btn-primary margin-bottom-none" href="contacts.html">Locate Stores</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    
      <!-- Featured Products Carousel
      <section class="container padding-top-3x padding-bottom-3x">
        <h3 class="text-center mb-30">Productos</h3>
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">

          <?php //for($i=0; $i<6; $i++){ ?>

          <div class="grid-item">
            <div class="product-card">
              <div class="product-badge text-danger">22% Off</div><a class="product-thumb" href="shop-single.html"><img src="<?=base_url()?>plantilla/img/shop/products/09.jpg" alt="Product"></a>
              <h3 class="product-title"><a href="shop-single.html">Rocket Dog</a></h3>
              <h4 class="product-price">
                <del>$44.95</del>$34.99
              </h4>
              <div class="product-buttons">
                <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                <button class="btn btn-outline-warning btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
              </div>
            </div>
          </div>-->

          <?php //} ?>

        </div>
      </section>
      <!-- Product Widgets-->
      <!-- <section class="container padding-bottom-2x">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="widget widget-featured-products">
              <h3 class="widget-title">Productos Top</h3>
              Entry-->
              <!-- <div class="entry">
                <div class="entry-thumb"><a href="shop-single.html"><img src="plantilla/img/shop/widget/01.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="shop-single.html">Oakley Kickback</a></h4><span class="entry-meta">$155.00</span>
                </div>
              </div> -->
              <!-- Entry-->
              <!-- <div class="entry">
                <div class="entry-thumb"><a href="shop-single.html"><img src="plantilla/img/shop/widget/03.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="shop-single.html">Vented Straw Fedora</a></h4><span class="entry-meta">$49.50</span>
                </div>
              </div> -->
              <!-- Entry-->
              <!-- <div class="entry">
                <div class="entry-thumb"><a href="shop-single.html"><img src="plantilla/img/shop/widget/04.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="shop-single.html">Big Wordmark Tote</a></h4><span class="entry-meta">$29.99</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="widget widget-featured-products">
              <h3 class="widget-title">Nuevos Productos</h3>  -->
              
                    <?php // if (isset($productosNuevos)): ?>
                    <?php //foreach ($productosNuevos as $fila){ ?>

              <!-- Entry-->
              <!-- <div class="entry">
                <div class="entry-thumb"><a href="shop-single.html"><img src="plantilla/fotoProducto/" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="shop-single.html"></a></h4><span class="entry-meta">S/. </span>
                </div>
              </div> -->

                  <?php //} ?>
                  <?php //endif; ?>

            <!-- </div>
          </div> --> 
          <!-- <div class="col-md-4 col-sm-6">
            <div class="widget widget-featured-products">
              <h3 class="widget-title">Ranking</h3> -->
              <!-- Entry
              <div class="entry">
                <div class="entry-thumb"><a href="shop-single.html"><img src="plantilla/img/shop/widget/08.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="shop-single.html">Jordan's City Hoodie</a></h4><span class="entry-meta">$65.00</span>
                </div>
              </div>-->
              <!-- Entry
              <div class="entry">
                <div class="entry-thumb"><a href="shop-single.html"><img src="plantilla/img/shop/widget/09.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="shop-single.html">Palace Shell Track Jacket</a></h4><span class="entry-meta">$36.99</span>
                </div>
              </div>-->
              <!-- Entry
              <div class="entry">
                <div class="entry-thumb"><a href="shop-single.html"><img src="plantilla/img/shop/widget/10.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="shop-single.html">Off the Shoulder Top</a></h4><span class="entry-meta">$128.00</span>
                </div>
              </div>
            </div>
          </div>
        </div>-->
      <!--
      </section>
      -->
      <!-- Popular -->
      <!--
      <section class="bg-nivel3 padding-top-3x padding-bottom-3x">
        <div class="container">
          <h3 class="text-center mb-30 pb-2">Marcas Populares</h3>
          <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}, &quot;470&quot;:{&quot;items&quot;:3},&quot;630&quot;:{&quot;items&quot;:4},&quot;991&quot;:{&quot;items&quot;:5},&quot;1200&quot;:{&quot;items&quot;:4}} }">
              
              <?php // if (isset($marcas)): ?>
              <?php //foreach ($marcas as $fila){ ?>
                <img class="d-block w-110 opacity-75 m-auto" src="base_url() plantilla/img/marcas/ //$fila->imagenMarca" alt="//$fila->nombre">
              <?php //} ?>
              <?php //endif; ?>

           </div>
        </div>
      </section>
      -->

      <!-- Productos -->

      <section class="container padding-top-1x">
        <h3 class="text-center mb-30">Productos</h3>
        <div class="row justify-content-center">
            <?php for($i=0; $i<8; $i++){ ?>
            <div class="col-6 col-md-3">
              <div class="grid-item p-1">
                <div class="product-card">
                  <div class="product-badge text-danger">22% Off</div><a class="product-thumb" href="shop-single.html"><img src="<?=base_url()?>plantilla/img/shop/products/09.jpg" alt="Product"></a>
                  <h3 class="product-title"><a href="shop-single.html">Rocket Dog</a></h3>
                  <h4 class="product-price">
                    <del>$44.95</del>$34.99
                  </h4>
                  <div class="product-buttons" >
                    <button class="btn btn-outline-warning btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Agregar</button>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </section>

  


      <!-- Services-->
      <section class="container padding-top-3x padding-bottom-2x">
      <h3 class="text-center mb-30">Servicios</h3>
        <div class="row">
          <div class="col-md-3 col-sm-6 text-center mb-30">
          <img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="<?=base_url()?>plantilla/services/01.png" alt="Money Back">
            <h6>Free Worldwide Shipping</h6>
            <p class="text-muted margin-bottom-none">Free shipping for all orders over $100</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center mb-30">
            <img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="<?=base_url()?>plantilla/services/02.png" alt="Money Back">
            <h6>Money Back Guarantee</h6>
            <p class="text-muted margin-bottom-none">We return money within 30 days</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center mb-30">
            <img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="<?=base_url()?>plantilla/services/03.png" alt="Support">
            <h6>24/7 Customer Support</h6>
            <p class="text-muted margin-bottom-none">Friendly 24/7 customer support</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center mb-30">
            <img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="<?=base_url()?>plantilla/services/04.png" alt="Payment">
            <h6>Secure Online Payment</h6>
            <p class="text-muted margin-bottom-none">We posess SSL / Secure Certificate</p>
          </div>
        </div>
      </section>

    
              

<?php 
if(!session('correo')==""){
  echo view("estructuraIndex/logeado/footer");
}else{
  echo view("estructuraIndex/invitado/footer");
}

?>