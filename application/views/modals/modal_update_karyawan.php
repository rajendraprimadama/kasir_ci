<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Karyawan</h3>

  <form id="form-update-karyawan" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataKaryawan->id; ?>">

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="input-group form-group">
            <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-user"></i>
            </span>
            <input type="text" class="form-control keyFontUp" placeholder="Nama Karyawan" name="v_nama" aria-describedby="sizing-addon2" required value="<?php echo $dataKaryawan->name ?>">
        </div>

        <div class="input-group form-group">
            <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-map-marker"></i>
            </span>
            <input type="text" class="form-control keyFontUp" placeholder="Alamat Karyawan" name="v_alamat" aria-describedby="sizing-addon2" required value="<?php echo $dataKaryawan->address ?>">
        </div>

        <div class="input-group form-group">
            <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-phone"></i>
            </span>
            <input type="text" onkeypress="return Angkasaja(event)"  class="form-control" placeholder="Nomor Telephon" name="v_phone" aria-describedby="sizing-addon2" required value="<?php echo $dataKaryawan->phone ?>">
        </div>
      </div>
    </div>
    
    <hr style="margin-top:0px">
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data Barang</button>
      </div>
    </div>
  </form>
</div>