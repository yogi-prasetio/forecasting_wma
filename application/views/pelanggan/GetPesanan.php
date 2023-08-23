<section class="content">
  <div class="container-fluid">
    <?php if($this->session->flashdata('success')) : ?>      
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
    <?php endif; ?>
    <div class="card">
      <div class="card-header">
        <h5 class="float-left">Riwayat Pesanan</h5>
      </div>
      <div class="card-body">        
        <table id="example2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Transaksi</th>
              <th>Nama User</th>
              <th>Jumlah</th>
              <th>Harga Satuan</th>
              <th>Total Bayar</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach ($pesanan as $in){ 
              $query = $this->db->query("SELECT nama_user FROM tbl_user WHERE id_user = $in->id_user");
              $query2 = $this->db->query("SELECT harga FROM tbl_barang WHERE id_barang = $in->id_barang");

              foreach($query->result() as $data){
                foreach($query2->result() as $row){
                  ?> 
                  <tr>        
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $in->tgl_penjualan; ?></td>
                    <td><?php echo $data->nama_user; ?></td>
                    <td><?php echo $in->jumlah_barang; ?></td>
                    <td><?php echo "Rp. ".$row->harga; ?></td>
                    <td><?php echo "Rp. ".$row->harga*$in->jumlah_barang; ?></td>
                    <?php } } } ?></tr>
                    <?php if(empty($pesanan)){ ?>
                      <tr>        
                        <td colspan="6" align="center">Data masih kosong!</td>
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