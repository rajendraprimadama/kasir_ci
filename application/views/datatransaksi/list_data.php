<?php
foreach ($dataDtransaksi as $dtransaksi) {
  ?>
  <tr>
    <td width="10%"><?php echo $dtransaksi->nama; ?></td>
    <td width="10%"><?php echo $dtransaksi->jenis; ?></td>
    <td width="10%"><?php echo $dtransaksi->tanggal; ?></td>
    <td width="10%"><?php echo $dtransaksi->setor; ?></td>
    <td width="10%"><?php echo "Rp " . number_format($dtransaksi->hargaperkg, 0, ",", "."); ?></td>
    <td width="10%"><?php echo "Rp " . number_format($dtransaksi->total, 0, ",", "."); ?></td>
    <td width="10%"><?php echo "Rp " . number_format(((int)$dtransaksi->total-(int)$dtransaksi->tagihan), 0, ",", ".");?></td> <!--PR-->
    <td width="10%"><?php echo "Rp " . number_format($dtransaksi->tagihan, 0, ",", "."); ?></td>
    <td width="10%"><?php echo $dtransaksi->status; ?></td>
    <td class="text-center" style="width: 10%" ;>
      <?php
      if ($dtransaksi->tagihan == "0") {
        
      }else{
        ?>
        <button class="btn btn-warning update-dataDtransaksi" data-id="<?php echo $dtransaksi->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <?php
      }
      
      ?>
      <button class="btn btn-danger konfirmasiHapus-dtransaksi" data-id="<?php echo $dtransaksi->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Hapus</button>
    </td>
  </tr>
  <?php
}
?>