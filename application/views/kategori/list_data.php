<?php
  $no = 1;
  foreach ($dataKategori as $data_kategori) {
    ?>
    <tr>
      <td style="width: 5%;"><?php echo $no; ?></td>
      <td style="width: 20%;"><?php echo $data_kategori->kategori; ?></td>
      <td class="text-center" style="width:25%;">

        <button class="btn btn-warning update-dataKategori" data-id="<?php echo $data_kategori->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        
        <button class="btn btn-danger konfirmasiHapus-kategori" data-id="<?php echo $data_kategori->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
        
        
      </td>
    </tr>
    <?php
    $no++;
  }
?>