<?php
  $no = 1;
  foreach ($dataPetani as $data_petani) {
    ?>
    <tr>
      <td style="width: 5%;"><?php echo $no; ?></td>
      <td style="width: 20%;"><?php echo $data_petani->nmbrg; ?></td>
      <td style="width: 30%;"><?php echo $data_petani->kategori; ?></td>
      <td style="width: 15%;"><?php echo $data_petani->hrgbeli; ?></td>
      <td style="width: 15%;"><?php echo $data_petani->hrgjual; ?></td>
      <td class="text-center" style="width:25%;">

        <button class="btn btn-warning update-dataPetani" data-id="<?php echo $data_petani->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        
        <button class="btn btn-danger konfirmasiHapus-petani" data-id="<?php echo $data_petani->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
        
        
      </td>
    </tr>
    <?php
    $no++;
  }
?>