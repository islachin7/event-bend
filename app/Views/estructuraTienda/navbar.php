
    <!-- Navbar-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <header class="navbar navbar-sticky">
      <!-- Search-->
      <form class="site-search" method="get">
        <input type="text" name="site_search" placeholder="Type to search...">
        <div class="search-tools"><span class="clear-search">Clear</span><span class="close-search"><i class="icon-cross"></i></span></div>
      </form>
      <div class="site-branding">
        <div class="inner">
          <!-- Off-Canvas Toggle (#shop-categories)--><a class="offcanvas-toggle cats-toggle" href="#shop-categories" data-toggle="offcanvas"></a>
          <!-- Off-Canvas Toggle (#mobile-menu)--><a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>
          <!-- Site Logo--><a class="site-logo" href="<?= base_url() ?>home/index2"><img src="<?= base_url() ?>plantilla/img/logo/logoNaty.png" alt="Unishop"></a>
        </div>
      </div>
      <style>

.site-menu>ul>li>a>span { color: #606975; } /* CSS link color (red) */
.site-menu>ul>li>a>span:hover { color: #ff914d; } /* CSS link hover (green) */
.site-menu ul>li:hover>a { color: #ff914d; }

      </style>


      <!-- Main Navigation-->
      <nav class="site-menu">
        <ul>
          <li class="has-megamenu"><a href="<?= base_url() ?>home" >
            <span >INICIO</span></a>
            <!--
            <ul class="mega-menu">
              <li><a class="d-block img-thumbnail text-center navi-link" href="index-2.html"><img alt="Featured Products Slider" src="/plantilla/img/mega-menu-home/01.jpg">
                  <h6 class="mt-3">Featured Products Slider</h6></a></li>
              <li><a class="d-block img-thumbnail text-center navi-link" href="home-featured-categories.html"><img alt="Featured Categories" src="/plantilla/img/mega-menu-home/02.jpg">
                  <h6 class="mt-3">Featured Categories</h6></a></li>
              <li><a class="d-block img-thumbnail text-center navi-link" href="home-collection-showcase.html"><img alt="Products Collection Showcase" src="/plantilla/img/mega-menu-home/03.jpg">
                  <h6 class="mt-3">Products Collection Showcase</h6></a></li>
              <li>
                <div class="img-thumbnail text-center"><img alt="More To Come. Stay Tuned!" src="/plantilla/img/mega-menu-home/04.jpg">
                  <h6 class="mt-3">More To Come. Stay Tuned!</h6>
                </div>
              </li>
            </ul>
          -->
          </li>
          <li class="active"><a href="<?= base_url() ?>home/tienda" style="border-top-color: #ff914d;" >
            <span id="link" style="color: #ff914d" >TIENDA</span></a>
            <ul class="sub-menu">
                <li><a href="shop-categories.html">Shop Categories</a></li>
              <li class="has-children"><a href="shop-grid-ls.html"><span>Shop Grid</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-grid-ls.html">Grid Left Sidebar</a></li>
                    <li><a href="shop-grid-rs.html">Grid Right Sidebar</a></li>
                    <li><a href="shop-grid-ns.html">Grid No Sidebar</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="shop-list-ls.html"><span>Shop List</span></a>
                <ul class="sub-menu">
                    <li><a href="shop-list-ls.html">List Left Sidebar</a></li>
                    <li><a href="shop-list-rs.html">List Right Sidebar</a></li>
                    <li><a href="shop-list-ns.html">List No Sidebar</a></li>
                </ul>
              </li>
                <li><a href="shop-single.html">Single Product</a></li>
                <li><a href="cart.html">Cart</a></li>
              <li class="has-children"><a href="checkout-address.html"><span>Checkout</span></a>
                <ul class="sub-menu">
                    <li><a href="checkout-address.html">Address</a></li>
                    <li><a href="checkout-shipping.html">Shipping</a></li>
                    <li><a href="checkout-payment.html">Payment</a></li>
                    <li><a href="checkout-review.html">Review</a></li>
                    <li><a href="checkout-complete.html">Complete</a></li>
                </ul>
              </li>
            </ul>
          </li>
        <!--
          <li class="has-megamenu"><a href="#"><span>Mega Menu</span></a>
            <ul class="mega-menu">
              <li><span class="mega-menu-title">Top Categories</span>
                <ul class="sub-menu">
                  <li><a href="#">Men's Shoes</a></li>
                  <li><a href="#">Women's Shoes</a></li>
                  <li><a href="#">Shirts and Tops</a></li>
                  <li><a href="#">Swimwear</a></li>
                  <li><a href="#">Shorts and Pants</a></li>
                  <li><a href="#">Accessories</a></li>
                </ul>
              </li>
              <li><span class="mega-menu-title">Specialty Shops</span>
                <ul class="sub-menu">
                  <li><a href="#">Junior's Shop</a></li>
                  <li><a href="#">Swim Shop</a></li>
                  <li><a href="#">Athletic Shop</a></li>
                  <li><a href="#">Outdoor Shop</a></li>
                  <li><a href="#">Luxury Shop</a></li>
                  <li><a href="#">Accessories Shop</a></li>
                </ul>
              </li>
              <li>
                <section class="promo-box" style="background-image: url(/plantilla/img/banners/02.jpg);"><span class="overlay-dark" style="opacity: .4;"></span>
                  <div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
                    <h4 class="text-light text-thin text-shadow">New Collection of</h4>
                    <h3 class="text-bold text-light text-shadow">Sunglasses</h3><a class="btn btn-sm btn-primary" href="#">Shop Now</a>
                  </div>
                </section>
              </li>
              <li>
                <section class="promo-box" style="background-image: url(/plantilla/img/banners/03.jpg);">
                  <span class="overlay-dark" style="opacity: .45;"></span>

                  <div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
                    <h3 class="text-bold text-light text-shadow">Limited Offer</h3>
                    <h4 class="text-light text-thin text-shadow">save up to 50%!</h4><a class="btn btn-sm btn-primary" href="#">Learn More</a>
                  </div>
                </section>
              </li>
            </ul>
          </li>
        -->
          <li><a href="account-orders.html"><span>QUIENES SOMOS</span></a>
            <!--
            <ul class="sub-menu">
                <li><a href="account-login.html">Login / Register</a></li>
                <li><a href="account-password-recovery.html">Password Recovery</a></li>
                <li><a href="account-orders.html">Orders List</a></li>
                <li><a href="account-wishlist.html">Wishlist</a></li>
                <li><a href="account-profile.html">Profile Page</a></li>
                <li><a href="account-address.html">Contact / Shipping Address</a></li>
                <li><a href="account-tickets.html">My Tickets</a></li>
                <li><a href="account-single-ticket.html">Single Ticket</a></li>
            </ul>
-->
          </li>
  <!--
          <li><a href="blog-rs.html"><span>Blog</span></a>
            <ul class="sub-menu">
              <li class="has-children"><a href="blog-rs.html"><span>Blog Layout</span></a>
                <ul class="sub-menu">
                    <li><a href="blog-rs.html">Blog Right Sidebar</a></li>
                    <li><a href="blog-ls.html">Blog Left Sidebar</a></li>
                    <li><a href="blog-ns.html">Blog No Sidebar</a></li>
                </ul>
              </li>
              <li class="has-children"><a href="blog-single-rs.html"><span>Single Post Layout</span></a>
                <ul class="sub-menu">
                    <li><a href="blog-single-rs.html">Post Right Sidebar</a></li>
                    <li><a href="blog-single-ls.html">Post Left Sidebar</a></li>
                    <li><a href="blog-single-ns.html">Post No Sidebar</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#"><span>Pages</span></a>
            <ul class="sub-menu">
                <li><a href="about.html">About Us</a></li>
                <li><a href="contacts.html">Contacts</a></li>
                <li><a href="faq.html">Help / FAQ</a></li>
                <li><a href="order-tracking.html">Order Tracking</a></li>
                <li><a href="search-results.html">Search Results</a></li>
                <li><a href="404.html">404 Not Found</a></li>
                <li><a href="coming-soon.html">Coming Soon</a></li>
              <li><a class="text-danger" href="docs/dev-setup.html">Documentation</a></li>
            </ul>
          </li>
          <li class="has-megamenu"><a href="components/accordion.html"><span>Components</span></a>
            <ul class="mega-menu">
              <li><span class="mega-menu-title">A - F</span>
                  <ul class="sub-menu">
                    <li><a href="components/accordion.html">Accordion</a></li>
                    <li><a href="components/alerts.html">Alerts</a></li>
                    <li><a href="components/buttons.html">Buttons</a></li>
                    <li><a href="components/cards.html">Cards</a></li>
                    <li><a href="components/carousel.html">Carousel</a></li>
                    <li><a href="components/countdown.html">Countdown</a></li>
                    <li><a href="components/forms.html">Forms</a></li>
                  </ul>
              </li>
              <li><span class="mega-menu-title">G - M</span>
                  <ul class="sub-menu">
                    <li><a href="components/gallery.html">Gallery</a></li>
                    <li><a href="components/google-maps.html">Google Maps</a></li>
                    <li><a href="components/images.html">Images &amp; Figures</a></li>
                    <li><a href="components/list-group.html">List Group</a></li>
                    <li><a href="components/market-social-buttons.html">Market &amp; Social Buttons</a></li>
                    <li><a href="components/media.html">Media Object</a></li>
                    <li><a href="components/modal.html">Modal</a></li>
                  </ul>
              </li>
              <li><span class="mega-menu-title">P - T</span>
                  <ul class="sub-menu">
                    <li><a href="components/pagination.html">Pagination</a></li>
                    <li><a href="components/pills.html">Pills</a></li>
                    <li><a href="components/progress-bars.html">Progress Bars</a></li>
                    <li><a href="components/shop-items.html">Shop Items</a></li>
                    <li><a href="components/steps.html">Steps</a></li>
                    <li><a href="components/tables.html">Tables</a></li>
                    <li><a href="components/tabs.html">Tabs</a></li>
                  </ul>
              </li>
              <li><span class="mega-menu-title">T - W</span>
                  <ul class="sub-menu">
                    <li><a href="components/team.html">Team</a></li>
                    <li><a href="components/toasts.html">Toast Notifications</a></li>
                    <li><a href="components/tooltips-popovers.html">Tooltips &amp; Popovers</a></li>
                    <li><a href="components/typography.html">Typography</a></li>
                    <li><a href="components/video-player.html">Video Player</a></li>
                    <li><a href="components/widgets.html">Widgets</a></li>
                  </ul>
              </li>
            </ul>
          </li>
          -->
        </ul>
      </nav>
      <!-- Toolbar-->
      <div class="toolbar">
        <div class="inner">
          <div class="tools">
            <style type="text/css">
              .toolbar-dropdown>li>a:hover { color: #ff914d; }
            </style>
            <!--<div class="search"><i class="icon-search"></i></div>-->
            <div class="account"><a href="#"></a><i class="icon-head"></i>
              <ul class="toolbar-dropdown">
                <li class="sub-menu-user">
                  <div class="user-ava"><img src="<?= base_url() ?>plantilla/img/account/usuario-default.png" alt="usuario">
                  </div>
                  <div class="user-info">
                    <h6 class="user-name"><?= session('nombre')?></h6>
                    
                  </div>
                </li>
                  <li><a><span class="text-xs text-muted"><?= session('correo')?></span></a></li>
                  <?php if(session("tipo")==1){ ?>
                    <li><a href="<?= base_url() ?>dashboard">Panel de Control</a></li>
                  <?php } ?>
                  <li><a href="account-orders.html">Orders List</a></li>
                  <li><a href="account-wishlist.html">Wishlist</a></li>
                <li class="sub-menu-separator"></li>
                <li><a href="<?= base_url() ?>auth/logout"> <i class="icon-unlock"></i>Salir</a></li>
              </ul>
            </div>

            <div class="cart"><a href="#"></a><i class="icon-bag"></i><span id="subconteo" class="count"><?php echo isset($cont)? $cont:"" ; ?></span><span class="subtotal" id="subtotalito">S/ <?php echo isset($total)? $total:"" ; ?></span>
              <div class="toolbar-dropdown" id="carrito">
                <?php  if (isset($listaCarrito)): ?>
                    <?php foreach ($listaCarrito as $fila2){ ?>
                <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="<?=base_url()?>plantilla/fotoProducto/<?=$fila2->imagen?>" alt="Product"></a>
                  <div class="dropdown-product-info"><span class="dropdown-product-title"><?=$fila2->titulo?></span><span class="dropdown-product-details"><?php echo $fila2->cantidad?> x S/<?php echo $fila2->precio?> = S/ <?php echo $fila2->cantidad*$fila2->precio?></span></div>
                </div>
                <?php } ?>
                  <?php endif; ?>

                <div class="toolbar-dropdown-group">
                  <div class="column"><span class="text-lg">Total:</span></div>
                  <div class="column text-right"><span class="text-lg text-medium">S/ <?php echo isset($total)? $total:"" ; ?>&nbsp;</span></div>
                </div>
                <div class="toolbar-dropdown-group">
                  <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="cart.html">View Cart</a></div>
                  <div class="column"><a class="btn btn-sm btn-block btn-success" href="checkout-address.html">Checkout</a></div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </header>