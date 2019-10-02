<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('ModelBarang');
		$this->load->model('ModelPelanggan');
		$this->load->model('ModelTransaksi');

		if (empty($this->session->userdata('id'))) {
			redirect(base_url());
		}
	}

	public function index() {
		$data['title'] 		= "Dashboard";
		$id_user 			= $this->session->userdata('id');
		$data['user']		= $this->db->get_where('user', ['id_user' => $id_user])->row_array();
		$data['barang']		= $this->ModelBarang->select()->num_rows();
		$data['pelanggan']	= $this->ModelPelanggan->select()->num_rows();
		$data['transaksi']	= $this->ModelTransaksi->select()->num_rows();
		$data['total']		= $this->ModelTransaksi->total()->result();

		$this->load->view('admin/template/__header', $data);
		$this->load->view('admin/home', $data);
		$this->load->view('admin/template/__footer');
	}
}