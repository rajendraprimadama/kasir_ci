<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datakaryawan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->model('M_karyawan');
        $this->load->model('M_admin');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['datakaryawan'] = $this->M_karyawan->select_all();
 		
		$data['page'] 		= "Datakaryawan";
		$data['judul'] 		= "Data Karyawan";
		$data['deskripsi'] 	= "Manage Data Karyawan";
		$data['ListAuthority'] = $this->userdata->authority_level == "DEVELOPER" ? ['ADMIN', 'KASIR', 'DEVELOPER'] : ['ADMIN', 'KASIR'];

		$data['modal_tambah_karyawan'] = show_my_modal('modals/modal_tambah_karyawan', 'tambah-karyawan', $data);

		$this->template->views('datakaryawan/home', $data);
	}

    //function yg dipanggil oelh ajax.php melalui fungsi tampilCustomer()
	public function tampil() {
		$data['dataKaryawan'] = $this->M_karyawan->select_all();
		$this->load->view('datakaryawan/list_data', $data);
	}

	public function prosesTambah() {
		//'variable modal','dimunculkan di tampilan validasi','required'
		$this->form_validation->set_rules('v_nama', 'Nama Karyawan', 'trim|required');
		$this->form_validation->set_rules('v_alamat', 'Alamat Karyawan', 'trim|required');
		$this->form_validation->set_rules('v_phone', 'Nomor Telephone', 'trim|required');

        
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			# add access to table_admin
			$last_id = 0;
            if ($this->input->post("v_authority") != "no_access") {
                $last_id = $this->M_admin->insert($data);
            }

			$result = $this->M_karyawan->insert($data,$last_id);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Karyawan Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Karyawan Gagal ditambahkan', '20px');
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
		$data['dataKaryawan'] = $this->M_karyawan->select_by_id($id);
		$data['ListAuthority'] = $this->userdata->authority_level == "DEVELOPER" ? ['ADMIN', 'KASIR', 'DEVELOPER'] : ['ADMIN', 'KASIR'];

		echo show_my_modal('modals/modal_update_karyawan', 'update-karyawan', $data);
	}

	public function prosesUpdate() {
		//cek validasi sebelum data dikirim ke model M_customer function update
		$this->form_validation->set_rules('v_nama', 'Nama Karyawan', 'trim|required');
		$this->form_validation->set_rules('v_alamat', 'Alamat Karyawan', 'trim|required');
		$this->form_validation->set_rules('v_phone', 'Nomor Telephone', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_karyawan->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Karyawan Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Karyawan Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_karyawan->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Karyawan Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Karyawan Gagal dihapus', '20px');
		}
	}
}
/* End of file Posisi.php */
/* Location: ./application/controllers/Posisi.php */