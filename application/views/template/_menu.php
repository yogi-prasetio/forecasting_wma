<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4" id="leftmenu">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url(); ?>assets/dist/img/logo-gas-circle.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .9"><span class="brand-text"><strong>Pangkalan</strong> Dadan</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-header nav-link"><b>MAIN NAVIGATION</b></li>           
          <?php if ($_SESSION['role'] == "admin") {?>  
            <li class="nav-item">
              <a href="<?= base_url();?>Page/Dashboard" class="nav-link <?php if($title == 'Dashboard') echo 'active' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>            
            </li>
            <li class="nav-item">
              <a href="<?= base_url(); ?>BarangController" class="nav-link <?php if($title == 'Data Stok Barang' || $title == 'Stok Barang') echo 'active' ?>">
                <i class="nav-icon fas fa-file"></i>
                <p>Data Stok Barang</p>
              </a>         
            </li>  
            <li class="nav-item">
              <a href="<?= base_url(); ?>UserController" class="nav-link <?php if($title == 'Data Pelanggan' || $title == 'Pelanggan') echo 'active' ?>">
                <i class="nav-icon fas fa-file"></i>
                <p>Data Pelanggan</p>
              </a>         
            </li>          
            <li class="nav-item">
              <a href="<?= base_url(); ?>PesananController" class="nav-link <?php if($title == 'Data Pesanan' || $title == 'Pemesanan Barang') echo 'active' ?>">
                <i class="nav-icon fas fa-file"></i>
                <p>Data Pesanan</p>
              </a>        
            </li>   
            <li class="nav-item">
              <a href="<?= base_url(); ?>PrediksiController" class="nav-link <?php if($title == 'Prediksi') echo 'active' ?>">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Prediksi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url(); ?>PesananController/Logbook" class="nav-link <?php if($title == 'Logbook Penjualan') echo 'active' ?>">
                <i class="nav-icon fas fa-print"></i>
                <p>Cetak Logbook </p>
              </a>         
            </ul>
          </li>
        <?php } else{ ?>
          <li class="nav-item">
            <a href="<?= base_url();?>Page/Utama" class="nav-link <?php if($title == 'Dashboard') echo 'active' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>BarangController/GetStokBarang" class="nav-link <?php if($title == 'Pemesanan Barang') echo 'active' ?>">
              <i class="fas fa-file nav-icon"></i>
              <p>Pemesanan Barang</p>
            </a>        
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>PesananController/GetPesanan/<?= $_SESSION['id_user'] ?>" class="nav-link <?php if($title == 'Riwayat Pesanan') echo 'active' ?>">
              <i class="fas fa-history nav-icon"></i>
              <p>Riwayat Pesanan</p>
            </a>        
          </li>
        <?php } ?>          
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?= $title; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <?php if($_SESSION['role']=='admin'){ ?>
            <li class="breadcrumb-item"><a href="<?= base_url('Page/Dashboard')?>">Home</a></li>
          <?php } else { ?>
            <li class="breadcrumb-item"><a href="<?= base_url('Page/Utama')?>">Home</a></li>
          <?php } ?>
            <li class="breadcrumb-item active"><?= $title; ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->