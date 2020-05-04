 <?php $this->load->view('_layout/transaksi'); ?>
 <?php $this->load->view('_layout/_meta'); ?>
 <?php $this->load->view('_layout/_css'); ?>
 <table>
 	<tr>
 		<th>Kode Barcode</th>
 		<th>Nama Barang</th>
 	</tr>
 	<tr>
 		<th><input type="text" name="kode_brg_grosir" id="kode_brg_grosir" onkeyup="cekbarang()" onchange="cekbarang()" class="form-control input-sm fontKeyUp onlyNumber"></th>
 		<th>
 			<select class="form-control form-control-sm select2-search nabar" data-placeholder="Cari nama barang" name="nabar" style="width:380px;margin-right:5px;">
 				<option value='' disabled selected>-- Select --</option>
 			</select>
 		</th>               
 	</tr>
 	<div id="detail_barang_grosir" style="position:absolute;">
 	</div>
 </table>
 <div class="content-list-barang-grosir">
 	<?php $this->load->view('datatransaksigrosir/v_isi_grosir'); ?>
 </div>
 <script type="text/javascript">
 	$(document).ready(function(){
 		$("#kode_brg_grosir").focus();
 		_page.init();
 	});

 	/*const _page = {
        init: () => {
          
          $('select[name=nabar_grosir]').select2({
                ajax: {
                    url: `<?php echo base_url(); ?>Autocomplete`,
                    dataType: 'json',
                    // delay: 250,
                    data: function (params) {
                        return {
                          Search: params.term
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text : `${item.nama_brg}`,
                                    id: item.barcode_brg,
                                }
                            }),
                            pagination: {
                                more: (params.page * 30) < data
                            }
                        }
                    },
                    cache: true,
                },
                minimumInputLength: 3,
            })
        }
      }*/
 </script>
