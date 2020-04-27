<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_report extends CI_Model {
    function getDataPenjualan($param){
        $startDate = $param['startdate'];
        $endDate = $param['enddate'];
        
        $query = $this->db->query("
                                    SELECT
                                        `data_jual`.`jual_nofak` AS NO_Transaksi,
                                        `data_jual`.`jual_tanggal` AS DATE,
                                        SUM(`data_detail_jual`.`d_jual_qty`) AS Qty,
                                        SUM(`data_detail_jual`.`d_jual_barang_harpok`) AS Total_HargaBeli,
                                        `data_jual`.`jual_total` AS Total_HargaJual,
                                        `data_jual`.`jual_keterangan` AS Keterangan
                                        
                                    FROM `data_jual`
                                    INNER JOIN `data_detail_jual`
                                    ON `data_jual`.`jual_nofak` = `data_detail_jual`.`d_jual_nofak`
                                    WHERE DATE(`data_jual`.jual_tanggal) BETWEEN '".date('Y-m-d',strtotime($startDate))."' AND '".date('Y-m-d',strtotime($endDate))."'
                                    GROUP BY `data_detail_jual`.`d_jual_nofak`
                                    ORDER BY `data_jual`.jual_tanggal DESC
                                ");

		return $query->result();
    }
    
    function getDetailTransaksi($param){
        $query = $this->db->query("
                                    SELECT 
                                        `data_jual`.`jual_nofak` AS NO_Transaksi, 
                                        `data_jual`.`jual_tanggal` AS DATE,
                                        `data_detail_jual`.`d_jual_barang_id` AS ID_Barang,
                                        `data_detail_jual`.`d_jual_barang_nama` AS Nama_Barang,
                                        `data_detail_jual`.`d_jual_barang_satuan` AS Satuan,
                                        `data_detail_jual`.`d_jual_qty` AS Qty,
                                        `data_detail_jual`.`d_jual_barang_harpok` AS Harga_Beli,
                                        `data_detail_jual`.`d_jual_barang_harjul` AS Harga_Jual,
                                        `data_detail_jual`.`d_jual_total` AS Total,
                                        `data_jual`.`jual_keterangan` AS Keterangan
                                    FROM `data_detail_jual`
                                    INNER JOIN `data_jual` 
                                    ON `data_detail_jual`.`d_jual_nofak`  = `data_jual`.`jual_nofak`
                                    WHERE `data_jual`.`jual_nofak` = '".$param."'
                                    ORDER BY `data_detail_jual`.d_jual_id DESC
                                ");

        return $query->result();
    }
}