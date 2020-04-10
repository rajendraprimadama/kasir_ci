<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dbrg extends CI_Model {
	public function select_all() {
		// $data = $this->db->get('data_barang'); //merujuk database
		$sql = "SELECT data_barang.*, data_kategori.kategori AS kategori FROM data_barang INNER JOIN data_kategori on data_barang.kategori = data_kategori.id";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM data_barang WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO data_barang 
		(id_brg,nama_brg,kategori,hrg_beli,pcs_hrgjual_retail,pax_hrgjual_retail,dus_hrgjual_retail,pcs_hrgjual_grosir,pax_hrgjual_grosir,dus_hrgjual_grosir) 
		VALUES(
		'" .$this->generateID($data['v_namabrg'])."',	
		'" .$data['v_namabrg'] ."',
		'" .$data['v_kategori'] ."',
		'" .$this->saveInt($data['v_hrgbeli'])."',
		'" .$this->saveInt($data['v_pcs_hrgjual_retail'])."',
		'" .$this->saveInt($data['v_pax_hrgjual_retail'])."',
		'" .$this->saveInt($data['v_dus_hrgjual_retail'])."',
		'" .$this->saveInt($data['v_pcs_hrgjual_grosir'])."',
		'" .$this->saveInt($data['v_pax_hrgjual_grosir'])."',
		'" .$this->saveInt($data['v_dus_hrgjual_grosir'])."')";

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

	private function saveInt($param) {
		$hasil = '';

        if($param){
            $nilai  = trim(str_replace("`", "", $param));
            $hasil  = str_replace(",", "", $nilai);
        }
        else{
            $hasil = '0';
        }

        return $hasil;
	}

	private function generateID($param)
    {
        $generate_id = '';

		$perix_param = substr($param,0,3);
		$sql = "SELECT id_brg FROM data_barang WHERE id_brg LIKE '%$perix_param%' order by id_brg DESC limit 1";
		$data = $this->db->query($sql);
		$result = $data->result();

        $last_id = isset($result[0]->id_brg) ? $result[0]->id_brg : false;
        if(!empty($last_id)){
			$new_id = substr($last_id, 7) + 1;

			$new_id = str_pad($new_id, 5, '0', STR_PAD_LEFT);
			$generate_id = $perix_param. $new_id;
        }
        else{
            $generate_id = $perix_param . '00001';
		}
		
        return $generate_id;
    }
}

/* End of file M_posisi.php */
/* Location: ./application/models/M_posisi.php */