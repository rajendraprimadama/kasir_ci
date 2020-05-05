<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	// public function update($data, $id) {
	// 	$this->db->where("id", $id);
	// 	$this->db->update("admin", $data);

	// 	return $this->db->affected_rows();
	// }

	public function select($id = '') {
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('admin');

		return $data->row();
	}

	public function insert($data) {

		$this->db->insert('admin',[
							'username' => $data['v_username'],
							'password' => md5($data['v_password']),
							'nama' => $data['v_nama'],
							'authority_level' => $data['v_authority']
						]);

		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

	public function update($data,$id) {

		$this->db->where('id', $id);
		$this->db->update('admin',[
							'username' => $data['v_username'],
							'password' => md5($data['v_password']),
							'nama' => $data['v_nama'],
							'authority_level' => $data['v_authority']
						]);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('admin');

		return $this->db->affected_rows();
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */