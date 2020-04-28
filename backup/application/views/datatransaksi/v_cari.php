<div class="box">
  <div class="box-header">
      <div class="col-md-9">
          <section class="content">
            <div class="row">
              <form action="<?php echo base_url('datatransaksi/cari'); ?>" method="post">
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Filter Pencarian</h3>
                  </div>
                  <div class="box-body">
                    <div class="input-group">
                      <span class="input-group-addon">Nama Petani</span>
                        <select id='nama' name="nama" style='width: 200px;' class="form-control">
                          <?php 
                          $options = "";
                          foreach ($datapetani as $key => $value) {
                          ?>
                          <option value='<?php echo $value->id; ?>'><?php echo $value->nama;?></option>
                          <?php
                          }
                          ?>
                        </select>  
                    </div><br>

                    <div class="input-group">
                      <span class="input-group-addon">Dari Tanggal</span>
                        <input type="date" name="tanggal1" id="tanggal1"  class="form-control" placeholder="">
                      <span class="input-group-addon">Sampai</span>
                        <input type="date" name="tanggal2" id="tanggal2"  class="form-control" placeholder="">
                    </div><br>
        
                    <div class="input-group">
                    <span class="input-group-addon">Jenis pertanian</span>
                      <select id='jenis' name="jenis" style='width: 200px;' class="form-control">
                        <?php 
                          $options = "";

                          foreach ($datapertanian as $key => $value) {
                        ?>
                        <option value='<?php echo $value->jenis;?>'><?php echo $value->jenis;?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div><br>

                    <button class="form-control btn btn-primary"><i class="glyphicon glyphicon-repeat"></i> Proses</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>
   
      <!-- /.box-header -->
                    <div class="box-body">
                      <table id="" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                            <th>Dibeli(kg)</th>
                            <th>Harga(kg)</th>
                            <th>Total</th>
                            <th>Dibayar</th>
                            <th>Terhutang</th>
                            <th>Status</th>
                            <th style="text-align: center;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="">
                          <?php
foreach ($datatransaksi as $dtransaksi) {
  ?>
  <tr>
    <td width="10%"><?php echo $dtransaksi->nama; ?></td>
    <td width="10%"><?php echo $dtransaksi->jenis; ?></td>
    <td width="10%"><?php echo $dtransaksi->tanggal; ?></td>
    <td width="10%"><?php echo $dtransaksi->setor; ?></td>
    <td width="10%"><?php echo "Rp " . number_format($dtransaksi->hargaperkg, 0, ",", "."); ?></td>
    <td width="10%"><?php echo "Rp " . number_format($dtransaksi->total, 0, ",", "."); ?></td>
    <td width="10%"><?php echo "Rp " . number_format(((int)$dtransaksi->total-(int)$dtransaksi->tagihan), 0, ",", ".");?></td> <!--PR-->
    <td width="10%"><?php echo "Rp " . number_format($dtransaksi->tagihan, 0, ",", "."); ?></td>
    <td width="10%"><?php echo $dtransaksi->status; ?></td>
    <td class="text-center" style="width: 10%" ;">
      <?php
      if ($dtransaksi->tagihan == "0") {
        
      }else{
        ?>
        <button class="btn btn-warning update-dataDtransaksi" data-id="<?php echo $dtransaksi->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <?php
      }
      
      ?>
      <button class="btn btn-danger konfirmasiHapus-dtransaksi" data-id="<?php echo $dtransaksi->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Hapus</button>
    </td>
  </tr>
  <?php
}
?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                 
          

      <!--<?php echo $modal_tambah_pegawai; ?>-->

      <div id="tempat-modal"></div>

      <?php show_my_confirm('konfirmasiHapus', 'hapus-dataDtransaksi', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
      <?php
      $data['judul'] = 'Pegawai';
      $data['url'] = 'Pegawai/import';
      echo show_my_modal('modals/modal_import', 'import-pegawai', $data);
      ?>