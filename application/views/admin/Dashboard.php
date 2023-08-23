<?php
if($_SESSION['login'] == FALSE) {
	redirect('LoginController');
}
?>
<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3><?= $jml_pelanggan; ?></h3>

						<p>Pelanggan</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-stalker"></i>
					</div>
					<a href="<?= base_url('UserController')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-danger">
					<div class="inner">
						<h3><?= $jml_stok; ?></h3>

						<p>Stok Barang</p>
					</div>
					<div class="icon">
						<i class="ion ion-podium"></i>
					</div>
					<a href="<?= base_url('BarangController')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						<h3><?= $jml_transaksi; ?></h3>

						<p>Jumlah Transaksi</p>
					</div>
					<div class="icon">
						<i class="ion ion-cash"></i>
					</div>
					<a href="<?= base_url('PesananController')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
</section>