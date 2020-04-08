<?php
  $no = 1;
  foreach ($dataCustomer as $data_customer) {
    ?>
    <tr>
      <td style="width: 5%;"><?php echo $no; ?></td>
      <td style="width: 15%;"><?php echo $data_customer->nama; ?></td>
      <td style="width: 30%;"><?php echo $data_customer->alamat; ?></td>
      <td style="width: 15%;"><?php echo $data_customer->telp; ?></td>
      <td style="width: 15%;"><?php echo $data_customer->email; ?></td>
      <td class="text-center" style="width:20%;">

        <button class="btn btn-warning update-dataCustomer" data-id="<?php echo $data_customer->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        
        <button class="btn btn-danger konfirmasiHapus-customer" data-id="<?php echo $data_customer->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
        
        
      </td>
    </tr>
    <?php
    $no++;
  }
?>