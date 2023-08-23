<?php

$aksi = "Insert";
$id_barang = '';
$btn = "Tambah";
$name = '';
$harga = '';
$bulan = '';
$stok_awal = '';
$stok_ready = '';

if (!empty($barang)){
	$aksi = "Update";
	$btn = "Perbarui";
	foreach ($barang as $row) {
		$id_barang = $row->id_barang;
		$name = $row->nama_barang;
		$harga = $row->harga;
		$bulan = $row->bulan;
		$stok_awal = $row->stok_awal;
		$stok_ready = $row->stok_ready;
		$stok_sisa = 0;
	}
}

if (!empty($stok)){
	foreach ($stok as $data) {
		$stok_sisa = $data->stok_sisa;
	}
}
?>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<?php if($this->session->flashdata('flash')) : ?>      
					<div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('flash'); ?>"></div>
				<?php endif; ?>
				<!-- jquery validation -->
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Form <?= "$type $title"?></h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<form name="barang" method="POST" action="<?= base_url("BarangController/$aksi")?>">
							<div class="card-body">
								<input type="hidden" name="id" class="form-control" id="id" value="<?= $id_barang?>">
								<div class="form-group">
									<label for="name">Nama Barang</label>
									<input type="text" name="name" class="form-control" id="name" placeholder="Nama Barang" value="GAS LPG 3KG" readonly>
								</div>
								<div class="form-group">
									<label for="harga">Harga</label>
									<input type="number" name="harga" class="form-control" id="harga" placeholder="Harga" value="<?= $harga?>" required>
								</div>
								<div class="form-group">
									<label for="bulan">Bulan</label>
									<input type="date" name="bulan" class="form-control" id="bulan" placeholder="Bulan" value="<?= $bulan?>" <?php if(!empty($barang)) echo "readonly";?> required>
								</div>
								<div class="form-group">
									<label for="StokAwal">Stok Awal</label>
									<input type="number" name="stok_awal" class="form-control" id="StokAwal" placeholder="Stok Awal" value="<?= $stok_awal?>" onKeyUp="getStok();" <?php if(!empty($barang)) echo "readonly";?> required>
								</div>
								<input type="hidden" name="stok_sisa" class="form-control" id="StokSisa" placeholder="Stok Sisa" value="<?= $stok_sisa?>" required>
								<div class="form-group">
									<label for="StokReady">Stok Ready</label>
									<input type="number" name="stok_ready" class="form-control" id="StokReady" placeholder="Stok Ready" value="<?= $stok_ready?>" readonly>
								</div>								
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-primary float-right"><?=$btn?></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	function getStok(){
		var stokawal = parseInt(document.getElementById('StokAwal').value);
		var stok_sisa = parseInt(document.getElementById('StokSisa').value);
		var stok_ready = stokawal+stok_sisa;

		document.getElementById('StokReady').value = stok_ready;
	}
</script>