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
						<h3><?= $jml_stok; ?></h3>

						<p>Stok Barang</p>
					</div>
					<div class="icon">
						<i class="ion ion-podium"></i>
					</div>
					<a href="<?= base_url('BarangController/GetStokBarang')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						<h3><?= $jml_pesanan; ?></h3>

						<p>Jumlah Pesanan Sebelumnya</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="<?= base_url()?>PesananController/GetPesanan/<?= $_SESSION['id_user']?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
</section>