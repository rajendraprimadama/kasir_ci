<?php
  $no = 1;
  foreach ($dataSupplier as $data_supplier) {
    ?>
    <tr>
      <td style="width: 5%;"><?php echo $no; ?></td>
      <td style="width: 15%;"><?php echo $data_supplier->nama;        ?></td>
      <td style="width: 15%;"><?php echo $data_supplier->perusahaan;  ?></td>
      <td style="width: 20%;"><?php echo $data_supplier->alamat;      ?></td>
      <td style="width: 15%;"><?php echo $data_supplier->telp;        ?></td>
      <td style="width: 15%;"><?php echo $data_supplier->email;       ?></td>


      <td class="text-center" style="width:15%;">

        <button class="btn btn-warning update-dataSupplier" data-id="<?php echo $data_supplier->id; ?>"><i class="glyphicon glyphicon-repeat"></i> </button>
        
        <button class="btn btn-danger konfirmasiHapus-supplier" data-id="<?php echo $data_supplier->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> </button>
        
        
      </td>
    </tr>
    <?php
    $no++;
  }
?>