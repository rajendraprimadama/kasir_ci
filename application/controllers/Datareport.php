<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datareport extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_report');
	}

	public function index() {
        $data['userdata'] 	= $this->userdata;
        
        $data['ListReport'] = [''];
  		
		$data['page'] 		= "Datareport";
		$data['judul'] 		= "Data Report";
        $data['deskripsi'] 	= "Manage Data Report";

		$this->template->views('datareport/home', $data);
	}
	
	public function getData() {
		$param 	= $this->input->post();
		$result = $this->M_report->getData($param);

		$data['datatable'] = $result;
		return $this->load->view('datareport/list_data', $data);
	}
}