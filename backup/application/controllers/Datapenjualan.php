<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatransaksi extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_dtransaksi');
		$this->load->model('M_dpetani');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['datatransaksi'] = $this->M_dtransaksi->select_all();
		$data['datapetani'] = $this->M_dpetani->select_all();
		$data['datapertanian'] = $this->M_dtransaksi->select_all_pertanian();
		//$data['dataKota'] = $this->M_kota->select_all();

		$data['page'] = "Datatransaksi";
		$data['judul'] = "Data Transaksi";
		$data['deskripsi'] = "Manage Data Transaksi";

		//$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);

		$this->template->views('datatransaksi/home', $data);
	}

	public function cari() {

		$data = $this->input->post();
		$data['userdata'] = $this->userdata;
		$data['datatransaksi'] = $this->M_dtransaksi->select_transaksi($data);
		$data['datapetani'] = $this->M_dpetani->select_all();
		$data['datapertanian'] = $this->M_dtransaksi->select_all_pertanian();
		//$data['dataKota'] = $this->M_kota->select_all();

		$data['page'] = "Datatransaksi";
		$data['judul'] = "Data Transaksi";
		$data['deskripsi'] = "Manage Data Transaksi";

		//$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);

		$this->template->views('datatransaksi/v_cari', $data);
	}


	public function tampil() {
		$data['dataDtransaksi'] = $this->M_dtransaksi->select_all();
		$this->load->view('datatransaksi/list_data', $data);
	}

	public function update() {
		$id = trim($_POST['id']);

		$data['dataDtransaksi'] = $this->M_dtransaksi->select_by_id($id);
		$data['dataPetani'] = $this->M_dpetani->select_all();
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_update_dtransaksi', 'update-dtransaksi', $data);
	}

	public function prosesUpdate() {
		/*$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('posisi', 'Posisi', 'trim|required');*/

		$data = $this->input->post();
		$id = trim($_POST['id']);
		$result = $this->M_dtransaksi->update($data);
		//$this->printnotaupdate($id);
		if ($result > 0) {
			$out['status'] = '';
			$out['msg'] = show_succ_msg("Data Transaksi Berhasil diupdate<script>window.open('datatransaksi/printnotaupdate/$id', '_blank');</script>", '20px');

		} else {
			$out['status'] = '';
			$out['msg'] = show_succ_msg('Data Transaksi Gagal diupdate', '20px');
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_dtransaksi->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Transaksi Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Transaksi Gagal dihapus', '20px');
		}
	}

	public function prosesTambah() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "tambahtransaksi";
		$data['judul'] = "Data Transaksi";
		$data['deskripsi'] = "";

		$data['datapertanian'] = $this->M_dtransaksi->select_all_pertanian();
		$data['datapetani'] = $this->M_dpetani->select_all();
		$this->template->views('datatransaksi/v_datatransaksi', $data);
	}

	public function simpanjenis() {
		$id = $_POST['jenis'];
		$result = $this->M_dtransaksi->simpanjenis($id);

		if ($result > 0) {
			
			$this->tambahpertanian();

		} else {
			echo show_err_msg('Data Pertanian Gagal diinput', '20px');
		}
	}

	public function printnota() {
		$data['userdata'] = $this->userdata;
		$data['datatransaksi'] = $this->M_dtransaksi->select_nota();

		$this->load->view('datatransaksi/nota', $data);
	}

	public function printnotaupdate($id) {
		//$id=$this->uri->segment(3);
		$data['userdata'] = $this->userdata;
		$data['datatransaksi'] = $this->M_dtransaksi->select_notaupdate($id);

		$this->load->view('datatransaksi/nota', $data);
	}

	public function simpantransaksi() {
		$tanggal = $_POST['tanggal'];
		$dibayar = $_POST['dibayar'];
		$totalbayar = $_POST['totalbayar'];
		$data = $this->input->post();
		//print_r($data);
		
		if ($tanggal=="") {
			if ($dibayar=="") {
				$result = $this->M_dtransaksi->simpantransaksi00($data);
			}else{
				$result = $this->M_dtransaksi->simpantransaksi01($data);
			}
		}else {
			if ($dibayar=="") {
				$result = $this->M_dtransaksi->simpantransaksi10($data);
			}else{
				$result = $this->M_dtransaksi->simpantransaksi11($data);
			}
		}
		

		if ($result > 0) {
			?>
			<script type="text/javascript">
				window.open('printnota', '_blank');
			</script>
			<?php
			$this->prosesTambah();

		} else {
			echo show_err_msg('Data Pertanian Gagal diinput', '20px');
		}
	}

	public function tambahpertanian() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "tambahjenis";
		$data['judul'] = "Tambah Jenis";
		$data['deskripsi'] = "";
		$this->template->views('datatransaksi/v_tambahjenis', $data);
	}
}


/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */