<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Registro
    </title>
    <meta name="author" content="Victor Islachin">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>plantilla/favicon2.ico">
    <link rel="icon" type="image/png" href="<?= base_url() ?>plantilla/favicon2.png">
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="<?= base_url() ?>plantilla/css/vendor.min.css">
    <!-- Main Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="<?= base_url() ?>plantilla/css/styles.min.css">
    <!-- Customizer Styles-->
    <link rel="stylesheet" media="screen" href="<?= base_url() ?>plantilla/customizer/customizer.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Modernizr-->
    <script src="<?= base_url() ?>plantilla/js/modernizr.min.js"></script>

  </head>
  <!-- Body-->
  <body>

    <!-- Off-Canvas Wrapper-->
    <header style="width:100%; height:95vh;">
      <!-- Page Title-->
      <div class="page-title" style="padding:3px 0;">
          <a class="site-logo" href="<?= base_url() ?>home/index"><img src="<?= base_url() ?>plantilla/img/logo/logoNaty.png" alt="Marca"></a>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="padding-top-3x hidden-md-up"></div>
            <h3 class="margin-bottom-1x">Registro de Usuario</h3>
            <p>Llene todos los campos con la información requerida.</p>
            <form class="row" method="post" action="<?= base_url() ?>auth/nuevoRegistro">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-fn">Nombres</label>
                  <input class="form-control" type="text" id="reg-fn" name="nombres" value="<?=old('nombres') ?>" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-ln">Apellidos</label>
                  <input class="form-control" type="text" id="reg-ln" name="apellidos" value="<?=old('apellidos') ?>" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-email">Correo</label>
                  <input class="form-control" type="email" id="reg-email" name="correo" value="<?=old('correo') ?>" autocomplete="nope" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-phone">Celular</label>
                  <input class="form-control" type="text" id="reg-phone" name="celular" value="<?=old('celular') ?>" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-pass">Password</label>
                  <input class="form-control" type="password" id="reg-pass" name="password" value="<?=old('password') ?>" autocomplete="nope" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-pass-confirm">Confirmar Password</label>
                  <input class="form-control" type="password" id="reg-pass-confirm" name="confirmar_pasword" value="<?=old('confirmar_pasword') ?>" required>
                </div>
              </div>

              <?= csrf_field() ?>

              <div class="col-12 text-center text-sm-right">
                <input class="btn btn-warning margin-bottom-none" type="submit" value="Registrar">
              </div>
            </form>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>

      </header>

         <!-- Site Footer-->
    <footer style="width:100%; height:5vh; background-color:#374250;">
      <div class="container" style="height:100%;display: flex;align-items: center;align-content: center;justify-content: center;flex-wrap: nowrap;">
        <hr class="hr-light">
        <!-- Copyright-->
        <span class="text-center align-middle text-white">© Desarrollado por Victor Islachin</span>
      </div>
    </footer>

    <!-- Back To Top Button-->
    <a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="<?= base_url() ?>plantilla/js/vendor.min.js"></script>
    <script src="<?= base_url() ?>plantilla/js/scripts.min.js"></script>
    <!-- Customizer scripts-->
    <script src="<?= base_url() ?>plantilla/customizer/customizer.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <?php if(isset($validation)):?>
                <?php if($validation->getError('nombres')!=""):?>

                  <script>
                     toastr.error('<?php echo $validation->getError('nombres'); ?>','Alerta',{
                                                                              "closeButton": true,
                                                                              "debug": false,
                                                                              "newestOnTop": false,
                                                                              "progressBar": true,
                                                                              "positionClass": "toast-top-right",
                                                                              "preventDuplicates": false,
                                                                              "onclick": null,
                                                                              "showDuration": "10000",
                                                                              "hideDuration": "5000",
                                                                              "timeOut": "10000",
                                                                              "extendedTimeOut": "5000",
                                                                              "showEasing": "swing",
                                                                              "hideEasing": "linear",
                                                                              "showMethod": "fadeIn",
                                                                              "hideMethod": "fadeOut"
                                                                                });
                  </script>
              <?php endif; ?>

              <?php if($validation->getError('apellidos')!=""):?>
                <script>
                  toastr.error('<?php echo $validation->getError('apellidos'); ?>','Alerta',{
                                                                                "closeButton": true,
                                                                                "debug": false,
                                                                                "newestOnTop": false,
                                                                                "progressBar": true,
                                                                                "positionClass": "toast-top-right",
                                                                                "preventDuplicates": false,
                                                                                "onclick": null,
                                                                                "showDuration": "10000",
                                                                                "hideDuration": "5000",
                                                                                "timeOut": "10000",
                                                                                "extendedTimeOut": "5000",
                                                                                "showEasing": "swing",
                                                                                "hideEasing": "linear",
                                                                                "showMethod": "fadeIn",
                                                                                "hideMethod": "fadeOut"
                                                                                              });
                </script>
              <?php endif; ?>

              <?php if($validation->getError('correo')!=""):?>
                <script>
                  toastr.error('<?php echo $validation->getError('correo'); ?>','Alerta',{
                                                                                "closeButton": true,
                                                                                "debug": false,
                                                                                "newestOnTop": false,
                                                                                "progressBar": true,
                                                                                "positionClass": "toast-top-right",
                                                                                "preventDuplicates": false,
                                                                                "onclick": null,
                                                                                "showDuration": "10000",
                                                                                "hideDuration": "5000",
                                                                                "timeOut": "10000",
                                                                                "extendedTimeOut": "5000",
                                                                                "showEasing": "swing",
                                                                                "hideEasing": "linear",
                                                                                "showMethod": "fadeIn",
                                                                                "hideMethod": "fadeOut"
                                                                                              });
                </script>
              <?php endif; ?>

              <?php if($validation->getError('celular')!=""):?>
                <script>
                  toastr.error('<?php echo $validation->getError('celular'); ?>','Alerta',{
                                                                                "closeButton": true,
                                                                                "debug": false,
                                                                                "newestOnTop": false,
                                                                                "progressBar": true,
                                                                                "positionClass": "toast-top-right",
                                                                                "preventDuplicates": false,
                                                                                "onclick": null,
                                                                                "showDuration": "10000",
                                                                                "hideDuration": "5000",
                                                                                "timeOut": "10000",
                                                                                "extendedTimeOut": "5000",
                                                                                "showEasing": "swing",
                                                                                "hideEasing": "linear",
                                                                                "showMethod": "fadeIn",
                                                                                "hideMethod": "fadeOut"
                                                                                              });
                </script>
              <?php endif; ?>

              <?php if($validation->getError('password')!=""):?>
                <script>
                  toastr.error('<?php echo $validation->getError('password'); ?>','Alerta',{
                                                                                "closeButton": true,
                                                                                "debug": false,
                                                                                "newestOnTop": false,
                                                                                "progressBar": true,
                                                                                "positionClass": "toast-top-right",
                                                                                "preventDuplicates": false,
                                                                                "onclick": null,
                                                                                "showDuration": "10000",
                                                                                "hideDuration": "5000",
                                                                                "timeOut": "10000",
                                                                                "extendedTimeOut": "5000",
                                                                                "showEasing": "swing",
                                                                                "hideEasing": "linear",
                                                                                "showMethod": "fadeIn",
                                                                                "hideMethod": "fadeOut"
                                                                                              });
                </script>
              <?php endif; ?>

              <?php if($validation->getError('confirmar_pasword')!=""):?>
                <script>
                  toastr.error('<?php echo $validation->getError('confirmar_pasword'); ?>','Alerta',{
                                                                                "closeButton": true,
                                                                                "debug": false,
                                                                                "newestOnTop": false,
                                                                                "progressBar": true,
                                                                                "positionClass": "toast-top-right",
                                                                                "preventDuplicates": false,
                                                                                "onclick": null,
                                                                                "showDuration": "10000",
                                                                                "hideDuration": "5000",
                                                                                "timeOut": "10000",
                                                                                "extendedTimeOut": "5000",
                                                                                "showEasing": "swing",
                                                                                "hideEasing": "linear",
                                                                                "showMethod": "fadeIn",
                                                                                "hideMethod": "fadeOut"
                                                                                              });
                </script>
              <?php endif; ?>

            <?php endif; ?>


  </body>

</html>
