<?php

if(!empty($prediksi)){
  foreach ($prediksi as $value) {
    $bulan_prediksi = $value->bulan;
    $hasil = $value->hasil;
    $mad = $value->mad;
    $mse = $value->mse;
  }
}
?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php if($this->session->flashdata('success')) { ?>
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
        <?php } elseif($this->session->flashdata('failed')){?>
          <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('failed'); ?>"></div>
        <?php } ?>
        <div class="card">
          <div class="card-header">
            <h5 class="float-left"><?= $title; ?></h5>
            <div class="float-right"><a href="<?= base_url('PrediksiController/Cetak')?>"><button class="btn btn-primary" <?php if (empty($year)){ echo "disabled"; } ?>><i class="fas fa-print"></i> Cetak</button></a></div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <form name="bulan" method="POST" action="<?= base_url("PrediksiController/Prediksi")?>">
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
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                  </select>
                </div>
                <div class="form-group col-sm-4">
                  <div class="form-group">
                    <button type="submit" class="form-control btn btn-success" id="bulan">Prediksi</button>
                  </div>
                </div>
              </div>
            </form>
            <table id="prediksi" class="table table-bordered table-striped text-center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Bulan </th>
                  <th>Tahun</th>
                  <th>Hasil Penjualan</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                if (!empty($year)){
                  for ($row=0; $row<12; $row++){ ?> 
                    <tr>        
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $penjualan[$row]['month']; ?></td>
                      <td><?php echo $penjualan[$row]['year'];; ?></td>
                      <td><?php echo $penjualan[$row]['sold']; ?></td>
                    </tr>
                  <?php } ?>
                  <tr>  
                    <td colspan="3"><b>PREDIKSI BULAN <?= $bulan_prediksi; ?></b></td>
                    <td><b><?= $hasil; ?></b></td>
                  </tr>
                  <tr>  
                    <td colspan="3"><b><i>Mean Absolute Deviation</i> (MAD)</b></td>
                    <td><b><?= $mad; ?></b></td>
                  </tr>
                  <tr>  
                    <td colspan="3"><b><i>Mean Squared Error</i> (MSE)</b></td>
                    <td><b><?= $mse; ?></b></td>
                  </tr>
                <?php } else { ?>
                  <tr>  
                    <td colspan="4">Data masih kosong!</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>