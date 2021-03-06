<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding: 0;">
      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-petani"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data Petani</button>
    </div>
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Barang</th>
          <th>Kategori</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>

          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <!-- isi tabel merujuk pada ajax.php dengan id data-petani-->
      <tbody id="data-barang">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_petani; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPetani', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Posisi';
  $data['url'] = 'Posisi/import';
  echo show_my_modal('modals/modal_import', 'import-posisi', $data);
?>