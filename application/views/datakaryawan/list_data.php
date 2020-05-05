<?php
  $no = 1;
  foreach ($dataKaryawan as $key => $val) {
    ?>
    <tr>
      <td style="width: 5%;"><?php echo $no; ?></td>
      <td style="width: 15%;"><?php echo $val->name; ?></td>
      <td style="width: 30%;"><?php echo $val->address; ?></td>
      <td style="width: 15%;"><?php echo $val->phone; ?></td>
      <td style="width: 15%;"><?php echo $val->authority; ?></td>
      <td class="text-center" style="width:20%;">

        <button class="btn btn-warning update-dataKaryawan" data-id="<?php echo $val->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        
        <button class="btn btn-danger konfirmasiHapus-karyawan" data-id="<?php echo $val->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
        
        
      </td>
    </tr>
    <?php
    $no++;
  }
?>