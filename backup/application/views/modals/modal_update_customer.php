<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Customer</h3>

  <form id="form-update-customer" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataCustomer->id; ?>">
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Customer" name="namacustomer" aria-describedby="sizing-addon2" value="<?php echo $dataCustomer->nama; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-map-marker"></i>
      </span>
      <input type="text" class="form-control" placeholder="Alamat" name="alamat" aria-describedby="sizing-addon2" value="<?php echo $dataCustomer->alamat; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-phone"></i>
      </span>
      <input type="number" class="form-control" placeholder="Nomor Telephon" name="telephon" aria-describedby="sizing-addon2" value="<?php echo $dataCustomer->telp; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-envelope"></i>
      </span>
      <input type="text" class="form-control" placeholder="Alamat Email" name="email" aria-describedby="sizing-addon2" value="<?php echo $dataCustomer->email; ?>">
    </div>


    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data Customer</button>
      </div>
    </div>
  </form>
</div>