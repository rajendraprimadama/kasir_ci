					<?php 
					error_reporting(0);
					$b=$brg->row_array();
					?>
					<table>
						<tr>
							<th style="width:200px;"></th>
							<th></th>
							<th>Satuan</th>
							<th>Harga(Rp)</th>
							<th>Jumlah</th>
						</tr>
						<tr>
							<td style="width:200px;"></td>
							<td style="width:380px;"></td>
								<td><select class="form-control" name="satuan_grosir" id="satuan_grosir" placeholder="Satuan">
									<option value="1">PCS</option>
									<option value="2">PAX</option>
									<option value="3">DUS</option>
								</select></td>
								<td><input type="text" name="harjul_grosir" id="harjul_grosir" value="<?php echo number_format($b['pcs_hrgjual_grosir']);?>" style="width:120px;margin-right:5px;text-align:right;" class="form-control input-sm" readonly></td><input type="hidden" name="diskon" id="diskon" value="0" min="0" class="form-control input-sm" required>
								<td><input type="number" name="qty_grosir" id="qty_grosir" value="1" min="1" class="form-control input-sm" style="width:90px;margin-right:5px;" required></td>
								<td><button type="submit" class="btn btn-sm btn-primary">Ok</button></td>
							</tr>
						</table>

						<script type="text/javascript">
							/*function ceksatuan() {
								var kode_satuan = document.getElementById("satuan").value;
								if (kode_satuan == '1') {
									document.getElementById("harjul").value = <?php echo $b['pcs_hrgjual_retail'];?>
								}else if(kode_satuan == '2'){
									document.getElementById("harjul").value = <?php echo $b['pax_hrgjual_retail'];?>
								}else{
									document.getElementById("harjul").value = <?php echo $b['dus_hrgjual_retail'];?>
								}
							}
*/
							$(document).ready(function(){

								$("#satuan").change(function() {
									var kode_satuan = $("#satuan_grosir").val();
									if (kode_satuan == '1') {
										$("#harjul").val(FormatNumber(<?php echo $b['pcs_hrgjual_grosir'];?>))
									}else if(kode_satuan == '2'){
										$("#harjul").val(FormatNumber(<?php echo $b['pax_hrgjual_grosir'];?>))
									}else{
										$("#harjul").val(FormatNumber(<?php echo $b['dus_hrgjual_grosir'];?>))
									}
								});

								$("#satuan_grosir").keypress(function(e){
									if(e.which==13){
										$("#qty_grosir").focus();
									}
								});
							});
						</script>