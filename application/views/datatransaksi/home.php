 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <?php $this->load->view('_layout/_meta'); ?>
 <?php $this->load->view('_layout/_css'); ?>
 <div class="box skin-blue sidebar-mini sidebar-collapse" id="halaman">
  <div class="box-header">
    <div class="col-md-30">
      <section class="content">
        <div class="row">
          <div class="col-md-30">
            <!-- Custom Tabs -->
            <script src="<?php echo base_url(); ?>assets/bootstrap/js/typeahead.min.js"></script>
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active" id="tab1"><a href="#tab_1" data-toggle="tab">Jual Ecer</a></li>
                <li id="tab2"><a href="#tab_2" data-toggle="tab">Jual Grosir</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <table>
                      <tr>
                        <th>Kode Barang</th>
                      </tr>
                      <tr>
                        <th><input type="text" name="kode_brg" id="kode_brg" onkeyup="cekbarang()" onchange="cekbarang()" class="form-control input-sm"></th>                     
                      </tr>
                      <div id="detail_barang" style="position:absolute;">
                      </div>
                    </table>
                  <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                    <thead>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th style="text-align:center;">Satuan</th>
                        <th style="text-align:center;">Harga(Rp)</th>
                        <th style="text-align:center;">Qty</th>
                        <th style="text-align:center;">Sub Total</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="isi_belanjaan">

                   </tbody>
                 </table>
                 <form action="<?php echo base_url().'Datatransaksi/simpan_penjualan'?>" method="post">
                  <table>
                    <tr>
                      <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg"> Simpan</button></td>
                      <th style="width:140px;">Total Belanja(Rp)</th>
                      <th style="text-align:right;width:140px;"><input type="text" name="total2" id="total2" value="<?php echo number_format($this->cart->total());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                      <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                    </tr>
                    <tr>
                      <th>Tunai(Rp)</th>
                      <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm FormatKey" style="text-align:right;margin-bottom:5px;" required></th>
                      <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                    </tr>
                    <tr>
                      <td></td>
                      <th>Kembalian(Rp)</th>
                      <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                    </tr>

                  </table>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
               <?php $this->load->view('datatransaksi/v_transaksi_grosir'); ?>
             </div>

             <!-- /.tab-pane -->
           </div>
           <!-- /.tab-content -->
         </div>
         <!-- nav-tabs-custom -->
       </div>
       <!-- /.col -->
     </div>
     <script type="text/javascript" language="javascript">
      $(document).ready(function(){
            $("#kode_brg").focus();
            $("#halaman").keypress(function(e){
              if (e.which == 71 && $("#tab1").hasClass('active')) 
              {
                $("#tab1").removeClass('active');
                $("#tab_1").removeClass('active');
                $("#tab2").addClass('active');
                $("#tab_2").addClass('active');
                $("#kode_brg_grosir").focus();

              }else if(e.which == 71 && $("#tab2").hasClass('active')){
                $("#tab2").removeClass('active');
                $("#tab_2").removeClass('active');
                $("#tab1").addClass('active');
                $("#tab_1").addClass('active');
                $("#kode_brg").focus();
              }
            });
          });

      function cekbarang() {
        var kode_brg = document.getElementById("kode_brg").value;
        if (kode_brg.length == 5) {
          var kobar = {kode_brg};
          $.ajax({
           type: "POST",
           url : "<?php echo base_url().'Datatransaksi/get_barang';?>",
           data: kobar,
           success: function(msg){
             $('#detail_barang').html(msg);
             document.getElementById("satuan").focus();
           }
         });
        }

      }

      function cekbarang_grosir() {
        var kode_brg = document.getElementById("kode_brg_grosir").value;
        if (kode_brg.length == 5) {
          var kobar = {kode_brg};
          $.ajax({
           type: "POST",
           url : "<?php echo base_url().'Datatransaksi/get_barang_grosir';?>",
           data: kobar,
           success: function(msg){
             $('#detail_barang_grosir').html(msg);
             document.getElementById("satuan_grosir").focus();
           }
         });
        }

      }

    </script>
    <script type="text/javascript">
      $(function(){
        $('#jml_uang').on("input",function(){
          var total=$('#total').val();
          var jumuang=$('#jml_uang').val();
          var hsl=jumuang.replace(/[^\d]/g,"");
          $('#jml_uang2').val(hsl);
          $('#kembalian').val(FormatNumber(hsl-total));
        })

      });
    </script>
    <?php $this->load->view('_layout/_js'); ?>