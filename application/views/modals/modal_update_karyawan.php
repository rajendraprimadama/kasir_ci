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

        <div class="input-group form-group">
          <span class="input-group-addon bg-warning">
              AKSES SISTEM
          </span>
          <select class="form-control v_authority-edit" name="v_authority" placeholder="tambah akses" onchange="addAccessEdit()">
              <option value="no_access">TIDAK ADA AKSES</option>
              <?php 
                $isSelected = '';
              foreach($ListAuthority as $key => $val){
                $isSelected = $val==$dataKaryawan->authority ? 'selected' : '';
              ?>

                <option value="<?php echo $val ?>" <?php echo $isSelected ?>><?php echo $val ?></option>
              
              <?php } ?>
          </select>
        </div>

          <div class="input-group form-group div-username-edit <?php echo $dataKaryawan->id_admin!= 0 ? '': 'hidden' ?>">
              <span class="input-group-addon" id="sizing-addon2">
                  <i class="glyphicon glyphicon-user"></i>
              </span>
              <input type="text"  class="form-control v_username-edit" placeholder="username" name="v_username" aria-describedby="sizing-addon2" value="<?php echo $dataKaryawan->username ?>">
          </div>

          <div class="input-group form-group div-password-edit <?php echo $dataKaryawan->id_admin!= 0 ? '': 'hidden' ?>">
              <span class="input-group-addon" id="sizing-addon2">
                  <i class="glyphicon glyphicon-lock"></i>
              </span>
              <input type="text" class="form-control v_password-edit" placeholder="password" name="v_password" aria-describedby="sizing-addon2">
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

<script type="text/javascript">
    function Angkasaja(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }

    function addAccessEdit() {
        let access = $('.v_authority-edit').val()

        if(access == "no_access"){
            $('.div-username-edit').addClass("hidden")
            $('.div-password-edit').addClass("hidden")
            $('.v_username-edit').prop('required',false)
            $('.v_password-edit').prop('required',false)
        }
        else{
            $('.div-username-edit').removeClass("hidden")
            $('.div-password-edit').removeClass("hidden")
            $('.v_username-edit').prop('required',true)
            $('.v_password-edit').prop('required',true)
        }
    }
</script>