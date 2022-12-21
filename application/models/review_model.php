<?php

class Review_Model extends CI_Model {

	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __construct(){

		parent::__construct();

	}

	function get_where($slug){			

		$sql = 	"SELECT a.nama,a.email,a.update_at,a.isi,a.rating ".
				"FROM tbl_review a ".
				"LEFT JOIN tbl_produk b ".
				"ON a.kode_produk = b.kode ".
				"WHERE b.slug = ? AND a.accepted='Y' ".
				"ORDER BY $this->sort $this->order ".
				"LIMIT $this->offset,$this->limit";
		$rs = $this->db->query($sql,array($slug));					

		return $rs;	
	}


	function get_num_where($slug){
		$sql = 	"SELECT * ".
				"FROM tbl_review a ".
				"LEFT JOIN tbl_produk b ".
				"ON a.kode_produk = b.kode ".
				"WHERE b.slug = ? AND a.accepted='Y' ";				
		$rs = $this->db->query($sql,array($slug));					

		return $rs->num_rows();	

	}

	function get(){

		$sql = 	"SELECT a.id,a.nama,a.email,a.update_at,a.isi,a.rating,b.gambar,".
				"		b.kode as kode_produk,b.nama as nama_produk,a.accepted ".
				"FROM tbl_review a ".
				"LEFT JOIN tbl_produk b ".
				"ON a.kode_produk = b.kode ".				
				"ORDER BY $this->sort $this->order ".
				"LIMIT $this->offset,$this->limit";
		$rs = $this->db->query($sql);					

		return $rs;	

	}

	function get_num(){

		$sql = 	"SELECT * ".
				"FROM tbl_review a ".
				"LEFT JOIN tbl_produk b ".
				"ON a.kode_produk = b.kode ";
				
		$rs = $this->db->query($sql);					

		return $rs->num_rows();	


	}

	function insert($data){

		$this->db->insert('tbl_review',$data);
		
	}

	function accepted($id){
		$this->db->query("UPDATE tbl_review SET accepted='Y' WHERE id=$id");
	}

	function delete($id){
		$this->db->query("DELETE FROM tbl_review WHERE id = $id");
	}


}