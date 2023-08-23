<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Pangkalan Dadan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url("assets") ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url("assets") ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url("assets") ?>/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <?php if($this->session->flashdata('flash')) : ?>      
      <div class="flash-daftar" data-flashdaftar="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php endif; ?>
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <p class="h1"><b>LOGIN</b></p>
      </div>
      <div class="card-body">
        <p class="login-box-msg"></p>

        <form action="<?= base_url()?>LoginController/login" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-circle"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <p style="color: red; font-size: 10pt;" align="center"><?php if(!empty($error)) echo $error; ?></p>
          <div class="block social-auth-links text-center mt-2 mb-3" >
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <div class="social-auth-links text-center">
            <p align="text-center">Belum punya akun? 
              <a href="<?= base_url("LoginController/Daftar"); ?>">
                Daftar
              </a></p>
            </div>
          </form>
          <!-- /.social-auth-links -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url("assets") ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets") ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url("assets") ?>/dist/js/adminlte.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/sweetalert2/myjs.js"></script>
  </body>
  </html>
