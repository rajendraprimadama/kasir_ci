<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <?php $this->load->view('_layout/_meta'); ?>
 <?php $this->load->view('_layout/_css'); ?>

    <style>
        table, td, th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }

        .table > thead > tr > th {
            vertical-align: middle;
            border-bottom: 2px solid #ddd;
        }
    </style>

 <div class="box skin-blue sidebar-mini sidebar-collapse" id="halaman">
 

  <div class="box-header">
    <div class="col-md-30">
        <section class="content">
            <div class="row">
            <div class="col-md-30">
                <?php $this->load->view('_layout/_header_transaksi'); ?>
            </div>

            <div class="col-md-30">
                <div class="row">
                    <div class="col-md-12"></div>
                    <div class="col-md-12">
                    <div class="table-responsive bg-white mb-3 ">
                        <table class="table table-bordered table-xs table-striped table-hover table-data" >
                            <thead class="text-uppercase">
                            <tr class="text-uppercase">
                                <th class="text-center" width="5%" rowspan="2">No</th>
                                <th class="text-center" rowspan="2">Kode Barcode</th>
                                <th class="text-center" rowspan="2">Nama Barang</th>
                                <th class="text-center" rowspan="2">Kategori</th>

                                <th class="text-center" colspan="3">Harga Jual retail</th>
                                <th class="text-center" colspan="3">Harga jual grosir</th>
                            </tr>
                            <tr class="text-uppercase">
                                <th class="text-center">pcs</th>
                                <th class="text-center">pax</th>
                                <th class="text-center">karton</th>
                                <th class="text-center">pcs</th>
                                <th class="text-center">pax</th>
                                <th class="text-center">karton</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(count($dataBarang)*1>0) {
                                        $no = 1;
                                        foreach ($dataBarang as $key => $val) {
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $no; ?></td>
                                                <td><?php echo $val->barcode_brg; ?></td>
                                                <td><?php echo $val->nama_brg; ?></td>
                                                <td><?php echo $val->kategori; ?></td>
                                                <td class="text-right"><?php echo $val->pcs_hrgjual_retail; ?></td>
                                                <td class="text-right"><?php echo $val->pax_hrgjual_retail; ?></td>
                                                <td class="text-right"><?php echo $val->dus_hrgjual_retail; ?></td>
                                                <td class="text-right"><?php echo $val->pcs_hrgjual_grosir; ?></td>
                                                <td class="text-right"><?php echo $val->pax_hrgjual_grosir; ?></td>
                                                <td class="text-right"><?php echo $val->dus_hrgjual_grosir; ?></td>
                                            </tr>
                                            <?php
                                            $no++;
                                        }
                                    }
                                    else {
                                        ?>
                                        <tr>
                                            <td class="text-center text-uppercase" colspan="100%">No Data</td>
                                        </tr>
                                    <?php
                                    }
                                ?>
                                
                            </body>
                            <thead>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </div>
</div>

<?php $this->load->view('_layout/_js'); ?>