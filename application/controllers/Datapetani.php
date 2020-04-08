<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapetani extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_dpetani');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPetani'] = $this->M_dpetani->select_all();
 		
		$data['page'] 		= "Datapetani";
		$data['judul'] 		= "Data Petani";
		$data['deskripsi'] 	= "Manage Data Petani";

		$data['modal_tambah_petani'] = show_my_modal('modals/modal_tambah_petani', 'tambah-petani', $data);

		$this->template->views('datapetani/home', $data);
	}

//function yg dipanggil oelh ajax.php melalui fungsi tampilPetani()
	public function tampil() {
		$data['dataPetani'] = $this->M_dpetani->select_all();
		$this->load->view('datapetani/list_data', $data);
	}

	public function prosesTambah() {
		//'variable modal','dimunculkan di tampilan validasi','required'
		$this->form_validation->set_rules('Nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('Telepon', 'Telepon', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_dpetani->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Petani Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Petani Gagal ditambahkan', '20px');
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
		$data['dataPetani'] = $this->M_dpetani->select_by_id($id);

		echo show_my_modal('modals/modal_update_petani', 'update-petani', $data);
	}

	public function prosesUpdate() {
		//cek validasi sebelum data dikirim ke model dpetani function update
		$this->form_validation->set_rules('Nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('Telepon', 'Telepon', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_dpetani->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Petani Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Petani Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_dpetani->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Petani Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Petani Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['posisi'] = $this->M_dpetani->select_by_id($id);
		$data['dataPosisi'] = $this->M_dpetani->select_by_pegawai($id);

		echo show_my_modal('modals/modal_detail_posisi', 'detail-posisi', $data, 'lg');
	}
}

/* End of file Posisi.php */
/* Location: ./application/controllers/Posisi.php */