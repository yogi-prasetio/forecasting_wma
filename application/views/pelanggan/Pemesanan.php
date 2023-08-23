<section class="content">
  <div class="container-fluid">
    <?php if($this->session->flashdata('flash')) : ?>      
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php endif;  foreach ($barang as $r){ $stok = $r->stok_ready; } ?> 

    <div class="card">
      <div class="card-header">
        <h5 class="float-left"><?= $title; ?></h5>        
        <a href="<?= base_url("PesananController/AddPesanan"); ?>"><button type="submit" class="btn btn-primary float-right" 
          <?php if ($stok==0){ echo " disabled";} ?>><i class="fas fa-cart-plus"></i> Pesan</button></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="barang" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Bulan</th>
                <th>Stok Ready</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($barang as $bar){ ?> 
                <tr>
                  <td><?php echo $bar->nama_barang; ?></td>
                  <td><?php echo "Rp. ".$bar->harga; ?></td>
                  <td><?php echo $bar->bulan; ?></td>
                  <td><?php echo $bar->stok_ready; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</section>