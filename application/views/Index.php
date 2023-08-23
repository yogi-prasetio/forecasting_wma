<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Pangkalan Dadan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!-- styles -->
  <link rel="stylesheet" href="<?= base_url()?>assets/landing/css/fancybox/jquery.fancybox.css">
  <link href="<?= base_url()?>assets/landing/css/bootstrap.css" rel="stylesheet" />
  <link href="<?= base_url()?>assets/landing/css/bootstrap-theme.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url()?>assets/landing/css/slippry.css">
  <link href="<?= base_url()?>assets/landing/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url()?>assets/landing/color/default.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome.min.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome.min.css"/>
  <script src="<?= base_url()?>assets/landing/js/modernizr.custom.js"></script>
</head>

<body>
  <header>

    <div id="navigation" class="navbar navbar-inverse navbar-fixed-top default" role="navigation">
      <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" >
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="aligncenter">
                  <h1 class="navbar-brand">Sistem Informasi Forecasting Persediaan Gas<br> Pangkalan Dadan</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </header>
  <!-- section intro -->
  <section id="works" class="section gray">
    <div class="container">
      <div class="row">
          <div class="aligncenter">
            <p class="h1"><strong>PANGKALAN GAS DADAN</strong></p>
            <p class="h1"><i class="fas fa-phone"></i> 0838 2441 6166</p>
            <p class="h1"><i class="fas fa-house-user"></i>Dusun PON Desa Geresik Kecamatan Ciawigebang - Kuningan</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="aligncenter">
          <a href="<?= base_url('LoginController')?>"><button class="btn btn-lg btn-primary">LOGIN</button></a>
          <a href="<?= base_url('LoginController/Daftar')?>"><button class="btn btn-lg btn-danger">DAFTAR</button></a>
        </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end intro -->

  <footer>
    <div class="verybottom">
        <div class="row">
            <div class="aligncenter">
              <p class="h3">
                &copy; 2022 Pangkalan Dadan - All right reserved
              </p>
            </div>
      </div>
    </div>
  </footer>
  <!-- javascript -->
  <script src="<?= base_url()?>assets/landing/js/jquery-1.9.1.min.js"></script>
  <script src="<?= base_url()?>assets/landing/js/jquery.easing.js"></script>
  <script src="<?= base_url()?>assets/landing/js/classie.js"></script>
  <script src="<?= base_url()?>assets/landing/js/bootstrap.js"></script>
  <script src="<?= base_url()?>assets/landing/js/slippry.min.js"></script>
  <script src="<?= base_url()?>assets/landing/js/nagging-menu.js"></script>
  <script src="<?= base_url()?>assets/landing/js/jquery.nav.js"></script>
  <script src="<?= base_url()?>assets/landing/js/jquery.scrollTo.js"></script>
  <script src="<?= base_url()?>assets/landing/js/jquery.fancybox.pack.js"></script>
  <script src="<?= base_url()?>assets/landing/js/jquery.fancybox-media.js"></script>
  <script src="<?= base_url()?>assets/landing/js/masonry.pkgd.min.js"></script>
  <script src="<?= base_url()?>assets/landing/js/imagesloaded.js"></script>
  <script src="<?= base_url()?>assets/landing/js/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url()?>assets/landing/js/AnimOnScroll.js"></script>
  <script>
    new AnimOnScroll(document.getElementById('grid'), {
      minDuration: 0.4,
      maxDuration: 0.7,
      viewportFactor: 0.2
    });
  </script>
  <script>
    $(document).ready(function () {
      $('#slippry-slider').slippry(
        defaults = {
          transition: 'vertical',
          useCSS: true,
          speed: 5000,
          pause: 3000,
          initSingle: false,
          auto: true,
          preload: 'visible',
          pager: false,
        }
        )
    });
  </script>

  <script src="<?= base_url()?>assets/landing/js/custom.js"></script>
  <!-- jQuery -->
  <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?= base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= base_url(); ?>assets/dist/js/pages/dashboard.js"></script>

  <!-- DataTables  & Plugins -->
  <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
</body>
</html>
