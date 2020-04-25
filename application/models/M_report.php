<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_report extends CI_Model {
    function getDataPenjualan($param){
        $startDate = $param['startdate'];
        $endDate = $param['enddate'];

        $query = $this->db->query("
                                SELECT * FROM 
                                data_jual
                                WHERE DATE(jual_tanggal) BETWEEN '".date('Y-m-d',strtotime($startDate))."' AND '".date('Y-m-d',strtotime($endDate))."'
                                ORDER BY jual_tanggal DESC");

		return $query->result();
	}
}