<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datakategori extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_kategori');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataKategori'] = $this->M_kategori->select_all();
 		
		$data['page'] 		= "Kategori";
		$data['judul'] 		= "Data Kategori Barang";
		$data['deskripsi'] 	= "Manage Data Kategori Barang";

		$data['modal_tambah_kategori'] = show_my_modal('modals/modal_tambah_kategori', 'tambah-kategori', $data);

		$this->template->views('kategori/home', $data);
	}

//function yg dipanggil oelh ajax.php melalui fungsi tampilKategori()
	public function tampil() {
		$data['dataKategori'] = $this->M_kategori->select_all();
		$this->load->view('kategori/list_data', $data);
	}

	public function prosesTambah() {
		//'variable modal','dimunculkan di tampilan validasi','required'
		$this->form_validation->set_rules('ktgr', 'Kategori', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_kategori->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data kategori Barang Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data kategori Barang Gagal ditambahkan', '20px');
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
		$data['dataKategori'] = $this->M_kategori->select_by_id($id);

		echo show_my_modal('modals/modal_update_kategori', 'update-kategori', $data);
	}

	public function prosesUpdate() {
		//cek validasi sebelum data dikirim ke model m_kategori function update
		$this->form_validation->set_rules('Kategori', 'Kategori', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_kategori->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Kategori Barang Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Kategori Barang Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_kategori->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Kategori Barang Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Kategori Barang Gagal dihapus', '20px');
		}
	}
}

/* End of file Posisi.php */
/* Location: ./application/controllers/Posisi.php */