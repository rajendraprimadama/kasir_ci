<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasupplier extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_supplier');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataSupplier'] = $this->M_supplier->select_all();
 		
		$data['page'] 		= "Datasupplier";
		$data['judul'] 		= "Data Supplier";
		$data['deskripsi'] 	= "Manage Data Supplier";

		$data['modal_tambah_supplier'] = show_my_modal('modals/modal_tambah_supplier', 'tambah-supplier', $data);

		$this->template->views('datasupplier/home', $data);
	}

//function yg dipanggil oelh ajax.php melalui fungsi tampilSupplier()
	public function tampil() {
		$data['dataSupplier'] = $this->M_supplier->select_all();
		$this->load->view('datasupplier/list_data', $data);
	}

	public function prosesTambah() {
		//'variable modal','dimunculkan di tampilan validasi','required'
		$this->form_validation->set_rules('Namasupplier', 'Nama Supplier', 'trim|required');
		$this->form_validation->set_rules('perusahaan', 'Perusahaan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_supplier->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Supplier Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Supplier Gagal ditambahkan', '20px');
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
		$data['dataSupplier'] = $this->M_supplier->select_by_id($id);

		echo show_my_modal('modals/modal_update_supplier', 'update-supplier', $data);
	}

	public function prosesUpdate() {
		//cek validasi sebelum data dikirim ke model M_supplier function update
		$this->form_validation->set_rules('Namasupplier', 'Nama Supplier', 'trim|required');
		$this->form_validation->set_rules('perusahaan', 'Perusahaan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_supplier->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Supplier Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Supplier Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_supplier->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Supplier Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Supplier Gagal dihapus', '20px');
		}
	}
}
/* End of file Posisi.php */
/* Location: ./application/controllers/Posisi.php */