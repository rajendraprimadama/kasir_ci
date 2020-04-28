<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"></h3>
      <form method="POST" id="form-update-dtransaksi">
        <input type="hidden" name="id" value="<?php echo $dataDtransaksi->id; ?>">

        <center>
        <div class="input-group form-group">
          
            <h2>Bayar lagi?</h2>
            <p><b><h4>Sisa tagihan : <?php echo "Rp " . number_format($dataDtransaksi->tagihan, 0, ",", ".");?></h4></b></p>
        </div>
        </center>
       
        <div class="form-group">
          <div class="col-md-12">
            <input type="hidden" name="total" id="total" placeholder="Jumlah bayar" value="<?php echo $dataDtransaksi->tagihan ?>">
             <input type="number" name="bayar" id="bayar" class="form-control date"  max="<?php echo $dataDtransaksi->tagihan ?>" placeholder="Jumlah bayar">
             <br>
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Ya Bayar!</button>
          </div>
        </div>
      </form>
</div>

<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>