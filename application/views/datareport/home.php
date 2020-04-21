<div class="box">
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
          <input type="text" class="form-control v_startdate" name="v_startdate" placeholder="dd mm yyyy" readonly>
        </div>
      </div>
      <div class="col-md-4 text-right">
        <button class="btn btn-primary btn-action" data-action="search" style="margin-right: 5px" ><i class="glyphicon glyphicon-plus-sign"></i> Search</button>
        <button class="btn btn-danger btn-action" data-action="print"><i class="glyphicon glyphicon-print"></i> Print</button>
      </div>
    </div>
  </div>

  <hr style="margin-top:0px">

  <!-- /.box-header -->
  <div class="box-body">
  </div>
</div>

<?php $this->load->view('datareport/plugin'); ?>