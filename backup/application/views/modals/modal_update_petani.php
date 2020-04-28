<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Petani</h3>

  <form id="form-update-petani" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataPetani->id; ?>">
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Petani" name="Nama" aria-describedby="sizing-addon2" value="<?php echo $dataPetani->nama; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Alamat" name="Alamat" aria-describedby="sizing-addon2" value="<?php echo $dataPetani->alamat; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="number" class="form-control" placeholder="Telepon" name="Telepon" aria-describedby="sizing-addon2" value="<?php echo $dataPetani->telepon; ?>">
    </div>


    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data Petani</button>
      </div>
    </div>
  </form>
</div>