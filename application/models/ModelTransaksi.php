<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTransaksi extends CI_Model {

	public function select($id = null) {
		if ($id != null) {
			$this->db->where('id_transaksi', $id);
		}

		$this->db->join('barang', 'barang.id_barang = transaksi.id_barang' ,'LEFT');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan' ,'LEFT');
		$this->db->order_by('no_struk', 'DESC');
		$this->db->select('*');
		$this->db->from('transaksi');
		return $this->db->get();
	}

	public function total() {
		return $this->db->query("SELECT SUM(subtotal) total FROM transaksi");
	}


	public function NomorStruk() {
	    $this->db->select('Right(transaksi.no_struk,2) as no_struk', FALSE);
	    $this->db->order_by('no_struk','DESC');
	    $this->db->limit(1);
	    $query = $this->db->get('transaksi');
	        if($query->num_rows() <> 0){
	            $data = $query->row();
	            $kode = intval($data->no_struk) + 1;
	        } else {
	            $kode = 1;
	        }

        $date = date('Ymd');
	    $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
	    $kodehasil = "TRX-".$date.$kodemax;
	    return $kodehasil;
	}

	public function save_batch($data) {
		return $this->db->insert_batch('transaksi', $data);
	}
}