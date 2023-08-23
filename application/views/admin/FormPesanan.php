<?php
foreach ($barang as $data){
	$id_barang = $data->id_barang;
	$stok = $data->stok_ready;
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
						<h3 class="card-title">Form <?= $title?></h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<form action="<?= base_url('PesananController/Insert'); ?>" method="post" id="transaksi">
							<div class="card-body">
								<input type="hidden" name="id_barang" class="form-control" id="id_barang" value="<?= $id_barang;?>" required>
								<input type="hidden" name="id_user" class="form-control" id="id_user" placeholder="Id User" value="<?=$_SESSION['id_user']?>">
								<div class="form-group">
									<label for="nama_user">Nama Pelanggan</label>
									<?php if($_SESSION['role'] == 'admin') { ?>
										<select name="id_user" class="form-control" required>
											<option selected disabled value="">--- Nama Pelanggan ---</option>
											<?php foreach($pelanggan as $pg) {?>
												<option value="<?= $pg->id_user ?>"><?= $pg->nama_user ?></option>
											<?php } ?>
										</select>
									<?php } else { ?>
										<input type="text" name="nama" class="form-control" id="nama_user" placeholder="Nama Pelanggan" value="<?=$_SESSION['nama']?>" readonly>
									<?php } ?>
								</div>
								<div class="form-group">
									<label for="tanggal">Tanggal</label>
									<input type="date" name="tgl_penjualan" class="form-control" id="tanggal" placeholder="Tanggal" value="<?php echo date('Y-m-d');?>" readonly>
								</div>								
								<div class="form-group">
									<label for="jumlah">Jumlah</label>
									<input type="number" name="jumlah_barang" class="form-control" id="jumlah" placeholder="Jumlah" onKeyUp="check();" required>
									<span id="notification" style="font-size: 10pt; color: red;"></span>
									<input type="hidden" name="stok_ready" class="form-control" id="stok_ready" value="<?= $stok;?>" readonly required>
								</div>
								<div class="form-group">
									<label for="tipe">Tipe Pesanan</label>
									<select name="tipe_pesanan" id="tipe_pesanan" class="form-control" required>
										<option selected disabled value="">---Pilih Tipe Pesanan---</option>
										<option value="Diambil" required>Diambil ke Toko</option>
										<option value="Diantar" required>Diantar ke Rumah</option>
									</select>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<?php if($_SESSION['role'] == 'admin') { ?>
									<button type="submit" id="submit" class="btn btn-primary float-right">Tambah</button>
								<?php } else { ?>
									<button type="submit" id="submit" class="btn btn-primary float-right">Pesan</button>
								<?php } ?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	function check() {
		var jumlah = parseInt(document.getElementById('jumlah').value);
		var stok = parseInt(document.getElementById('stok_ready').value);
		var tipe_pesanan = document.getElementById('tipe_pesanan').value;
		var element = document.getElementById('jumlah');
		var button = document.getElementById('submit');

		if(jumlah>stok){
			$(element).addClass('is-invalid');
			$(button).addClass('disabled');
			document.getElementById('notification').innerHTML = "Jumlah barang melebihi stok!";
		} else {
			$(element).removeClass('is-invalid');
			$(button).removeClass('disabled');
			document.getElementById('notification').innerHTML = "";
		}
	}
</script>