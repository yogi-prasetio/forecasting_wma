<section class="content">
  <?php if($this->session->flashdata('success')) { ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
    <?php } elseif($this->session->flashdata('failed')){?>
      <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('failed'); ?>"></div>
    <?php } ?>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h5 class="float-left"><?= $title; ?></h5>
        <div class="float-right"><a href="<?= base_url("UserController/AddPelanggan"); ?>" class="btn btn-primary">
          <i class="fas fa-user-plus"></i> Tambah</a></div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama <?= $title; ?></th>
                <th>Nomor HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach ($customer as $cus){ ?> 
                <tr>        
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $cus->nama_user; ?></td>
                  <td><?php echo $cus->no_hp; ?></td>
                  <td><?php echo $cus->alamat; ?></td>
                  <td align="center">                    
                    <a href="<?php echo base_url();?>UserController/UpdateCustomer/<?php echo $cus->id_user; ?>">
                      <button type="button" name="update" class="btn btn-success"><i class="fas fa-pen"></i></button></a>
                    </td>
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
