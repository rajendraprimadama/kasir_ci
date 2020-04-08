<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
		
		tampilBarang();
		tampilSupplier();
		tampilCustomer();
		tampilKategori();
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	
//------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------//
//fungsi DATA BARANG
	//FUNGSI TAMPIL
	function tampilBarang() {
		$.get('<?php echo base_url('Databarang/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-barang').html(data);
			refresh();
		});
	}

	//DELETE BARANG
	var id_barang;
	$(document).on("click", ".konfirmasiHapus-barang", function() {
		id_barang = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataBarang", function() {
		var id = id_barang;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Databarang/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilBarang();
			$('.msg').html(data);
			effect_msg();
		})
	})

	//UPDATE DATA BARANG
	$(document).on("click", ".update-dataBarang", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Databarang/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-barang').modal('show');
		})
	})

	//INSERT DATA BARANG TO DB 
	//form-tambah-barang dipanggil oleh controller Databarang
	$('#form-tambah-barang').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Databarang/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBarang();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-barang").reset();
				$('#tambah-barang').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	//FORM VALIDATION UPDATE
	$(document).on('submit', '#form-update-barang', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Databarang/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBarang();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-barang").reset();
				$('#update-barang').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-barang').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-barang').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


//-------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------//
//fungsi DATA Kategori
	//FUNGSI TAMPIL
	function tampilKategori() {
		$.get('<?php echo base_url('Datakategori/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kategori').html(data);
			refresh();
		});
	}

	//DELETE Kategori
	var id_kategori;
	$(document).on("click", ".konfirmasiHapus-kategori", function() {
		id_kategori = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKategori", function() {
		var id = id_kategori;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Datakategori/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKategori();
			$('.msg').html(data);
			effect_msg();
		})
	})

	//UPDATE DATA Kategori
	$(document).on("click", ".update-dataKategori", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Datakategori/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kategori').modal('show');
		})
	})

	//INSERT DATA Kategori TO DB 
	//form-tambah-Kategori dipanggil oleh controller Datakategori
	$('#form-tambah-kategori').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Datakategori/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKategori();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kategori").reset();
				$('#tambah-kategori').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});
	
	//FORM VALIDATION UPDATE
	$(document).on('submit', '#form-update-kategori', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Datakategori/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKategori();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kategori").reset();
				$('#update-kategori').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-kategori').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kategori').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//-----------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------//
//fungsi DATA SUPPLIER
	//FUNGSI TAMPIL
	function tampilSupplier() {
		$.get('<?php echo base_url('Datasupplier/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-supplier').html(data);
			refresh();
		});
	}

	//DELETE SUPPLIER
	var id_supplier;
	$(document).on("click", ".konfirmasiHapus-supplier", function() {
		id_supplier = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSupplier", function() {
		var id = id_supplier;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Datasupplier/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSupplier();
			$('.msg').html(data);
			effect_msg();
		})
	})

	//UPDATE DATA SUPPLIER
	$(document).on("click", ".update-dataSupplier", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Datasupplier/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-supplier').modal('show');
		})
	})

	//INSERT DATA SUPLLIER TO DB 
	//form-tambah-supplier dipanggil oleh controller Datasupplier
	$('#form-tambah-supplier').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Datasupplier/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSupplier();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-supplier").reset();
				$('#tambah-supplier').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	//FORM VALIDATION UPDATE
	$(document).on('submit', '#form-update-supplier', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Datasupplier/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSupplier();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-supplier").reset();
				$('#update-supplier').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-supplier').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-supplier').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//-----------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------//
//fungsi DATA CUSTOMER
	//FUNGSI TAMPIL
	function tampilCustomer() {
		$.get('<?php echo base_url('Datacustomer/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-customer').html(data);
			refresh();
		});
	}

	//DELETE CUSTOMER
	var id_customer;
	$(document).on("click", ".konfirmasiHapus-customer", function() {
		id_customer = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataCustomer", function() {
		var id = id_customer;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Datacustomer/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilCustomer();
			$('.msg').html(data);
			effect_msg();
		})
	})

	//UPDATE DATA Customer
	$(document).on("click", ".update-dataCustomer", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Datacustomer/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-customer').modal('show');
		})
	})

	//INSERT DATA customer TO DB 
	//form-tambah-customer dipanggil oleh controller Datacustomer
	$('#form-tambah-customer').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Datacustomer/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilCustomer();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-customer").reset();
				$('#tambah-customer').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	//FORM VALIDATION UPDATE
	$(document).on('submit', '#form-update-customer', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Datacustomer/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilCustomer();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-customer").reset();
				$('#update-customer').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-customer').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-customer').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
</script>