<?php

class Trans_Header_Model extends CI_Model{
	

	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __construct(){

		parent::__construct();

	}

	
	function get_status($status='PAYMENT_CONFIRMED'){
		$sql = 	"SELECT a.*,SUM(b.quantity) as quantity, ".
				"		SUM(b.quantity * b.harga_satuan) as total_trans ".
				"FROM tbl_trans_header a ".
				"LEFT JOIN tbl_trans_details b ".
				"ON a.id = b.id_trans ".				
				"WHERE a.status='$status' " .
				"GROUP BY a.id ".
			   	"ORDER BY $this->sort $this->order ".
			   	"LIMIT $this->offset,$this->limit"; 

		$rs = $this->db->query($sql);		
		return $rs;				
	}

	function get_status_num($status='PAYMENT_CONFIRMED'){
		$sql = "SELECT * ".
		 		"FROM tbl_trans_header a ".
				"LEFT JOIN tbl_trans_details b ".
				"ON a.id = b.id_trans ".				
				"WHERE a.status='$status' " .
				"GROUP BY a.id ";		 		

		$rs = $this->db->query($sql);		
		return $rs->num_rows();	   
	}


	function get_histori(){

		$sql = 	"SELECT a.*,SUM(b.quantity) as quantity, ".
				"		SUM(b.quantity * b.harga_satuan) as total_trans ".
				"FROM tbl_trans_header a ".
				"LEFT JOIN tbl_trans_details b ".
				"ON a.id = b.id_trans ".				
				"GROUP BY a.id ".
			   	"ORDER BY $this->sort $this->order ".
			   	"LIMIT $this->offset,$this->limit"; 

		$rs = $this->db->query($sql);		
		return $rs;		   

	}


	function get_num_histori(){

		$sql = 	"SELECT * ".
				"FROM tbl_trans_header a ".
				"LEFT JOIN tbl_trans_details b ".
				"ON a.id = b.id_trans ".				
				"GROUP BY a.id ";

		$rs = $this->db->query($sql);		
		return $rs->num_rows();		   
	}

/*************************************************************************************/
	function get_penjualan($aktif=NULL){
		$sql	= 	"SELECT a.*,SUM(b.quantity) as jml_jual,".
					"		IFNULL(d.average_rating ,0) as average_rating,".
					"		SUM(b.quantity * b.harga_satuan) as hasil_penjualan ".
				 	"FROM tbl_produk a ".
				 	"LEFT JOIN tbl_trans_details b ".
				 	"ON a.kode = b.kode_produk ".
					"LEFT JOIN tbl_trans_header c ".
					"ON c.id = b.id_trans ".
					"LEFT JOIN (SELECT kode_produk,FLOOR(AVG(rating)) as average_rating  ".
			  		"			FROM tbl_review ".
			  		"			GROUP BY kode_produk) d ".
					"ON a.kode = d.kode_produk ".
					"WHERE ( c.`status`  = ? OR c.`status` = ? ) ";
					

		if(isset($aktif)){

			$sql .= "AND a.aktif = ? ";
			$sql .= "GROUP BY b.kode_produk ".
					"ORDER BY $this->sort $this->order ".
					"LIMIT $this->offset,$this->limit";

			$rs = $this->db->query($sql,array('PROCESSING','COMPLETE',$aktif));		

		}else{

			$sql .= "GROUP BY b.kode_produk ".
					"ORDER BY $this->sort $this->order ".
					"LIMIT $this->offset,$this->limit";

			$rs = $this->db->query($sql,array('PROCESSING','COMPLETE'));		

		}			
			
		return $rs;	
	}

	function num_page_penjualan($aktif=NULL){

		$sql	= 	"SELECT * ".					
				 	"FROM tbl_produk a ".
				 	"LEFT JOIN tbl_trans_details b ".
				 	"ON a.kode = b.kode_produk ".
					"LEFT JOIN tbl_trans_header c ".
					"ON c.id = b.id_trans ".
					"LEFT JOIN (SELECT kode_produk,FLOOR(AVG(rating)) as average_rating  ".
			  		"			FROM tbl_review ".
			  		"			GROUP BY kode_produk) d ".
					"ON a.kode = d.kode_produk ".
					"WHERE ( c.`status`  = ? OR c.`status` = ? ) ";

		if(isset($aktif)){
			
			$sql .= "AND a.aktif = ? ";
			$sql .= "GROUP BY a.kode ";
			$rs = $this->db->query($sql,array('PROCESSING','COMPLETE',$aktif));	
					
		}else{

			$sql .= "GROUP BY a.kode ";
			$rs = $this->db->query($sql,array('PROCESSING','COMPLETE'));				   		
		}

		return $rs->num_rows();		
	}

