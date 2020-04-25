<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datareport extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_report');
	}

	public function penjualan() {
        $data['userdata'] 	= $this->userdata;
        
		$data['page'] 		= "Datareport";
		$data['judul'] 		= "Data Report Penjualan";
        $data['deskripsi'] 	= "";

		$this->template->views('datareport/penjualan/home', $data);
	}
	
	public function getDataPenjualan() {
		$param 	= $this->input->post();
		$result = $this->M_report->getDataPenjualan($param);

		$data['datatable'] = $result;
		return $this->load->view('datareport/penjualan/list_data', $data);
	}
}