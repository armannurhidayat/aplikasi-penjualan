<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelBarang extends CI_Model {

	public function select($id = null) {
		if ($id != null) {
			$this->db->where('id_barang', $id);
		}

		$this->db->select('*');
		$this->db->order_by('id_barang', 'DESC');
		$this->db->from('barang');
		return $this->db->get();
	}

	public function insert() {
		$data =[
			'nama_barang'	=> $this->input->post('nama_barang', TRUE),
			'harga_barang'	=> $this->input->post('harga_barang', TRUE),
			'stock_barang'	=> $this->input->post('stock_barang', TRUE)
		];
		$this->db->insert('barang', $data);
	}

	public function update() {
		$data =[
			'nama_barang'	=> $this->input->post('nama_barang', TRUE),
			'harga_barang'	=> $this->input->post('harga_barang', TRUE),
			'stock_barang'	=> $this->input->post('stock_barang', TRUE)
		];

		$id =[
			'id_barang'		=> $this->input->post('id_barang', TRUE)
		];
		$this->db->where($id)->update('barang', $data);
	}

	public function delete($id) {
		$this->db->delete('barang', ['id_barang' => $id]);
	}
}