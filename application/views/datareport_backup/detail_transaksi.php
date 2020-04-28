<div class="box" style="margin-bottom:5px !important">
  <div class="box-header" style="padding-bottom:1px">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                TRANSAKSI : 
                <strong>
                <?php echo $datatable[0]->NO_Transaksi; ?>
                </strong>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group text-center">
                KETERANGAN :
                <strong> 
                <?php echo strtoupper($datatable[0]->Keterangan); ?>
                </strong>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group text-right">
                TANGGAL : 
                <strong>
                <?php echo date('d M Y',strtotime($datatable[0]->DATE)); ?>
                </strong>
            </div>
        </div>
    </div>
  </div>

  <hr style="margin-top:0px">

  <!-- /.box-header -->
  <div class="box-body" id="page-all-print">
    <!-- <div class="table-responsive bg-white mb-3 " style="height:350px; overflow-y: scroll;"> -->
    <div class="table-responsive bg-white mb-3 ">
      <table class="table table-bordered table-xs table-striped table-hover table-data" >
          <thead class="text-uppercase">
              <tr>
                  <th class="text-center" width="1%">NO</th>
                  <th class="text-center">ID BARANG</th>
                  <th class="text-center">NAMA BARANG</th>
                  <th class="text-center">SATUAN</th>
                  <th class="text-center">JUMLAH</th>
                  <th class="text-center">HARGA BELI</th>
                  <th class="text-center">HARGA JUAL</th>
                  <th class="text-center">TOTAL</th>
              </tr>
          </thead>
          <tbody class="tbody-report">
            <?php
                $no=1; $isTotalBayar=0;
                foreach ($datatable as $key => $val):
                ?>
                    <tr>
                        <td class="text-center"><?php echo $no; ?></td>
                        <td class="text-center"><?php echo $val->ID_Barang; ?></td>
                        <td class="text-center text-uppercase"><?php echo $val->Nama_Barang; ?></td>
                        <td class="text-center"><?php echo $val->Satuan; ?></td>
                        <td class="text-center"><?php echo $val->Qty; ?></td>
                        <td class="text-right"><?php echo $controller->FormatNumber($val->Harga_Beli); ?></td>
                        <td class="text-right"><?php echo $controller->FormatNumber($val->Harga_Jual); ?></td>
                        <td class="text-right"><?php echo $controller->FormatNumber($val->Total); ?></td>
                    </tr>
            
                <?php $no++; $isTotalBayar += $val->Total;
            endforeach;?>
            <tr>
                <td class="text-center text-uppercase" colspan="7"><strong>total</strong></td>
                <td class="text-right"><?php echo $controller->FormatNumber($isTotalBayar); ?></td>
            </tr>
          </body>
        <thead>
      </table>
    </div>
  </div>

</div>

<?php $this->load->view('datareport/keuntungan/plugin'); ?>