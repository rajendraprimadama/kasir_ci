<?php
  $no = 1;
  foreach ($dataBarang as $data_barang) {
    ?>
    <tr>
      <td class="text-center"><?php echo $no; ?></td>
      <td class="text-center"><?php echo $data_barang->nmbrg; ?></td>
      <td class="text-center"><?php echo $data_barang->kategori; ?></td>
      <td class="text-center"><?php echo $data_barang->hrgbeli; ?></td>
      <td class="text-center"><?php echo $data_barang->hrgjual_retail; ?></td>
      <td class="text-center"><?php echo $data_barang->hrgjual_grosir; ?></td>
      <td class="text-center"><?php echo $data_barang->stok; ?></td>
      <td class="text-center">
        <button class="btn btn-warning update-dataBarang" data-id="<?php echo $data_barang->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-barang" data-id="<?php echo $data_barang->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>