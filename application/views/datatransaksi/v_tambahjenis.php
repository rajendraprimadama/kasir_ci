<body class="hold-transition skin-blue sidebar-mini">
<div class="col-md-6">
<section class="content">
      <div class="row">
        <form action="<?php echo base_url('Datatransaksi/simpanjenis'); ?>" method="post">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Jenis Pertanian</h3>
            </div>
            <div class="box-body">
              <div class="input-group">
                <span class="input-group-addon">Jenis :</span>
                <input type="text" name="jenis" class="form-control" placeholder="Jenis Pertanian">
              </div>
              <br>
              <div class="col-xs-offset-8 col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
            </div>
          </div>
        </form>
    </section>
  </div>
</body>
</html>
