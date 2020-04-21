					<?php 
					error_reporting(0);
					$b=$brg->row_array();
					?>
					<table>
						<tr>
							<th style="width:200px;"></th>
							<th>Nama Barang</th>
							<th>Satuan</th>
							<th>Harga(Rp)</th>
							<th>Diskon(Rp)</th>
							<th>Jumlah</th>
						</tr>
						<tr>
							<td style="width:200px;"></th>
								<td><input type="text" name="nabar" value="<?php echo $b['nama_brg'];?>" style="width:380px;margin-right:5px;" class="form-control input-sm" readonly></td>
								<td><select class="form-control" name="satuan" id="satuan" placeholder="Satuan">
									<option value="1">PCS</option>
									<option value="2">PAX</option>
									<option value="3">DUS</option>
								</select></td>
								<td><input type="text" name="harjul" id="harjul" value="<?php echo number_format($b['pcs_hrgjual_retail']);?>" style="width:120px;margin-right:5px;text-align:right;" class="form-control input-sm" readonly></td>
								<td><input type="number" name="diskon" id="diskon" value="0" min="0" class="form-control input-sm" style="width:130px;margin-right:5px;" required></td>
								<td><input type="number" name="qty" id="qty" value="1" min="1" class="form-control input-sm" style="width:90px;margin-right:5px;" required></td>
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
									var kode_satuan = $("#satuan").val();
									if (kode_satuan == '1') {
										$("#harjul").val(FormatNumber(<?php echo $b['pcs_hrgjual_retail'];?>))
									}else if(kode_satuan == '2'){
										$("#harjul").val(FormatNumber(<?php echo $b['pax_hrgjual_retail'];?>))
									}else{
										$("#harjul").val(FormatNumber(<?php echo $b['dus_hrgjual_retail'];?>))
									}
								});

								$("#satuan").keypress(function(e){
									if(e.which==13){
										$("#qty").focus();
									}
								});
							});
						</script>