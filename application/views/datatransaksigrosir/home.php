 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <?php $this->load->view('_layout/_meta'); ?>
 <?php $this->load->view('_layout/_css'); ?>
 <table>
  <tr>
    <th>Kode Barang</th>
  </tr>
  <tr>
    <th><input type="text" name="kode_brg_grosir" id="kode_brg_grosir" onkeyup="cekbarang_grosir()" onchange="cekbarang_grosir()" class="form-control input-sm"></th>                     
  </tr>
  <div id="detail_barang_grosir" style="position:absolute;">
  </div>
</table>
<div class="content-list-barang-grosir">
  <?php $this->load->view('datatransaksigrosir/v_isi_grosir'); ?>
</div>
