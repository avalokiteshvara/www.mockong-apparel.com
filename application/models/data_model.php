<?php 

class Data_Model extends CI_Model{
	
	function __construct(){

		parent::__construct();

	}

	function get_where($field,$field_content){
	    
		$rs = $this->db->get_where('tbl_data',array($field => $field_content));
		return $rs->row()->content;

	}


	
}