<?php

$aksi = "Insert";
$subtitle = "Tambah";
$id_user = '';
$btn = "Tambah";
$name = '';
$alamat = '';
$no_hp = '';
$username = '';
$password = '';

if (!empty($customer)) {
	$aksi = "Update";
	$btn = "Perbarui";
	$subtitle = "Edit";
	foreach ($customer as $r) {
		$id_user = $r->id_user;
		$name = $r->nama_user;
		$alamat = $r->alamat;
		$no_hp = $r->no_hp;
		$username = $r->username;
		$password = $r->password;
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
						<h3 class="card-title">Form <?= $subtitle." ".$title?></h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<form name="user" method="POST" action="<?= base_url("UserController/$aksi")?>">
							<div class="card-body">
								<input type="hidden" name="id" id="id" value="<?= $id_user; ?>">
								<div class="form-group">
									<label for="name">Nama Lengkap</label>
									<input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap" value="<?= $name; ?>" required>
								</div>
								<div class="form-group">
									<label for="no_hp">Nomor Hp</label>
									<input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Handphone" minlength="11" maxlength="13" value="<?= $no_hp; ?>" required>
								</div>
								<div class="form-group">
									<label for="alamat">Alamat</label>
									<textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Lengkap" rows="4" required><?= $alamat; ?></textarea>
								</div>								
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" name="username" class="form-control" id="username" placeholder="Username" minlength="4" value="<?= $username; ?>" required>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" class="form-control" id="password" minlength="6" placeholder="Password"  required>
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
