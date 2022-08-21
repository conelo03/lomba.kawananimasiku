<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lomba extends CI_Model {

	public $table	= 'tb_lomba';

	public function get_data($jenjang_sekolah = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if ($jenjang_sekolah != null) {
			$this->db->like('jenjang_sekolah', $jenjang_sekolah, 'both');
		}
		$this->db->order_by('tanggal_lomba', 'ASC');
    return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_lomba)
	{
		return $this->db->get_where($this->table, ['id_lomba' => $id_lomba])->row_array();
	}

	public function update($data)
	{
		$this->db->where('id_lomba', $data['id_lomba']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_lomba)
	{
		$this->db->delete($this->table, ['id_lomba' => $id_lomba]);
	}
}
