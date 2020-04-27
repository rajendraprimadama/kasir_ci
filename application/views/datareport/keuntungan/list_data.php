<?php
    $no = 1;
<<<<<<< HEAD
=======
    $isTotalHargaBeli = 0;
    $isTotalHargaJual = 0;
>>>>>>> e028e507bf6ebc909ff7a577017c4df7014c3d5b
    if(count($datatable)*1>0){
        foreach ($datatable as $key => $val) {
            ?>
                <tr>
                    <td class="text-center"><?php echo $no; ?></td>
<<<<<<< HEAD
                    <td class="text-center"><?php echo $val->NO_Transaksi; ?></td>
=======
                    <td class="text-center">
                        <a href="<?php echo base_url().'Datareport/detailTransaksi/'.$val->NO_Transaksi; ?>"><?php echo $val->NO_Transaksi; ?></a>
                    </td>
>>>>>>> e028e507bf6ebc909ff7a577017c4df7014c3d5b
                    <td class="text-center"><?php echo date('d M Y',strtotime($val->DATE)); ?></td>
                    <td class="text-center text-uppercase"><?php echo $val->Keterangan; ?></td>
                    <td class="text-right"><?php echo $controller->FormatNumber($val->Total_HargaBeli); ?></td>
                    <td class="text-right"><?php echo $controller->FormatNumber($val->Total_HargaJual); ?></td>
                    <td class="text-right"><?php echo $controller->FormatNumber($val->Total_HargaJual-$val->Total_HargaBeli); ?></td>
                </tr>
            
                <?php 
                    $isTotalHargaBeli += $val->Total_HargaBeli; 
                    $isTotalHargaJual += $val->Total_HargaJual; 
                    $no++;
        } ?>
        <tr>
            <td colspan="100%"></td>
        </tr>
        <tr>
            <td class="text-uppercase text-center" colspan="4"></td>
            <td class="text-uppercase text-center" colspan="3"><strong>total</strong></td>
        </tr>
        <tr>
            <td class="text-uppercase text-center" colspan="4"></td>
            <td class="text-uppercase text-center"><strong>harga beli</strong></td>
            <td class="text-uppercase text-center"><strong>harga jual</strong></td>
            <td class="text-uppercase text-center"><strong>keuntungan</strong></td>
        </tr>
        <tr>
            <td class="text-uppercase text-center" colspan="4"></td>
            <td class="text-right"><?php echo $controller->FormatNumber($isTotalHargaBeli) ?></td>
            <td class="text-right"><?php echo $controller->FormatNumber($isTotalHargaJual) ?></td>
            <td class="text-right"><?php echo $controller->FormatNumber($isTotalHargaJual - $isTotalHargaBeli) ?></td>
        </tr>
    <?php
    }
    else{
        ?>
        <tr>
            <td class="text-center text-uppercase" colspan="100%">No Data</td>
        </tr>
    <?php
    }
    ?>
?>