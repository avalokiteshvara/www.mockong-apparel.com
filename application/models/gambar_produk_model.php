<?php

class Gambar_Produk_Model extends CI_MOdel {

	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __contruct(){

		parent::__contruct();

	}


	function get_where($key,$value){

		$rs = $this->db->select('*')
                	   ->from('tbl_gambar_produk')
                	   ->where($key,$value)
                	   ->order_by($this->sort,$this->order)
                       ->get('', $this->limit, $this->offset);

        return $rs;
	}

	function get($slug){

		$sql = "SELECT a.id as id,a.updated_at as updated_at,a.gambar as gambar ,b.nama as nama_produk ".
			   "FROM tbl_gambar_produk a ".
			   "LEFT JOIN tbl_produk b ".
			   "ON a.kode_produk = b.kode ".
			   "WHERE b.slug = ? ".
			   "ORDER BY $this->sort $this->order ".
			   "LIMIT $this->offset,$this->limit"; 

		$rs = $this->db->query($sql,array($slug));		
		return $rs;		   

	}

	function insert($data){

		$this->db->insert('tbl_gambar_produk',$data);

	}

	function delete($id){

		$this->db->query("DELETE FROM tbl_gambar_produk WHERE id=$id");		

	}

}