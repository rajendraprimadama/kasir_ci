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
								<td><select class="form-control" name="satuan" id="satuan" placeholder="Satuan">
									<option value="PCS">PCS</option>
									<option value="PAX">PAX</option>
									<option value="DUS">DUS</option>
								</select></td>
								<td><input type="text" name="harjul" id="harjul" value="<?php echo number_format($b['pcs_hrgjual_retail']);?>" style="width:120px;margin-right:5px;text-align:right;" class="form-control input-sm" readonly></td><input type="hidden" name="diskon" id="diskon" value="0" min="0" class="form-control input-sm" required>
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
								let nama = '<?php echo $b['nama_brg']; ?>';
								let content = '<option value="nama_brg" selected>'+nama+'</option>';
								$('select[name=nabar]').empty().html(content);

								$("#satuan").change(function() {
									var kode_satuan = $("#satuan").val();
									if (kode_satuan == 'PCS') {
										$("#harjul").val(FormatNumber(<?php echo $b['pcs_hrgjual_retail'];?>))
									}else if(kode_satuan == 'PAX'){
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

								$("#qty").keypress(function(e){
									if(e.which==13){
										tambahecer();
									}
								});
								
							});

							function tambahecer() {
								var kode_brg = document.getElementById("kode_brg").value;
								var satuan = document.getElementById("satuan").value;
								var diskon = document.getElementById("diskon").value;
								var qty = document.getElementById("qty").value;
								var harjul = document.getElementById("harjul").value;
								if (qty.length > 0) {
									var kobar = {
										kode_brg: kode_brg,
										satuan: satuan,
										diskon: diskon,
										qty: qty,
										harjul: harjul
									};
									$.ajax({
										type: "POST",
										url : "<?php echo base_url().'Datatransaksi/add_to_cart';?>",
										data: kobar,
										success: function(msg){
											$('.content-list-barang').empty().html(msg);
											document.getElementById("kode_brg").value = "";
											document.getElementById("kode_brg").focus();
										}
									});
								}

							}

							
						</script>