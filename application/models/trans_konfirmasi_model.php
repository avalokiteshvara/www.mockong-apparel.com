<?php

class Trans_Konfirmasi_Model extends CI_Model{
	
	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __construct(){

		parent::__construct();

	}

	function insert($data){

		$this->db->insert('tbl_trans_konfirmasi',$data);		

	}

	function get_konfirmasi($id_trans){

		$sql = "SELECT * FROM ".
			   "tbl_trans_konfirmasi ".
			   "WHERE id_trans = $id_trans ".
			   "ORDER BY tgl_setor DESC LIMIT 0,1";

		$rs = $this->db->query($sql);	   
		return $rs;


	}
}