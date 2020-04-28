<?php
  $no = 1;
  foreach ($dataJenis as $data_jenis) {
    ?>
    <tr>
      <td style="width: 5%;"><?php echo $no; ?></td>
      <td style="width: 20%;"><?php echo $data_jenis->jenis; ?></td>
      <td class="text-center" style="width:15%;">

        <button class="btn btn-warning update-dataJenis" data-id="<?php echo $data_jenis->idpertanian; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        
        <button class="btn btn-danger konfirmasiHapus-jenis" data-id="<?php echo $data_jenis->idpertanian; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
        
        
      </td>
    </tr>
    <?php
    $no++;
  }
?>