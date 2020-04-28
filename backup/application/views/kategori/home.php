<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding: 0;">
      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-kategori"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data Kategori Barang</button>
    </div>
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead class="text-uppercase">
        <tr>
          <th class="text-center" width="5%">NO</th>
          <th class="text-center">Kategori Barang</th>
          
          <th class="text-center" width="20%">Aksi</th>
        </tr>
      </thead>
      <!-- isi tabel merujuk pada asset/js/ajax.php dengan id data-barang-->
      <tbody id="data-kategori">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_kategori; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataKategori', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Posisi';
  $data['url'] = 'Posisi/import';
  echo show_my_modal('modals/modal_import', 'import-posisi', $data);
?>