	function get_penjualan_per_hari($aktif=NULL){
		$sql	= 	"SELECT a.*,date(c.created_at) as tgl,SUM(b.quantity) as jml_jual,".
					"		IFNULL(d.average_rating ,0) as average_rating,".
					"		SUM(b.quantity * b.harga_satuan) as hasil_penjualan ".
				 	"FROM tbl_produk a ".
				 	"LEFT JOIN tbl_trans_details b ".
				 	"ON a.kode = b.kode_produk ".
					"LEFT JOIN tbl_trans_header c ".
					"ON c.id = b.id_trans ".
					"LEFT JOIN (SELECT kode_produk,FLOOR(AVG(rating)) as average_rating  ".
			  		"			FROM tbl_review ".
			  		"			GROUP BY kode_produk) d ".
					"ON a.kode = d.kode_produk ".
					"WHERE ( c.`status`  = ? OR c.`status` = ? ) ";
					

		if(isset($aktif)){

			$sql .= "AND a.aktif = ? ";
			$sql .= "GROUP BY b.kode_produk,date(c.created_at) ".
					"ORDER BY $this->sort $this->order ".
					"LIMIT $this->offset,$this->limit";

			$rs = $this->db->query($sql,array('PROCESSING','COMPLETE',$aktif));		

		}else{

			$sql .= "GROUP BY b.kode_produk,date(c.created_at) ".
					"ORDER BY $this->sort $this->order ".
					"LIMIT $this->offset,$this->limit";

			$rs = $this->db->query($sql,array('PROCESSING','COMPLETE'));		

		}			
			
		return $rs;	
	}

	function num_page_penjualan_per_hari($aktif=NULL){

		$sql	= 	"SELECT * ".					
				 	"FROM tbl_produk a ".
				 	"LEFT JOIN tbl_trans_details b ".
				 	"ON a.kode = b.kode_produk ".
					"LEFT JOIN tbl_trans_header c ".
					"ON c.id = b.id_trans ".
					"LEFT JOIN (SELECT kode_produk,FLOOR(AVG(rating)) as average_rating  ".
			  		"			FROM tbl_review ".
			  		"			GROUP BY kode_produk) d ".
					"ON a.kode = d.kode_produk ".
					"WHERE ( c.`status`  = ? OR c.`status` = ? ) ";

		if(isset($aktif)){
			
			$sql .= "AND a.aktif = ? ";
			$sql .= "GROUP BY a.kode,date(c.created_at) ";
			$rs = $this->db->query($sql,array('PROCESSING','COMPLETE',$aktif));	
					
		}else{

			$sql .= "GROUP BY a.kode,date(c.created_at) ";
			$rs = $this->db->query($sql,array('PROCESSING','COMPLETE'));				   		
		}

		return $rs->num_rows();		
	}

/**************************************************************************************/	


	function get_hasil_penjualan($tgl){

		$sql = 	"SELECT DATE(c.created_at) AS tgl, SUM(b.quantity * b.harga_satuan) AS hasil_penjualan ".
				"FROM tbl_trans_details b ".
				"LEFT JOIN tbl_trans_header c ON c.id = b.id_trans ".
				"WHERE (c.`status` = 'PROCESSING' OR c.`status` = 'COMPLETE') AND DATE(c.created_at) = '$tgl' ".
				"GROUP BY DATE(c.created_at) ";
		$rs = $this->db->query($sql);
		return $rs->row()->hasil_penjualan;
	}

	function get_histori_where($id_user){

		$sql = 	"SELECT a.*,SUM(b.quantity) as quantity,".
				"		SUM(b.quantity * b.harga_satuan) as total_trans ".
				"FROM tbl_trans_header a ".
				"LEFT JOIN tbl_trans_details b ".
				"ON a.id = b.id_trans ".				
				"WHERE a.id_user = $id_user ".
				"GROUP BY a.id ".
			   	"ORDER BY $this->sort $this->order ".
			   	"LIMIT $this->offset,$this->limit"; 

		$rs = $this->db->query($sql);		
		return $rs;		   

	}

	function get_num_histori_where($id_user){

		$sql = 	"SELECT * ".
				"FROM tbl_trans_header a ".
				"LEFT JOIN tbl_trans_details b ".
				"ON a.id = b.id_trans ".				
				"WHERE a.id_user = $id_user ".
				"GROUP BY a.id ";
			   	

		$rs = $this->db->query($sql);		
		return $rs->num_rows();		   
	}
	
	function check_trans($id_trans){
		$sql = "SELECT * FROM tbl_trans_header WHERE id=$id_trans";
		$rs = $this->db->query($sql);
		return $rs->num_rows();
	}

	function check_already_confirm($id_trans){
		$sql = "SELECT * FROM tbl_trans_header WHERE id=$id_trans AND status='PAYMENT_CONFIRMED'";
		$rs = $this->db->query($sql);
		return $rs->num_rows();
	}

	function update($id,$data){
		$this->db->where('id',$id);
		$this->db->update('tbl_trans_header',$data);
	}
	
	function insert($data){
		$this->db->trans_start();
		$this->db->insert('tbl_trans_header',$data);		
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;

	}

	function get_where($id_trans){

		$sql = "SELECT * FROM tbl_trans_header WHERE id= $id_trans";
		$rs = $this->db->query($sql);

		return $rs;

	}
	//mendapatkan id terakhir tbl_trans_header untuk 
	

}