<?php

class Trans_Details_Model extends CI_Model{

	function __construct(){

		parent::__construct();

	}

	function get_details($id_trans){

		$sql = "SELECT a.kode_produk,a.harga_satuan,a.quantity,b.slug,b.nama,SUM(a.harga_satuan * a.quantity) as sub_total ".
			   "FROM tbl_trans_details a ".
			   "LEFT JOIN tbl_produk b ON a.kode_produk = b.kode ".
			   "WHERE a.id_trans = $id_trans ".
			   "GROUP BY a.id";

		$rs = $this->db->query($sql);
		return $rs;	   
	}

	function insert($id_trans){

		// 'id'      => $this->input->post('kode_produk'),
		// 	'qty'     => $this->input->post('banyak'),
		//     'price'   => $this->input->post('harga'),
		// 	'name'    => $this->input->post('nama_produk'),
		// 	'gambar'  => $this->input->post('gambar')
		
		foreach ($this->cart->contents() as $item) {
			$data = array();
			$data['id_trans'] = $id_trans;
			$data['kode_produk'] = $item['id'];
			$data['harga_satuan'] = $item['price'];
			$data['quantity'] = $item['qty'];

			$this->db->insert('tbl_trans_details',$data);

		}                 
	}
	

}