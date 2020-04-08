<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datacustomer extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_customer');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataCustomer'] = $this->M_customer->select_all();
 		
		$data['page'] 		= "Datacustomer";
		$data['judul'] 		= "Data Customer";
		$data['deskripsi'] 	= "Manage Data Customer";

		$data['modal_tambah_customer'] = show_my_modal('modals/modal_tambah_customer', 'tambah-customer', $data);

		$this->template->views('datacustomer/home', $data);
	}

//function yg dipanggil oelh ajax.php melalui fungsi tampilCustomer()
	public function tampil() {
		$data['dataCustomer'] = $this->M_customer->select_all();
		$this->load->view('datacustomer/list_data', $data);
	}

	public function prosesTambah() {
		//'variable modal','dimunculkan di tampilan validasi','required'
		$this->form_validation->set_rules('namacustomer', 'Nama Customer', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('telephon', 'Telephon', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_customer->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Customer Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Customer Gagal ditambahkan', '20px');
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
		$data['dataCustomer'] = $this->M_customer->select_by_id($id);

		echo show_my_modal('modals/modal_update_customer', 'update-customer', $data);
	}

	public function prosesUpdate() {
		//cek validasi sebelum data dikirim ke model M_customer function update
		$this->form_validation->set_rules('namacustomer', 'Nama Customer', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('telephon', 'Telephon', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_customer->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Customer Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Customer Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_customer->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Barang Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Barang Gagal dihapus', '20px');
		}
	}
}
/* End of file Posisi.php */
/* Location: ./application/controllers/Posisi.php */