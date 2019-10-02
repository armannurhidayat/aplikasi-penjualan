<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('ModelTransaksi');
		$this->load->model('ModelBarang');
		$this->load->model('ModelPelanggan');

		if (empty($this->session->userdata('id'))) {
			redirect(base_url());
		}
	}

	public function index() {
		$data['title']		= "Form Transaksi Penjualan";
		$id_user 			= $this->session->userdata('id');
		$data['user']		= $this->db->get_where('user', ['id_user' => $id_user])->row_array();
		$data['struk']		= $this->ModelTransaksi->NomorStruk();
		$data['barang']		= $this->ModelBarang->select()->result_array();
		$data['pelanggan']	= $this->ModelPelanggan->select()->result_array();

		$this->load->view('admin/template/__header', $data);
		$this->load->view('admin/transaksi/formTransaksi', $data);
		$this->load->view('admin/template/__footer');
	}

	public function insertPenjualan() {
		$struk 			= $_GET['struk'];
		$tanggal		= $_GET['tanggal'];
		$id_pelanggan	= $_GET['id_pelanggan'];
		$barang 		= $_GET['barang'];
		$grand_total 	= $_GET['grand_total'];
		$jumlah 		= $_GET['jumlah'];
		$data 			= [];

		$index 	= 0;
		if (is_array($barang) || is_object($barang)) {
			foreach ($barang as $value) {
				array_push($data, [
					'no_struk'			=> $struk,
					'id_pelanggan'		=> $id_pelanggan,
					'id_barang'			=> $barang[$index],
					'tanggal_transaksi'	=> $tanggal,
					'jumlah'			=> $jumlah[$index],
					'subtotal'			=> $grand_total
				]);

				$index++;
			}
		}

		$response = $this->ModelTransaksi->save_batch($data);
		if (!$response) {
			echo "Data gagal ditambahkan";
			return FALSE;

		} else {

			echo "Data berhasil ditambahkan!";
			return TRUE;
		}
	}

	public function laporan(){
		$data['title']		= "Form Transaksi Penjualan";
		$id_user 			= $this->session->userdata('id');
		$data['user']		= $this->db->get_where('user', ['id_user' => $id_user])->row_array();
		$data['transaksi']	= $this->ModelTransaksi->select()->result_array();

		$this->load->view('admin/template/__header', $data);
		$this->load->view('admin/transaksi/laporanTransaksi', $data);
		$this->load->view('admin/template/__footer');
	}
}