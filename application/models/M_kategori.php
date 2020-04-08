<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {
	public function select_all() {
		$data = $this->db->get('data_kategori'); //merujuk database

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM data_kategori WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO data_kategori VALUES('',
		'" .$data['ktgr'] ."')";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('data_kategori', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE data_kategori SET kategori='" .$data['Kategori'] ."'
		 WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM data_kategori WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('data_kategori', $Kategori);
		$data = $this->db->get('data_kategori');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('data_kategori');

		return $data->num_rows();
	}
}

/* End of file M_posisi.php */
/* Location: ./application/models/M_posisi.php */