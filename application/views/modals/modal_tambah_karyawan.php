<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Karyawan</h3>

  <form id="form-tambah-karyawan" method="POST">
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Karyawan" name="v_nama" aria-describedby="sizing-addon2" required>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-map-marker"></i>
      </span>
      <input type="text" class="form-control" placeholder="Alamat Karyawan" name="v_alamat" aria-describedby="sizing-addon2" required>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-phone"></i>
      </span>
      <input type="text" onkeypress="return Angkasaja(event)"  class="form-control" placeholder="Nomor Telephon" name="v_phone" aria-describedby="sizing-addon2" required>
    </div>

    <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-lock"></i>
        </span>
        <select class="form-control" name="v_authority" placeholder="tambah akses" onchange="addAccess()">
            <option value="no_access">TIDAK ADA AKSES</option>
            <option value="admin">ADMIN</option>
            <option value="kasir">KASIR</option>
        </select>
    </div>

    <div class="input-group form-group div-username hidden">
        <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-user"></i>
        </span>
        <input type="text"  class="form-control" placeholder="username" name="v_username" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group div-password hidden">
        <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-lock"></i>
        </span>
        <input type="text" class="form-control" placeholder="password" name="v_password" aria-describedby="sizing-addon2">
    </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data Karyawan</button>
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

    function addAccess() {
        let access = $('select[name=v_authority]').val()

        if(access == "no_access"){
            $('.div-username').addClass("hidden")
            $('.div-password').addClass("hidden")
            $('input[name=v_username]').prop('required',false)
            $('input[name=v_password]').prop('required',false)
        }
        else{
            $('.div-username').removeClass("hidden")
            $('.div-password').removeClass("hidden")
            $('input[name=v_username]').prop('required',true)
            $('input[name=v_password]').prop('required',true)
        }
    }
</script>