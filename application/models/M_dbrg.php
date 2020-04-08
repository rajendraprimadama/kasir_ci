<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dbrg extends CI_Model {
	public function select_all() {
		$data = $this->db->get('data_barang'); //merujuk database

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM data_barang WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO data_barang VALUES('',
		'" .$data['Namabarang'] ."',
		'" .$data['Kategori'] ."',
		'" .$data['Hrgbeli'] ."',
		'" .$data['Hrgjual'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('data_barang', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE data_barang SET nmbrg='" .$data['Namabarang'] ."',
		kategori='" .$data['Kategori'] ."',
		hrgbeli='" .$data['Hrgbeli'] ."',
		hrgjual='" .$data['Hrgjual'] ."'
		 WHERE id='" .$data['id'] ."'";

		/*$sql = "UPDATE pegawai SET nama='" .$data['nama'] ."',
		telp='" .$data['telp'] ."', 
		id_kota=" .$data['kota'] .", 
		id_kelamin=" .$data['jk'] .", 
		id_posisi=" .$data['posisi'] ." 
		WHERE id='" .$data['id'] ."'";*/

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM data_barang WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nmbrg', $Namabarang);
		$data = $this->db->get('data_barang');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('data_barang');

		return $data->num_rows();
	}
}

/* End of file M_posisi.php */
/* Location: ./application/models/M_posisi.php */