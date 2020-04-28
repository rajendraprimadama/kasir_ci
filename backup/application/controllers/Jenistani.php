<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenistani extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_jenis');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataJenis'] = $this->M_jenis->select_all();
 		
		$data['page'] 		= "Jenistani";
		$data['judul'] 		= "Data Jenis Pertanian";
		$data['deskripsi'] 	= "Manage Data Jenis Pertanian";

		$data['modal_tambah_jenis'] = show_my_modal('modals/modal_tambah_jenis', 'tambah-jenis', $data);

		$this->template->views('jenistani/home', $data);
	}

//function yg dipanggil oelh ajax.php melalui fungsi tampilPetani()
	public function tampil() {
		$data['dataJenis'] = $this->M_jenis->select_all();
		$this->load->view('jenistani/list_data', $data);
	}

	public function prosesTambah() {
		//'variable modal','dimunculkan di tampilan validasi','required'
		$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
		
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_jenis->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Jenis Pertanian Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Jenis Pertanian Gagal ditambahkan', '20px');
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
		$data['dataJenis'] = $this->M_jenis->select_by_id($id);

		echo show_my_modal('modals/modal_update_jenis', 'update-jenis', $data);
	}

	public function prosesUpdate() {
		//cek validasi sebelum data dikirim ke model dpetani function update
		$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_jenis->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Jenis Pertanian Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Jenis Pertanian Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_jenis->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Jenis Pertanian Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Jenis Pertanian Gagal dihapus', '20px');
		}
	}
}

/* End of file Posisi.php */
/* Location: ./application/controllers/Posisi.php */