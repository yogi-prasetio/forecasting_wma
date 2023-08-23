<section class="content">
  <div class="container-fluid">    
    <?php if($this->session->flashdata('success')) { ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
    <?php } elseif($this->session->flashdata('failed')){?>
      <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('failed'); ?>"></div>
    <?php } ?>

    <div class="card">
      <div class="card-header">
        <h5 class="float-left"><?= $title; ?></h5>
        <div class="float-right"><a href="<?= base_url("barangController/AddBarang"); ?>" class="btn btn-primary"><i class="fas fa-folder-plus"></i> Tambah</a></div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Bulan</th>
              <th>Stok Awal</th>
              <th>Stok Ready</th>
              <th>Jumlah Penjualan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;              
            foreach ($barang as $bar){ ?> 
              <tr>        
                <td><?php echo $no++; ?></td>
                <td><?php echo $bar->nama_barang; ?></td>
                <td><?php echo $bar->harga; ?></td>
                <td><?php echo $bar->bulan; ?></td>
                <td><?php echo $bar->stok_awal; ?></td>
                <td><?php echo $bar->stok_ready; ?></td>
                <td><?php echo $bar->stok_awal-$bar->stok_ready; ?></td>
                <td align="center">
                  <a href="<?php echo base_url();?>BarangController/UpdateBarang/<?php echo $bar->id_barang; ?>" class="btn btn-success"><i class="fas fa-pen"></i></a>
                  <a href="<?php echo base_url();?>BarangController/Delete/<?php echo $bar->id_barang; ?>" id="btn-delete" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
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