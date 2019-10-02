<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('ModelPelanggan');

		if (empty($this->session->userdata('id'))) {
			redirect(base_url());
		}
	}

	public function index() {
		$data['title'] 		= "Data Pelanggan";
		$id_user 			= $this->session->userdata('id');
		$data['user']		= $this->db->get_where('user', ['id_user' => $id_user])->row_array();
		$data['pelanggan']	= $this->ModelPelanggan->select()->result_array();

		$this->load->view('admin/template/__header', $data);
		$this->load->view('admin/pelanggan/index', $data);
		$this->load->view('admin/template/__footer');
	}

	public function tambah() {
		$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'trim|required');
		$this->form_validation->set_rules('alamat_pelanggan', 'alamat Pelanggan', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] 		= "Tambah Data Pelanggan";
			$id_user 			= $this->session->userdata('id');
			$data['user']		= $this->db->get_where('user', ['id_user' => $id_user])->row_array();

			$this->load->view('admin/template/__header', $data);
			$this->load->view('admin/pelanggan/addPelanggan', $data);
			$this->load->view('admin/template/__footer');

		} else {

			$this->ModelPelanggan->insert();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Menambahkan Data Pelanggan.');
			}
			redirect('admin/pelanggan');
		}
	}

	public function ubah() {
		$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'trim|required');
		$this->form_validation->set_rules('alamat_pelanggan', 'alamat Pelanggan', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$id 				= $this->uri->segment(4);
			$data['title'] 		= "Ubah Data Pelanggan";
			$id_user 			= $this->session->userdata('id');
			$data['user']		= $this->db->get_where('user', ['id_user' => $id_user])->row_array();
			$data['pelanggan']	= $this->ModelPelanggan->select($id)->row_array();

			$query = $this->db->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id' ")->row_array();

			if ( empty($id) || $id != $query['id_pelanggan']) {
				redirect('admin/pelanggan');
			}

			$this->load->view('admin/template/__header', $data);
			$this->load->view('admin/pelanggan/editPelanggan', $data);
			$this->load->view('admin/template/__footer');

		} else {

			$this->ModelPelanggan->update();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Mengubah Data Pelanggan.');
			}
			redirect('admin/pelanggan');
		}
	}

	public function hapus($id) {
		$this->ModelPelanggan->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Menghapus Data Pelanggan.');
		}
		redirect('admin/pelanggan');
	}
}