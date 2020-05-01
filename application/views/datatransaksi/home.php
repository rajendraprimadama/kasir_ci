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
            <?php $this->load->view('_layout/_header_transaksi'); ?>
          </div>

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
                  <div class="header-barang">
                    <table>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                      </tr>
                      <tr>
                        <th><input type="text" name="kode_brg" id="kode_brg" onkeyup="cekbarang()" onchange="cekbarang()" class="form-control input-sm fontKeyUp"></th>
                        <th><input type="text" name="nabar" value="" style="width:380px;margin-right:5px;" class="form-control input-sm"></th>               
                      </tr>
                      <div id="detail_barang" style="position:absolute;">
                      </div>
                    </table>
                    </div>
                  
                  <div class="content-list-barang">
                    <?php $this->load->view('datatransaksi/v_isi'); ?>
                  </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
               <?php $this->load->view('datatransaksigrosir/home'); ?>
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
           url : "<?php echo base_url().'Datatransaksigrosir/get_barang_grosir';?>",
           data: kobar,
           success: function(msg){
             $('#detail_barang_grosir').html(msg);
             document.getElementById("satuan_grosir").focus();
           }
         });
        }

      }

    </script>
    <?php $this->load->view('_layout/_js'); ?>