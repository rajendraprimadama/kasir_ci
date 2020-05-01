
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Nota Penjualan</title>
    <style type="text/css">
        * {
            font-size: 11px;
            font-family: 'Times New Roman';
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
        }

        td.description,
        th.description {
            width: 100px;
            max-width: 100px;
        }

        td.quantity,
        th.quantity {
            width: 30px;
            max-width: 30px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 100px;
            max-width: 100px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 200px;
            max-width: 200px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {
            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }
    </style>
</head>
<?php 
    $b=$datatransaksi->row_array();
?>
<body onload="window.print();">
    <div class="ticket">
       <!--  <img src="./logo.png" alt="Logo"> -->
       <p class="centered">Toko AAN
        <br>Purbalingga
        <br>Jalan aja dulu
        Nikah kemudian
        <br><?php echo $b['jual_nofak'];?>
        <br><?php echo date('d-m-Y'); ?></p>
        <table>
            <thead>
                <tr>
                    <th class="description"></th>
                    <th class="quantity"></th>
                    <th class="quantity"></th>
                    <th class="price"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no=0;
                foreach ($datatransaksi->result_array() as $i) {
                    $no++;

                    $nabar=$i['d_jual_barang_nama'];
                    $satuan=$i['d_jual_barang_satuan'];

                    $harjul=$i['d_jual_barang_harjul'];
                    $qty=$i['d_jual_qty'];
                    $diskon=$i['d_jual_diskon'];
                    $total=$i['d_jual_total'];
                    ?>
                    <tr>
                        <td class="description"><?php echo $nabar;?></td>
                        <td class="quantity"><?php echo $qty;?></td>
                        <td class="quantity"><?php echo $satuan;?></td>
                        <td class="price"><?php echo 'Rp '.number_format($total);?></td>
                    </tr>
                    <?php }?>
                    <tr>
                        <td class="description"><b>Total</b></td>
                        <td class="quantity"></td>
                        <td class="quantity"></td>
                        <td class="price"><b><?php echo 'Rp '.number_format($b['jual_total']);?></b></td>
                    </tr>
                </tbody>
            </table>
            <p class="centered">Terimakasih atas kunjunganya!
                <br></p>
            </div>
        </body>
        </html>