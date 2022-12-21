<?php

class Produk_Viewed_Model extends CI_Model{
	

	function __construct(){

		parent::__construct();

	}

	
	function viewing($ip,$slug,$viewed_at){
		$query = $this->db->query(
            "SELECT * FROM tbl_produk_viewed ".            
            "WHERE ip='$ip' AND slug='$slug' AND viewed_at='$viewed_at'");


		if($query->num_rows() == 0){

			$data = array(
				'slug' => $slug,
				'ip' =>$ip,
				'viewed_at' =>$viewed_at
				);

			$this->db->insert('tbl_produk_viewed',$data);
		}
		
	}

	function get_most_viewed($aktif=NULL){
		$sql = "SELECT a.slug,a.kode,a.nama,count(b.ip) as view_count ".
			   "FROM tbl_produk a ".
			   "RIGHT JOIN tbl_produk_viewed b ".
			   "ON a.slug = b.slug ";
			   

		if(isset($aktif)){

			$sql .= "AND a.aktif = ? ";
			$sql .= "GROUP BY b.slug ".
					"ORDER BY $this->sort $this->order ".
					"LIMIT $this->offset,$this->limit";

			$rs = $this->db->query($sql,array('PROCESSING','COMPLETE',$aktif));		

		}else{

			$sql .= "GROUP BY b.slug ".
					"ORDER BY $this->sort $this->order ".
					"LIMIT $this->offset,$this->limit";

			$rs = $this->db->query($sql,array('PROCESSING','COMPLETE'));		

		}			
			
		return $rs;		   

	}
}
