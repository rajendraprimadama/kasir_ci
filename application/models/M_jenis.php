<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis extends CI_Model {
	public function select_all() {
		$data = $this->db->get('data_pertanian'); //merujuk database

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM data_pertanian WHERE idpertanian = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}


	public function insert($data) {
		$sql = "INSERT INTO data_pertanian VALUES('','" .$data['jenis'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('data_pertanian', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE data_pertanian SET jenis='" .$data['jenis'] ."' WHERE idpertanian='" .$data['id'] ."'";

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
		$sql = "DELETE FROM data_pertanian WHERE idpertanian='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($jenis) {
		$this->db->where('jenis', $jenis);
		$data = $this->db->get('data_pertanian');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('data_pertanian');

		return $data->num_rows();
	}
}

/* End of file M_posisi.php */
/* Location: ./application/models/M_posisi.php */