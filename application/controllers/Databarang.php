<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Databarang extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_dbrg');
		$this->load->model('M_kategori');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataBarang'] = $this->M_dbrg->select_all();
		$data['dataKategori'] = $this->M_kategori->select_all();
 		
		$data['page'] 		= "Databarang";
		$data['judul'] 		= "Data Barang";
		$data['deskripsi'] 	= "Manage Data Barang";

		$data['modal_tambah_barang'] = show_my_modal('modals/modal_tambah_barang', 'tambah-barang', $data);

		$this->template->views('databarang/home', $data);
	}

//function yg dipanggil oelh ajax.php melalui fungsi tampilBarang()
	public function tampil() {
		$data['dataBarang'] = $this->M_dbrg->select_all();
		$this->load->view('databarang/list_data', $data);
	}

	public function prosesTambah() {
		//'variable modal','dimunculkan di tampilan validasi','required'
		$this->form_validation->set_rules('v_namabrg', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('v_kategori', 'Kategori', 'trim|required');

		$data['dataKategori'] = $this->M_kategori->select_all();

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_dbrg->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Barang Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Barang Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataBarang'] = $this->M_dbrg->select_by_id($id);
		$data['dataKategori'] = $this->M_kategori->select_all();

		echo show_my_modal('modals/modal_update_barang', 'update-barang', $data);
	}

	public function prosesUpdate() {
		//cek validasi sebelum data dikirim ke model M_dbrg function update
		$this->form_validation->set_rules('v_namabrg', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('v_ategori', 'Kategori', 'trim|required');
		// $this->form_validation->set_rules('Hrgbeli', 'Harga Beli', 'trim|required');
		// $this->form_validation->set_rules('Hrgjual', 'Harga Jual', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_dbrg->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Barang Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Barang Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_dbrg->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Barang Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Barang Gagal dihapus', '20px');
		}
	}
}
/* End of file Posisi.php */
/* Location: ./application/controllers/Posisi.php */