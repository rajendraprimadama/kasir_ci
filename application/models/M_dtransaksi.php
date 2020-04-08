<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dtransaksi extends CI_Model {
	public function select_all_dtransaksi() {
		$sql = "SELECT * FROM data_transaksi";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all_pertanian() {
		$data = $this->db->get('data_pertanian'); //merujuk database

		return $data->result();
	}

	public function select_all() {
		$sql = " SELECT 
		data_transaksi.id AS id, 
		data_petani.nama AS nama, 
		data_transaksi.jns AS jenis,
		data_transaksi.tgl AS tanggal, 
		data_transaksi.setor AS setor, 
		data_transaksi.hrgperkg AS hargaperkg, 
		data_transaksi.total AS total, 
		data_transaksi.tagihan AS tagihan, 
		data_transaksi.stts AS status 
		FROM data_transaksi, data_petani 
		WHERE data_transaksi.nm_id = data_petani.id";

		$data = $this->db->query($sql);

		return $data->result();
	}

		public function select_transaksi($data) {
		$sql = " SELECT 
		data_transaksi.id AS id, 
		data_petani.nama AS nama, 
		data_transaksi.jns AS jenis,
		data_transaksi.tgl AS tanggal, 
		data_transaksi.setor AS setor, 
		data_transaksi.hrgperkg AS hargaperkg, 
		data_transaksi.total AS total, 
		data_transaksi.tagihan AS tagihan, 
		data_transaksi.stts AS status
		 FROM data_transaksi, data_petani 
		WHERE data_transaksi.nm_id = data_petani.id and tgl between '".$data['tanggal1'] ."' and '".$data['tanggal2']."' and nm_id = ".$data['nama'] ." and jns like '%".$data['jenis'] ."%'";
		//print_r($sql);
		//break;
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_nota() {
		$sql = " SELECT 
		MAX(data_transaksi.id) AS id, 
		data_transaksi.no_nota AS nota,
		data_petani.nama AS nama, 
		data_transaksi.jns AS jenis,
		data_transaksi.tgl AS tanggal, 
		data_transaksi.setor AS setor, 
		data_transaksi.hrgperkg AS hargaperkg, 
		data_transaksi.total AS total, 
		data_transaksi.tagihan AS tagihan, 
		data_transaksi.stts AS status
		FROM data_transaksi, data_petani 
		WHERE data_transaksi.nm_id = data_petani.id and data_transaksi.id=(select MAX(data_transaksi.id) from  data_transaksi) LIMIT 1";
		
		$data = $this->db->query($sql);
		return $data->result();
	}

		public function select_notaupdate($id) {
		$sql = " SELECT 
		MAX(data_transaksi.id) AS id, 
		data_transaksi.no_nota AS nota,
		data_petani.nama AS nama, 
		data_transaksi.jns AS jenis,
		data_transaksi.tgl AS tanggal, 
		data_transaksi.setor AS setor, 
		data_transaksi.hrgperkg AS hargaperkg, 
		data_transaksi.total AS total, 
		data_transaksi.tagihan AS tagihan, 
		data_transaksi.stts AS status
		FROM data_transaksi, data_petani 
		WHERE data_transaksi.nm_id = data_petani.id and data_transaksi.id='$id' LIMIT 1";
		
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_by_id($id) {

		$sql = "SELECT * FROM data_transaksi WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {
		$bayar = trim($data['bayar']);
		$total = trim($data['total']);
		if ((int)$total == (int)$bayar) {
			$sql = "UPDATE data_transaksi SET stts='LUNAS',tagihan='0' WHERE id='" .$data['id'] ."'";
		}else{
			$sisa = (int)$total - (int)$bayar;
			$sql = "UPDATE data_transaksi SET tagihan='$sisa' WHERE id='" .$data['id'] ."'";
		}

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM data_transaksi WHERE id='" .$id ."'";

		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function simpanjenis($id) {
		$sql = "INSERT INTO data_pertanian VALUES('','$id')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO pegawai VALUES('{$id}','" .$data['nama'] ."','" .$data['telp'] ."'," .$data['kota'] ."," .$data['jk'] ."," .$data['posisi'] .",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function simpantransaksi00($data) {
		$tanggals = date('y-m-d');
		$id = "N".DATE('ymdhms');
		$sql = "INSERT INTO data_transaksi VALUES('','".$id."',".$data['nama'] .",'" .$data['jenis'] ."','" .$tanggals."'," .$data['beli'] ."," .$data['harga'] ."," .$data['totalbayarh'] ."," .'0' .",'" .'lunas'."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function simpantransaksi01($data) {
		$tanggals = date('y-m-d');
		$total = $data['totalbayarh'];
		$dibayar = $data['dibayar'];
		$id = "N".DATE('ymdhms');
		if ((int)$total > (int)$dibayar) {
			$krg = (int)$total - (int)$dibayar;
			$l = "BELUM LUNAS";
		}
		$sql = "INSERT INTO data_transaksi VALUES('','".$id."',".$data['nama'] .",'" .$data['jenis'] ."','" .$tanggals."'," .$data['beli'] ."," .$data['harga'] ."," .$data['totalbayarh'] ."," .$krg.",'" .$l."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function simpantransaksi10($data) {
		$tanggals = $data['tanggal'];
		$id = "N".DATE('ymdhms');
		$sql = "INSERT INTO data_transaksi VALUES('','".$id."',".$data['nama'] .",'" .$data['jenis'] ."','" .$tanggals."'," .$data['beli'] ."," .$data['harga'] ."," .$data['totalbayarh'] ."," .'0' .",'" .'lunas'."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function simpantransaksi11($data) {
		$tanggals = $data['tanggal'];
		$total = $data['totalbayarh'];
		$dibayar = $data['dibayar'];
		$id = "N".DATE('ymdhms');
		if ((int)$total > (int)$dibayar) {
			$krg = (int)$total - (int)$dibayar;
			$l = "BELUM LUNAS";
		}
		$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO data_transaksi VALUES('','".$id."',".$data['nama'] .",'" .$data['jenis'] ."','" .$tanggals."'," .$data['beli'] ."," .$data['harga'] ."," .$data['totalbayarh'] ."," .$krg.",'" .$l."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}


	public function insert_batch($data) {
		$this->db->insert_batch('pegawai', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */