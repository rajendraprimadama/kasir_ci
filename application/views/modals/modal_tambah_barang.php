<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Barang</h3>

  <form id="form-tambah-barang" method="POST">
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-folder-close"></i>
      </span>
      <input type="text" class="form-control keyFontUp" placeholder="Nama Barang" name="v_namabrg" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" >Kategori Barang</span>
      <select id='kategori' name="v_kategori" style='width: 100%;' class="form-control">
        <?php
          foreach ($dataKategori as $key => $value) {
        ?>
          <option value='<?php echo $value->id; ?>'><?php echo $value->kategori;?></option>
          <!--masih menyimpan value dari tabel kategori belum menyimpan id dari tabel kategori ke tabel barang-->
        <?php
        }
        ?>
      </select>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-arrow-down"></i>
      </span>
      <input type="text" class="form-control FormatKey text-right" placeholder="Harga Beli" name="v_hrgbeli" aria-describedby="sizing-addon2" maxlength="10">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-share-alt"></i>
      </span>
      <input type="text" class="form-control FormatKey text-right" placeholder="Harga jual pcs retail" name="v_pcs_hrgjual_retail" aria-describedby="sizing-addon2" maxlength="10">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-random"></i>
      </span>
      <input type="text" class="form-control FormatKey text-right" placeholder="Harga jual pax retail" name="v_pax_hrgjual_retail" aria-describedby="sizing-addon2" maxlength="10">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-random"></i>
      </span>
      <input type="text" class="form-control FormatKey text-right" placeholder="Harga jual dus retail" name="v_dus_hrgjual_retail" aria-describedby="sizing-addon2" maxlength="10">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-share-alt"></i>
      </span>
      <input type="text" class="form-control FormatKey text-right" placeholder="Harga jual pcs grosir" name="v_pcs_hrgjual_grosir" aria-describedby="sizing-addon2" maxlength="10">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-random"></i>
      </span>
      <input type="text" class="form-control FormatKey text-right" placeholder="Harga jual pax grosir" name="v_pax_hrgjual_grosir" aria-describedby="sizing-addon2" maxlength="10">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-random"></i>
      </span>
      <input type="text" class="form-control FormatKey text-right" placeholder="Harga jual dus grosir" name="v_dus_hrgjual_grosir" aria-describedby="sizing-addon2" maxlength="10">
    </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data Barang</button>
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
</script>