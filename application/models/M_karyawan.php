<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {
	public function select_all() {
		$data = $this->db->get('data_karyawan'); //merujuk database

		$this->db->select('data_karyawan.*, admin.authority_level AS authority, admin.username, admin.password');
		$this->db->from('data_karyawan');
		$this->db->join('admin', 'data_karyawan.id_admin = admin.id','left outer'); 
		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {

		$this->db->select('data_karyawan.*, admin.authority_level AS authority, admin.username, admin.password');
		$this->db->from('data_karyawan');
		$this->db->join('admin', 'data_karyawan.id_admin = admin.id','left outer');
		$this->db->where('data_karyawan.id',$id);
		$data = $this->db->get();

		// $sql = "SELECT * FROM data_karyawan WHERE id = '{$id}'";

		// $data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data, $akses) {

		$this->db->insert('data_karyawan',[
			'id_admin' => $akses,
			'name' => $data['v_nama'],
			'address' => $data['v_alamat'],
			'phone' => $data['v_phone']
		]);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('data_karyawan', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE data_karyawan SET 
					name='" .$data['v_nama'] ."',
					address='" .$data['v_alamat'] ."',
					phone='" .$data['v_phone'] ."'
		 		WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM data_karyawan WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('name', $namacustomer);
		$data = $this->db->get('data_karyawan');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('data_karyawan');

		return $data->num_rows();
	}
}

/* End of file M_posisi.php */
/* Location: ./application/models/M_posisi.php */