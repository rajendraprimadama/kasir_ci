<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding: 0;">
      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-supplier"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data Supplier</button>
    </div>
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Supplier</th>
          <th>Perusahaan</th>
          <th>Alamat</th>
          <th>Telephone</th>
          <th>Email</th>
          
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <!-- isi tabel merujuk pada asset/js/ajax.php dengan id data-supplier-->
      <tbody id="data-supplier">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_supplier; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataSupplier', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Posisi';
  $data['url'] = 'Posisi/import';
  echo show_my_modal('modals/modal_import', 'import-posisi', $data);
?>