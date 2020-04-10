<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Barang</h3>

  <form id="form-update-barang" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataBarang->id; ?>">
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-folder-close"></i>
      </span>
      <input type="text" class="form-control keyFontUp" placeholder="Nama Barang" name="Namabarang" aria-describedby="sizing-addon2" value="<?php echo $dataBarang->nmbrg; ?>">
    </div>

   

    <div class="input-group form-group">
      <span class="input-group-addon" >Kategori Barang</span>
      <select id='kategori' name="Kategori" style='width: 100%;' class="form-control">
        <?php 
          $options = "";
          foreach ($dataKategori as $key => $value) {
        ?>
          <option value='<?php echo $value->kategori; ?>'><?php echo $value->kategori;?></option>
          <!--masih menyimpan value kategori belum menyimpan id ke tabel barang-->
        <?php
        }
        ?>
      </select>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-arrow-down"></i>
      </span>
      <input type="text" class="form-control FormatKey text-right" placeholder="Harga Beli" name="Hrgbeli" aria-describedby="sizing-addon2" value="<?php echo $dataBarang->hrgbeli; ?>" maxlength="10">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-share-alt"></i>
      </span>
      <input type="text" class="form-control FormatKey text-right" placeholder="Harga Ecer" name="Hrgjual" aria-describedby="sizing-addon2" value="<?php echo $dataBarang->hrgjual_retail; ?>" maxlength="10">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-random"></i>
      </span>
      <input type="text" class="form-control FormatKey text-right" placeholder="Harga Grosir" name="Hrgjualgrosir" aria-describedby="sizing-addon2" value="<?php echo $dataBarang->hrgjual_grosir; ?>" maxlength="10">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tags"></i>
      </span>
      <input type="text" class="form-control FormatKey text-right" placeholder="Stok Barang" name="stok" aria-describedby="sizing-addon2" maxlength="5" value="<?php echo $dataBarang->stok; ?>">
    </div>


    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data Barang</button>
      </div>
    </div>
  </form>
</div>