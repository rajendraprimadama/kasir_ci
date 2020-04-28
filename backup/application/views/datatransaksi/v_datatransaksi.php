<script>
  function tampiltanggal() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("tanggal");
    if (checkBox.checked == true){
      text.style.display = "none";
    } else {
     text.style.display = "block";
   }
 }

  function tampilbayar() {
    var checkBox = document.getElementById("bayarcheck");
    var text = document.getElementById("dibayar");
    if (checkBox.checked == true){
      text.style.display = "none";
    } else {
     text.style.display = "block";
   }
 }
 $(".chosen").chosen();
</script>
<!-- <script src='<?php echo base_url(); ?>assets/dist/js/jquery-3.2.1.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>assets/dist/js/select2.min.js' type='text/javascript'></script>

<link href='<?php echo base_url(); ?>assets/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
 --><body class="hold-transition skin-blue sidebar-mini">
  <div class="col-md-6">
    <section class="content">
      <div class="row">
        <form action="<?php echo base_url('datatransaksi/simpantransaksi'); ?>" method="post">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Transaksi</h3>
            </div>
            <div class="box-body">
              <div class="input-group input-group-sm">
                <select id='nama' name="nama" style='width: 200px;' class="form-control">
                  <?php 
                  $options = "";

                  foreach ($datapetani as $key => $value) {
                    ?>
                    <option value='<?php echo $value->id; ?>'><?php echo $value->nama;?></option>
                    <?php
                  }
                  ?>
                </select>   
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon">Jenis Pertanian</span>
                <select id='jenis' name="jenis" style='width: 200px;' class="form-control">
                  <?php 
                  $options = "";

                  foreach ($datapertanian as $key => $value) {
                    ?>
                    <option value='<?php echo $value->jenis;?>'><?php echo $value->jenis;?></option>
                    <?php
                  }
                  ?>
                </select>   
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon">Harga</span>
                <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga" oninput="hitung()">
                <span class="input-group-addon">Per</span>
                <input type="text" readonly="true" name="berat" class="form-control" value="1 KG">
              </div>
              <br>
              
              <div class="input-group">
                <span class="input-group-addon">Tanggal</span>
                <input type="date" name="tanggal" id="tanggal" style="display: none;" class="form-control" placeholder="">
              </div>
              <br/>
              <div class="input-group input-group-sm">
                <input type="checkbox" id="myCheck"  onclick="tampiltanggal()" checked>
                <span class="input-group-btn" style="width: auto; padding-left: 10px;">
                </span><p>Tanggal By Sistem</p>
              </div>

              <div class="input-group input-group-sm">
                <input type="checkbox" id="bayarcheck"  onclick="tampilbayar()" checked>
                <span class="input-group-btn" style="width: auto; padding-left: 10px; ">
                </span><p>Lunas</p>
              </div>
              
              <br/>
              <div class="input-group">
                <span class="input-group-addon">Total Dibeli (kg)</span>
                <input type="number" name="beli" id="beli" class="form-control date" placeholder="Total beli" oninput="hitung()">
                <span class="input-group-btn" style="width: 50px">
                  <input type="text" readonly="true" name="berats" class="form-control" value="KG">
                </span>
                
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon">Total Harus Dibayar</span>
                <input type="text" readonly="true" name="totalbayar" id="totalbayar" class="form-control" placeholder="">
                <input type="hidden" readonly="true" name="totalbayarh" id="totalbayarh" class="form-control" placeholder="">
                <span class="input-group-btn" style="width: auto;">
                  <input type="text" name="dibayar" id="dibayar" class="form-control" style="display: none;"  placeholder="Jumlah dibayar">
                </span>
              </div>
              <br/>
              
              <div class="input-group">
                <button type="submit" style= 'width: auto;' class="btn btn-block btn-social btn-google"> <i class="glyphicon glyphicon-plus-sign"></i> Tambah Transaksi </button>
              </div>
            </div>
          </form>
        </section>
      </div>
    </body>
    <script type="text/javascript">
      function hitung() {

        harga = document.getElementById("harga").value;
        jumlah = document.getElementById("beli").value;
        if (harga == "" || harga == 0) {
        }else{

          total = parseInt(harga) * parseInt(jumlah);
    //alert(total);
    if (isNaN(total)) {
      document.getElementById("totalbayar").value = 0;
    }else{
      var number_string = total.toString(),
      sisa  = number_string.length % 3,
      rupiah  = number_string.substr(0, sisa),
      ribuan  = number_string.substr(sisa).match(/\d{3}/g);

      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
      document.getElementById("totalbayar").value = "Rp "+rupiah;
      document.getElementById("totalbayarh").value = total;
    }
  }
}

</script>
</html>
