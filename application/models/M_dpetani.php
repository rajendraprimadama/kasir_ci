<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dpetani extends CI_Model {
	public function select_all() {
		$data = $this->db->get('data_petani'); //merujuk database

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM data_petani WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, kota, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_kota = kota.id AND pegawai.id_posisi={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO data_petani VALUES('',
		'" .$data['Nama'] ."',
		'" .$data['Alamat'] ."',
		'" .$data['Telepon'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('data_petani', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE data_petani SET nama='" .$data['Nama'] ."',
		alamat='" .$data['Alamat'] ."',
		telepon='" .$data['Telepon'] ."'
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
		$sql = "DELETE FROM data_petani WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('data_petani');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('data_petani');

		return $data->num_rows();
	}
}

/* End of file M_posisi.php */
/* Location: ./application/models/M_posisi.php */