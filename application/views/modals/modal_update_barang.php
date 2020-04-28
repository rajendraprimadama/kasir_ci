<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Barang</h3>

  <form id="form-update-barang" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataBarang->id; ?>">

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-barcode"></i>
          </span>
          <input type="text" class="form-control v_barcode" placeholder="Barcode" name="v_barcode" aria-describedby="sizing-addon2" value="<?php echo $dataBarang->barcode_brg; ?>" readonly>
        </div>

        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-folder-close"></i>
          </span>
          <input type="text" class="form-control keyFontUp" placeholder="Nama Barang" name="v_namabrg" aria-describedby="sizing-addon2" value="<?php echo $dataBarang->nama_brg; ?>" readonly>
        </div>

        <div class="input-group form-group">
          <span class="input-group-addon" >Kategori Barang</span>
          <select id='kategori' name="v_kategori" style='width: 100%;' class="form-control">
            <?php 
              foreach ($dataKategori as $key => $value) {
                $isSelected = "";
                if($value->id ==  $dataBarang->kategori) {
                  $isSelected = "selected";
                }
            ?>
              <option value='<?php echo $value->id; ?>' <?php echo $isSelected ?>><?php echo $value->kategori;?></option>
              <!--masih menyimpan value kategori belum menyimpan id ke tabel barang-->
            <?php
            }
            ?>
          </select>
        </div>

        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-usd"></i>
          </span>
          <input type="text" class="form-control FormatKey text-right v_hrgbeli" placeholder="Harga Beli" name="v_hrgbeli" aria-describedby="sizing-addon2" maxlength="10" value="<?php echo $dataBarang->hrg_beli; ?>">
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <fieldset>
                <legend class="custom text-uppercase">retail</legend>
                <div class="input-group form-group">
                  <span class="input-group-addon" id="sizing-addon2">
                    <i class="glyphicon glyphicon-tag"></i>
                  </span>
                  <input type="text" class="form-control FormatKey text-right sell" placeholder="Harga jual pcs retail" name="v_pcs_hrgjual_retail" aria-describedby="sizing-addon2" maxlength="10" value="<?php echo $dataBarang->pcs_hrgjual_retail; ?>">
                </div>

                <div class="input-group form-group">
                  <span class="input-group-addon" id="sizing-addon2">
                    <i class="glyphicon glyphicon-tag"></i>
                  </span>
                  <input type="text" class="form-control FormatKey text-right sell" placeholder="Harga jual pax retail" name="v_pax_hrgjual_retail" aria-describedby="sizing-addon2" maxlength="10" value="<?php echo $dataBarang->pax_hrgjual_retail; ?>">
                </div>

                <div class="input-group form-group">
                  <span class="input-group-addon" id="sizing-addon2">
                    <i class="glyphicon glyphicon-tag"></i>
                  </span>
                  <input type="text" class="form-control FormatKey text-right sell" placeholder="Harga jual dus retail" name="v_dus_hrgjual_retail" aria-describedby="sizing-addon2" maxlength="10" value="<?php echo $dataBarang->dus_hrgjual_retail; ?>">
                </div>
            </fieldset>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6">
              <fieldset>
                <legend class="custom text-uppercase">grosir</legend>
                <div class="input-group form-group">
                  <span class="input-group-addon" id="sizing-addon2">
                    <i class="glyphicon glyphicon-tags"></i>
                  </span>
                  <input type="text" class="form-control FormatKey text-right sell" placeholder="Harga jual pcs grosir" name="v_pcs_hrgjual_grosir" aria-describedby="sizing-addon2" maxlength="10" value="<?php echo $dataBarang->pcs_hrgjual_grosir; ?>">
                </div>

                <div class="input-group form-group">
                  <span class="input-group-addon" id="sizing-addon2">
                    <i class="glyphicon glyphicon-tags"></i>
                  </span>
                  <input type="text" class="form-control FormatKey text-right sell" placeholder="Harga jual pax grosir" name="v_pax_hrgjual_grosir" aria-describedby="sizing-addon2" maxlength="10" value="<?php echo $dataBarang->pax_hrgjual_grosir; ?>">
                </div>

                <div class="input-group form-group">
                  <span class="input-group-addon" id="sizing-addon2">
                    <i class="glyphicon glyphicon-tags"></i>
                  </span>
                  <input type="text" class="form-control FormatKey text-right sell" placeholder="Harga jual dus grosir" name="v_dus_hrgjual_grosir" aria-describedby="sizing-addon2" maxlength="10" value="<?php echo $dataBarang->dus_hrgjual_grosir; ?>">
                </div>
              </fieldset>
            </div>

          </div>
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
  
  $(document).ready(function(){
    masking();

    $(document).on('change', '.v_hrgbeli', function(event){
        event.preventDefault();
        var arrObj = [
          'v_pcs_hrgjual_retail',
          'v_pax_hrgjual_retail',
          'v_dus_hrgjual_retail',
          'v_pcs_hrgjual_grosir',
          'v_pax_hrgjual_grosir',
          'v_dus_hrgjual_grosir'
        ];

        arrObj.forEach((item) => {
          $(`input[name=${item}]`).val('')
        })
    })

    $(document).on('change', '.sell', function(event){
        event.preventDefault();
        CheckSell(this) 
    })
  })

  const CheckSell = (param) => {
    let buy = $('input[name=v_hrgbeli]').val()
    let sell = $(param).val()
    
    if (buy==0 || buy.length==0) {
      myAlert('error','Harga jual tidak boleh lebih kecil dari harga beli')
      // alert('Harga beli tidak boleh kosong atau 0')
      $(param).val('')
    }
    else {
      if (sell < buy) {
        myAlert('error','Harga jual tidak boleh lebih kecil dari harga beli')
        // alert('Harga jual tidak boleh lebih kecil dari harga beli')
        $(param).val('')
      }
    }
  }
</script>