<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('ModelBarang');

		if (empty($this->session->userdata('id'))) {
			redirect(base_url());
		}
	}

	public function index() {
		$data['title'] 	= "Data Barang";
		$id_user 		= $this->session->userdata('id');
		$data['user']	= $this->db->get_where('user', ['id_user' => $id_user])->row_array();
		$data['barang']	= $this->ModelBarang->select()->result_array();

		$this->load->view('admin/template/__header', $data);
		$this->load->view('admin/barang/index', $data);
		$this->load->view('admin/template/__footer');
	}

	public function tambah() {
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('harga_barang', 'Harga Barang', 'trim|required');
		$this->form_validation->set_rules('stock_barang', 'Stock Barang', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] 	= "Tambah Data Barang";
			$id_user 		= $this->session->userdata('id');
			$data['user']	= $this->db->get_where('user', ['id_user' => $id_user])->row_array();

			$this->load->view('admin/template/__header', $data);
			$this->load->view('admin/barang/addBarang', $data);
			$this->load->view('admin/template/__footer');

		} else {

			$this->ModelBarang->insert();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Menambahkan Data Barang.');
			}
			redirect('admin/barang');
		}
	}

	public function ubah() {
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required|callback_checkNamaBrg');
		$this->form_validation->set_rules('harga_barang', 'Harga Barang', 'trim|required');
		$this->form_validation->set_rules('stock_barang', 'Stock Barang', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$id 			= $this->uri->segment(4);
			$data['title'] 	= "Ubah Data Barang";
			$id_user 		= $this->session->userdata('id');
			$data['user']	= $this->db->get_where('user', ['id_user' => $id_user])->row_array();
			$data['barang']	= $this->ModelBarang->select($id)->row_array();

			$query = $this->db->query("SELECT * FROM barang WHERE id_barang = '$id' ")->row_array();

			if ( empty($id) || $id != $query['id_barang']) {
				redirect('admin/barang');
			}

			$this->load->view('admin/template/__header', $data);
			$this->load->view('admin/barang/editBarang', $data);
			$this->load->view('admin/template/__footer');

		} else {

			$this->ModelBarang->update();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Mengubah Data Barang.');
			}
			redirect('admin/barang');
		}
	}

	public function checkNamaBrg() {
        $post 	= $this->input->post(null, TRUE);
        $query	= $this->db->query("SELECT * FROM barang WHERE nama_barang = '$post[nama_barang]' AND id_barang != '$post[id_barang]'");

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('checkNamaBrg', '{field} sudah terdaftar');
            return FALSE;
        } else {
            return TRUE;
        }
    }

	public function hapus($id) {
		$this->ModelBarang->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Menghapus Data Barang.');
		}
		redirect('admin/barang');
	}
}