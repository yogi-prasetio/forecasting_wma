<section class="content">
	<div class="container-fluid">   
		<div class="row">
			<!-- left column -->
			<div class="col-md-12"> 
				<?php if($this->session->flashdata('success')) { ?>
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
				<?php } elseif($this->session->flashdata('failed')){?>
					<div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('failed'); ?>"></div>
				<?php } ?>

				<div class="card">
					<div class="card-header">
						<h5 class="float-left"><?= $title; ?></h5>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<form name="logbook" method="POST" action="<?= base_url('PesananController/CetakLogbook'); ?>">
							<div class="row">
								<div class="form-group col-md-4">
									<select name="bulan" class="form-control" required>
										<option selected disabled value="">--Pilih Bulan--</option>
										<option value="01">Januari</option>
										<option value="02">Februari</option>
										<option value="03">Maret</option>
										<option value="04">April</option>
										<option value="05">Mei</option>
										<option value="06">Juni</option>
										<option value="07">Juli</option>
										<option value="08">Agustus</option>
										<option value="09">September</option>
										<option value="10">Oktober</option>
										<option value="11">November</option>
										<option value="12">Desember</option>
									</select>
								</div>
								<div class="form-group col-md-4"> 
									<select name="tahun" class="form-control" required>
										<option selected disabled value="">--Pilih Tahun--</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<button type="submit" class="form-control btn btn-primary">CETAK LOGBOOK</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>