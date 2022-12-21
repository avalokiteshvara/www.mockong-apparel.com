<?php

class Rangeharga_Model extends CI_Model{
	

	public $limit;
	public $offset;
	public $sort;
	public $order;
	
	function __construct(){

		parent::__construct();

	}

	function get(){

		$rs = $this->db->query('SELECT * FROM tbl_range_harga');
		return $rs;

	}


	function delete($id){	

		$this->db->delete('tbl_range_harga',array('id' => $id));

	}

	function insert($data){

		$this->db->insert('tbl_range_harga',$data);

	}

	function update($id,$data){

		$this->db->where('id',$id);
		$this->db->update('tbl_range_harga',$data);
	}


}