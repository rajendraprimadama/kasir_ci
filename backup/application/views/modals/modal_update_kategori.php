<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Kategori Barang</h3>

  <form id="form-update-kategori" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataKategori->id; ?>">
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tags"></i>
      </span>
      <input type="text" class="form-control" placeholder="Kategori Barang" name="Kategori" aria-describedby="sizing-addon2" value="<?php echo $dataKategori->kategori; ?>">
    </div>

        <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data Kategori sBarang</button>
      </div>
    </div>
  </form>
</div>