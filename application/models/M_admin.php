<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	public function update($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("admin", $data);

		return $this->db->affected_rows();
	}

	public function select($id = '') {
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('admin');

		return $data->row();
	}

	public function insert($data) {
		// $sql = "INSERT INTO admin  (username,password,nama,authority_level) VALUES (
		// '" .$data['v_username'] ."',
		// '" .md5($data['v_password']) ."',
		// '" .$data['v_nama'] ."',
		// '" .$data['v_authority'] ."')";

		$this->db->insert('admin',[
							'username' => $data['v_username'],
							'password' => md5($data['v_password']),
							'nama' => $data['v_nama'],
							'authority_level' => $data['v_authority']
						]);

		$insert_id = $this->db->insert_id();
		// $this->db->query($sql);

		return $insert_id;
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */