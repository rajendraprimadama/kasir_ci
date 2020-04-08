<?php
  $no = 1;
  foreach ($dataBarang as $data_barang) {
    ?>
    <tr>
      <td style="width: 10%;"><?php echo $no; ?></td>
      <td style="width: 25%;"><?php echo $data_barang->nmbrg; ?></td>
      <td style="width: 15%;"><?php echo $data_barang->kategori; ?></td>
      <td style="width: 15%;"><?php echo $data_barang->hrgbeli; ?></td>
      <td style="width: 10%;"><?php echo $data_barang->hrgjual; ?></td>
      <td style="width: 10%;"><?php echo $data_barang->hrgjual; ?></td>
      <td class="text-center" style="width:15%;">

        <button class="btn btn-warning update-dataBarang" data-id="<?php echo $data_barang->id; ?>"><i class="glyphicon glyphicon-repeat"></i> </button>
        
        <button class="btn btn-danger konfirmasiHapus-barang" data-id="<?php echo $data_barang->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> </button>
        
        
      </td>
    </tr>
    <?php
    $no++;
  }
?>