  <?php 
 echo view("estructuraDashboard/cabecera");
?>
  <?php 
 echo view("estructuraDashboard/barraLateralDashboard");
?>
  <?php 
 echo view("estructuraDashboard/navbar");
?>

      <section class="container padding-top-3x padding-bottom-3x">
<div class="row d-flex justify-content-center">
              <div class="col-lg-4 margin-bottom-1x" >
                <div class="card text-center" style="border-radius: 20px;">
                 <img class="d-block mx-auto rounded-circle mb-3 py-2" src="<?= base_url() ?>plantilla/img/iconos/carrito.png" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title">VENTAS</h4>
                    <?php if(isset($ventas)):?>
                    <h4 class="card-title">Cantidad: <?php echo $ventas; ?></h4>
                    <?php endif; ?>
                    <p class="card-text">Módulo de Ventas</p>
                    <a class="btn btn-outline-warning btn-sm" href="#">Entrar</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 margin-bottom-1x">
                <div class="card text-center" style="border-radius: 20px;">
                	<img class="d-block mx-auto rounded-circle mb-3 py-2" src="<?= base_url() ?>plantilla/img/iconos/producto.png" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title">PRODUCTOS</h4>
                    <?php if(isset($productos)):?>
                    <h4 class="card-title">Cantidad: <?php echo $productos; ?></h4>
                    <?php endif; ?>
                    <p class="card-text">Módulo de Productos</p>
                    <a class="btn btn-outline-warning btn-sm" href="<?=base_url()?>producto">Entrar</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 margin-bottom-1x">
                <div class="card text-center" style="border-radius: 20px;">
                	<img class="d-block mx-auto rounded-circle mb-3 py-2" src="<?= base_url() ?>plantilla/img/iconos/usuario.png" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title">USUARIOS</h4>
                    <?php if(isset($usuarios)):?>
                    <h4 class="card-title">Cantidad: <?php echo $usuarios; ?></h4>
                    <?php endif; ?>
                    <p class="card-text">Módulo de Usuarios</p>
                    <a class="btn btn-outline-warning btn-sm" href="<?= base_url() ?>usuario">Entrar</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 margin-bottom-1x">
                <div class="card text-center" style="border-radius: 20px;">
                  <img class="d-block mx-auto rounded-circle mb-3 py-2" src="<?= base_url() ?>plantilla/img/iconos/categoria.png" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title">CATEGORIAS</h4>
                    <?php if(isset($categorias)):?>
                    <h4 class="card-title">Cantidad: <?php echo $categorias; ?></h4>
                    <?php endif; ?>
                    <p class="card-text">Módulo de Categorias</p>
                    <a class="btn btn-outline-warning btn-sm" href="<?= base_url() ?>categoria">Entrar</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 margin-bottom-1x">
                <div class="card text-center" style="border-radius: 20px;">
                  <img class="d-block mx-auto rounded-circle mb-3 py-2" src="<?= base_url() ?>plantilla/img/iconos/marca.png" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title">MARCAS</h4>
                    <?php if(isset($marcas)):?>
                    <h4 class="card-title">Cantidad: <?php echo $marcas; ?></h4>
                    <?php endif; ?>
                    <p class="card-text">Módulo de Marcas</p>
                    <a class="btn btn-outline-warning btn-sm" href="<?= base_url() ?>marca">Entrar</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 margin-bottom-1x">
                <div class="card text-center" style="border-radius: 20px;">
                  <img class="d-block mx-auto rounded-circle mb-3 py-2" src="<?= base_url() ?>plantilla/img/iconos/carrusel.png" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title">CARRUSEL</h4>
                    <?php if(isset($carrusel)):?>
                    <h4 class="card-title">Cantidad: <?php echo $carrusel; ?></h4>
                    <?php endif; ?>
                    <p class="card-text">Módulo de Carrusel</p>
                    <a class="btn btn-outline-warning btn-sm" href="<?= base_url() ?>carrusel">Entrar</a>
                  </div>
                </div>
              </div>
            </div>
      </section>
   <?php 
 echo view("estructuraDashboard/footer");
?>
