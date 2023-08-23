
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
        <a href="<?= base_url("PesananController/AddPesanan"); ?>"><button type="submit" class="btn btn-primary float-right" 
          <?php if ($stok==0){ echo " disabled";} ?>><i class="fas fa-cart-plus"></i> Tambah</button></a>
        </div>
        <div class="card-body">        
          <table id="example2" class="table table-bordered table-striped">          
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>Nama User</th>
                <th>Jumlah</th>
                <th>Tipe Pesanan</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach ($pesanan as $in){ 
                $query = $this->db->query("SELECT nama_user FROM tbl_user WHERE id_user = $in->id_user;");
                foreach($query->result() as $data){
                  ?> 
                  <tr>        
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $in->tgl_penjualan; ?></td>
                    <td><?php echo $data->nama_user; ?></td>
                    <td><?php echo $in->jumlah_barang; ?></td>
                    <td><?php echo $in->tipe_pesanan; ?></td>
                  <?php } }?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </section>