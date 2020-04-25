<?php
    $no = 1;
    if(count($datatable)*1>0){
        foreach ($datatable as $key => $val) {
            ?>
                <tr>
                    <td class="text-center"><?php echo $no; ?></td>
                    <td class="text-center"><?php echo $val->jual_nofak; ?></td>
                    <td class="text-center"><?php echo date('d M Y',strtotime($val->jual_tanggal)); ?></td>
                    <td class="text-right"><?php echo $val->jual_total; ?></td>
                    <td class="text-center text-uppercase"><?php echo $val->jual_keterangan; ?></td>
                </tr>
            
            <?php $no++;
        }
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