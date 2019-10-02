<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPelanggan extends CI_Model {

	public function select($id = null) {
		if ($id != null) {
			$this->db->where('id_pelanggan', $id);
		}

		$this->db->select('*');
		$this->db->order_by('id_pelanggan', 'DESC');
		$this->db->from('pelanggan');
		return $this->db->get();
	}

	public function insert() {
		$data =[
			'nama_pelanggan' 	=> $this->input->post('nama_pelanggan', TRUE),
			'alamat_pelanggan' 	=> $this->input->post('alamat_pelanggan', TRUE)
		];
		$this->db->insert('pelanggan', $data);
	}

	public function update() {
		$data =[
			'nama_pelanggan' 	=> $this->input->post('nama_pelanggan', TRUE),
			'alamat_pelanggan' 	=> $this->input->post('alamat_pelanggan', TRUE)
		];

		$id =[
			'id_pelanggan' 		=> $this->input->post('id_pelanggan', TRUE)
		];
		$this->db->where($id)->update('pelanggan', $data);
	}

	public function delete($id) {
		$this->db->delete('pelanggan', ['id_pelanggan' => $id]);
	}
}