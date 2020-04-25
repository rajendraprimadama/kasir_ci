<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datareport extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_report');
	}

	# region penjualan
	public function penjualan() {
        $data['userdata'] 	= $this->userdata;
        
		$data['page'] 		= "Datareport/penjualan";
		$data['judul'] 		= "Data Report Penjualan";
        $data['deskripsi'] 	= "";

		$this->template->views('datareport/penjualan/home', $data);
	}

	public function getDataPenjualan() {
		$param 	= $this->input->post();
		$result = $this->M_report->getDataPenjualan($param);

		$data['controller'] = $this;;
		$data['datatable'] = $result;
		return $this->load->view('datareport/penjualan/list_data', $data);
	}

	# region keuntungan
	public function keuntungan() {
        $data['userdata'] 	= $this->userdata;
        
		$data['page'] 		= "Datareport/keuntungan";
		$data['judul'] 		= "Data Report Penjualan";
        $data['deskripsi'] 	= "";

		$this->template->views('datareport/keuntungan/home', $data);
	}

	public function getDataKeuntungan() {
		$param 	= $this->input->post();
		$result = $this->M_report->getDataPenjualan($param);

		$data['controller'] = $this;
		$data['datatable'] = $result;
		return $this->load->view('datareport/keuntungan/list_data', $data);
	}

	public function FormatNumber($nilai,$decimal=0,$point=".",$thousands=",", $type_data=""){

        $return = 0;
        if(is_numeric($nilai)){
            if($type_data=="ind"){
                $return = number_format($nilai, $decimal, ",", ".");
            }
            else{
                $return = number_format($nilai, $decimal, $point, $thousands);
            }
        }

        return $return;
    }
}