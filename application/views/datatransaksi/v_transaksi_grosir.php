 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <?php $this->load->view('_layout/_meta'); ?>
 <?php $this->load->view('_layout/_css'); ?>
 <form action="<?php echo base_url().'Datatransaksi/add_to_cart_grosir'?>" method="post">
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
</form>
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
    <?php $i = 1; 
                        //print_r($this->cart->contents());
    ?>

    <?php foreach ($this->cart->contents() as $items): ?>
      <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
      <tr>
       <td><?=$items['id'];?></td>
       <td><?=$items['name'];?></td>
       <td style="text-align:center;"><?=$items['satuan'];?></td>
       <td style="text-align:right;"><?php echo number_format($items['amount']);?></td>
       <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
       <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>

       <td style="text-align:center;"><a href="<?php echo base_url().'Datatransaksi/remove/'.$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
     </tr>

     <?php $i++; ?>
   <?php endforeach; ?>
 </tbody>
</table>
<form action="<?php echo base_url().'Datatransaksi/simpan_penjualan_grosir'?>" method="post">
  <table>
    <tr>
      <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg"> Simpan</button></td>
      <th style="width:140px;">Total Belanja(Rp)</th>
      <th style="text-align:right;width:140px;"><input type="text" name="total2" value="<?php echo number_format($this->cart->total());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
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