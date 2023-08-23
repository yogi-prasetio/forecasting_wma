<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Groovin one page bootstrap template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!-- styles -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/fancybox/jquery.fancybox.css">
  <link href="<?= base_url() ?>assets/landing/css/bootstrap.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/landing/css/bootstrap-theme.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/slippry.css">
  <link href="<?= base_url() ?>assets/landing/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/landing/color/default.css">
  <!-- =======================================================
    Theme Name: Groovin
    Theme URL: https://bootstrapmade.com/groovin-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
  <script src="<?= base_url() ?>assets/landing/js/modernizr.custom.js"></script>
</head>

<body>
  <header>

    <div id="navigation" class="navbar navbar-inverse navbar-fixed-top default" role="navigation">
      <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <p class="navbar-brand" align="center" style="height: 100px;">Sistem Informasi Forecasting Persediaan Dalam Penentuan Distribusi Gas Pangkalan Dadan</center></h1></p>
        </div>
      </div>
    </div>

  </header>
  <!-- section intro -->
  <section id="intro">
    <ul id="slippry-slider">
      <li>
        <a href="#slide1"><img src="<?= base_url() ?>assets/dist/img/gas.png"></a>
      </li>
      <li>
        <a href="#slide2"><img src="<?= base_url() ?>assets/dist/img/gas2.png"></a>
      </li>
      <li>
        <a href="#slide3"><img src="<?= base_url() ?>assets/dist/img/pangkalan.jpg"></a>
      </li>
    </ul>
  </section>
  <!-- end intro -->
  <footer>
    <div class="verybottom">
      <div class="container">        
        <div class="row">
          <div class="col-md-12">
            <div class="aligncenter">
              <p>
                &copy; 2022 Pangkalan Dadan - All right reserved
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- javascript -->
  <script src="<?= base_url() ?>assets/landing/js/jquery-1.9.1.min.js"></script>
  <script src="<?= base_url() ?>assets/landing/js/jquery.easing.js"></script>
  <script src="<?= base_url() ?>assets/landing/js/classie.js"></script>
  <script src="<?= base_url() ?>assets/landing/js/bootstrap.js"></script>
  <script src="<?= base_url() ?>assets/landing/js/slippry.min.js"></script>
  <script src="<?= base_url() ?>assets/landing/js/nagging-menu.js"></script>
  <script src="<?= base_url() ?>assets/landing/js/jquery.nav.js"></script>
  <script src="<?= base_url() ?>assets/landing/js/jquery.scrollTo.js"></script>
  <script src="<?= base_url() ?>assets/landing/js/jquery.fancybox.pack.js"></script>
  <script src="<?= base_url() ?>assets/landing/js/jquery.fancybox-media.js"></script>
  <script src="<?= base_url() ?>assets/landing/js/masonry.pkgd.min.js"></script>
  <script src="<?= base_url() ?>assets/landing/js/imagesloaded.js"></script>
  <script src="<?= base_url() ?>assets/landing/js/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url() ?>assets/landing/js/AnimOnScroll.js"></script>
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

  <script src="<?= base_url() ?>assets/landing/js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>
</html>
