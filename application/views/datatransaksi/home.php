  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <?php $this->load->view('_layout/_meta'); ?>
  <?php $this->load->view('_layout/_css'); ?>
  <div class="box skin-blue sidebar-mini sidebar-collapse">
    <div class="box-header">
      <div class="col-md-30">
        <section class="content">
          <div class="row">
            <div class="col-md-30">
              <!-- Custom Tabs -->
              <script src="<?php echo base_url(); ?>assets/bootstrap/js/typeahead.min.js"></script>
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Jual Ecer</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Jual Grosir</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <form action="<?php echo base_url().'Datatransaksi/add_to_cart'?>" method="post">
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
                    </form>
                    <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                      <thead>
                        <tr>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th style="text-align:center;">Satuan</th>
                          <th style="text-align:center;">Harga(Rp)</th>
                          <th style="text-align:center;">Diskon(Rp)</th>
                          <th style="text-align:center;">Qty</th>
                          <th style="text-align:center;">Sub Total</th>
                          <th style="width:100px;text-align:center;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; 

                        ?>

                        <?php foreach ($this->cart->contents() as $items): ?>
                          <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                          <tr>
                           <td><?=$items['id'];?></td>
                           <td><?=$items['name'];?></td>
                           <td style="text-align:center;"><?=$items['satuan'];?></td>
                           <td style="text-align:right;"><?php echo number_format($items['amount']);?></td>
                           <td style="text-align:right;"><?php echo number_format($items['disc']);?></td>
                           <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                           <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>

                           <td style="text-align:center;"><a href="<?php echo base_url().'Datatransaksi/remove/'.$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                         </tr>

                         <?php $i++; ?>
                       <?php endforeach; ?>
                     </tbody>
                   </table>
                 </div>
                 <!-- /.tab-pane -->
                 <div class="tab-pane" id="tab_2">
                  The European languages are members of the same family. Their separate existence is a myth.
                  For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                  in their grammar, their pronunciation and their most common words. Everyone realizes why a
                  new common language would be desirable: one could refuse to pay expensive translators. To
                  achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                  words. If several languages coalesce, the grammar of the resulting language is more simple
                  and regular than that of the individual languages.
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
            //Ajax kabupaten/kota insert
            $("#kode_brg").focus();
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
                 document.getElementById("qty").focus();
               }
             });
            }

          }
        </script>
        <?php $this->load->view('_layout/_js'); ?>