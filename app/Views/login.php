<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login
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
          <a class="site-logo" href="<?= base_url() ?>home/index"><img src="<?= base_url() ?>plantilla/img/logo/logoNaty.png" alt="Naty"></a>
      </div>
      <!-- Page Content-->
      <div class="container mb-5" >
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <form class="login-box" method="post" action="<?= base_url() ?>auth/login">


              <h4 class="margin-bottom-1x text-center">Iniciar Sesión</h4>
              <div class="form-group input-group">
                <input class="form-control" name="correo" type="email" placeholder="correo" required><span class="input-group-addon"><i class="icon-mail"></i></span>
              </div>
              <div class="form-group input-group">
                <input class="form-control" name="password" type="password" placeholder="contraseña" required><span class="input-group-addon"><i class="icon-lock"></i></span>
              </div>
              <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
                <div class="custom-control custom-checkbox">


                <a class="navi-link" href="<?= base_url() ?>auth/vistaRegistro">no tienes cuenta?</a>
              </div>
             <!--  <a class="navi-link" href="account-password-recovery.html">Olvidaste tu contraseña?</a>-->
              </div>
              <?= csrf_field() ?>
              <div class="text-center text-sm-right">
                <button class="btn btn-warning margin-bottom-none" type="submit">Login</button>
              </div>
            </form>
          </div>
          <div class="col-md-3"></div>
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

            <?php  if (session()->get('success')): ?>
              <script>
                toastr.success('Registro Exitoso','Alerta',{"closeButton": false,"debug": false,"newestOnTop": false,"progressBar": true,"positionClass": "toast-bottom-right","preventDuplicates": false,"onclick": null,"showDuration": "300","hideDuration": "1000","timeOut": "5000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"});
              </script>
            <?php  endif; ?>


              <?php if(isset($validation)):?>
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
                                                                              "showDuration": "500",
                                                                              "hideDuration": "5000",
                                                                              "timeOut": "5000",
                                                                              "extendedTimeOut": "1000",
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
                                                                                "showDuration": "500",
                                                                                "hideDuration": "5000",
                                                                                "timeOut": "5000",
                                                                                "extendedTimeOut": "1000",
                                                                                "showEasing": "swing",
                                                                                "hideEasing": "linear",
                                                                                "showMethod": "fadeIn",
                                                                                "hideMethod": "fadeOut"
                                                                                              });
                </script>
              <?php endif; ?>
            <?php endif; ?>


                <?php  if (isset($mensaje)): ?>
                    <script>
                      toastr.error('<?php echo $mensaje; ?>','Alerta',{
                                                      "closeButton": true,
                                                      "debug": false,
                                                      "newestOnTop": false,
                                                      "progressBar": true,
                                                      "positionClass": "toast-top-right",
                                                      "preventDuplicates": false,
                                                      "onclick": null,
                                                      "showDuration": "500",
                                                      "hideDuration": "5000",
                                                      "timeOut": "5000",
                                                      "extendedTimeOut": "1000",
                                                      "showEasing": "swing",
                                                      "hideEasing": "linear",
                                                      "showMethod": "fadeIn",
                                                      "hideMethod": "fadeOut"
                                                                    });
                    </script>
                <?php  endif; ?>


  </body>

</html>
