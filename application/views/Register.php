<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar | Pangkalan Dadan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <?php if($this->session->flashdata('flash')) : ?>      
      <div class="flash-daftar" data-flashdaftar="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php endif; ?>
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <p class="h1"><b>DAFTAR</b></p>
      </div>
      <div class="card-body">
        <form action="<?= base_url("LoginController/Register")?>" method="post" id="register">
          <div class="input-group mb-3">
            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>        
          <div class="input-group mb-3">
            <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="Nomor HP" minlength="11" maxlength="13" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat" required></textarea>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-house-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" id="username" placeholder="Username" minlength="4" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-circle"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" minlength="6" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="social-auth-links text-center">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p align="text-center">Sudah punya akun? 
            <a href="<?= base_url("LoginController"); ?>">
              Login
            </a></p>
          </div>
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- jquery-validation -->
    <script src="<?= base_url('assets') ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/sweetalert2/myjs.js"></script>
    <script>
      $(function () {
        $('#register').validate({
          rules: {
            name: {
              required: true
            },
            no_hp: {
              required: true,
              minlength: 11,
              maxlength: 13
            },
            alamat: {
              required: true
            },
            username: {
              required: true,
              minlength: 4
            },
            password: {
              required: true,
              minlength: 6
            },
          },
          messages: {
            name: "Nama tidak boleh kosong!",
            no_hp: {
              required: "Nomor Handphone tidak boleh kosong!",
              minlength: "Nomor handphone tidak valid!",
              maxlength: "Nomor handphone tidak valid!"
            },
            alamat: "Alamat tidak boleh kosong!",
            username: {
              required: "Username tidak boleh kosong!",
              minlength: "Username kurang dari 4 karakter"
            },
            password: {
              required: "Password tidak boleh kosong!",
              minlength: "Password kurang dari 6 karakter"
            },
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
        });
      });
    </script>
  </body>
  </html>
