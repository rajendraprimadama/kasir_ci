<div class="box" style="margin-bottom:5px !important">
  <div class="box-header" style="padding-bottom:1px">
    <div class="row">
      <div class="col-md-3">
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-calendar"></i>
          </span>
          <input type="text" class="form-control v_startdate" name="v_stardate" placeholder="dd mm yyyy" readonly>
        </div>
      </div>
      <div class="col-md-2 text-center">
            <button type="button" class="btn btn-sm bg-transparent border-warning btn-sm btn-success" disabled="">UNTIL</button>
      </div>
      <div class="col-md-3">
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-calendar"></i>
          </span>
          <input type="text" class="form-control v_enddate" name="v_enddate" placeholder="dd mm yyyy" readonly>
        </div>
      </div>
      <div class="col-md-4 text-right">
        <button class="btn btn-primary btn-action" data-action="search" style="margin-right: 5px" ><i class="glyphicon glyphicon-plus-sign"></i> Search</button>
        <!-- <button class="btn btn-warning btn-action" data-action="export" target="_blank" style="margin-right: 5px"><i class="glyphicon glyphicon-export"></i> Export</button>
        <button class="btn btn-danger btn-action" data-action="print"><i class="glyphicon glyphicon-print"></i> Print</button> -->
      </div>
    </div>
  </div>

  <hr style="margin-top:0px">

  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-12 text-right div-print-export hidden" >
        <div class="form-group">
          <input type="hidden" class="v_startdate_show" name="v_startdate_show">
          <input type="hidden" class="v_enddate_show" name="v_enddate_show">
          <button class="btn btn-warning btn-action" data-action="export" target="_blank" style="margin-right: 5px"><i class="glyphicon glyphicon-export"></i> Export</button>
          <button class="btn btn-danger btn-action" data-action="print" ><i class="glyphicon glyphicon-print"></i> Print</button>
        </div>
      </div>

      <div class="col-md-12" id="page-all-print">
        <!-- <div class="table-responsive bg-white mb-3 " style="height:350px; overflow-y: scroll;"> -->
        <div class="table-responsive bg-white mb-3 ">
          <table class="table table-bordered table-xs table-striped table-hover table-data" >
              <thead class="text-uppercase">
                <tr>
                    <td class="text-center" colspan="100%"><strong>laporan keuntungan</strong></td>
                  </tr>
                  <tr id="label_tanggal" class="hidden">
                    
                  </tr>
                  <tr>
                      <th class="text-center" width="1%">NO</th>
                      <th class="text-center">No Transaksi</th>
                      <th class="text-center">Tanggal</th>
                      <th class="text-center">Keterangan</th>
                      <th class="text-center">Total Harga Beli</th>
                      <th class="text-center">Total Harga Jual</th>
                      <th class="text-center">Keuntungan</th>
                  </tr>
              </thead>
              <tbody class="tbody-report">
                <tr>
                    <td class="text-center text-uppercase" colspan="100%">No Data</td>
                </tr>
              </body>
            <thead>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

<?php $this->load->view('datareport/keuntungan/plugin'); ?>