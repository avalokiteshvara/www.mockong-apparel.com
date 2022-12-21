<?php

class Stok_Model extends CI_Model {
	
	public $limit;
	public $offset;
	public $sort;
	public $order;
	
	function __construct(){

		parent::__construct();

	}


	function get($aktif=NULL){

		$sql = 	"SELECT a.kode,a.nama,a.slug,b.barang_masuk as barang_masuk,IF(e.barang_keluar is not null,e.barang_keluar,0) as barang_keluar, (b.barang_masuk - IF(e.barang_keluar is not null,e.barang_keluar,0)) as stok ".
				"FROM tbl_produk a ".
				"LEFT JOIN (SELECT kode_produk,sum(jumlah) as barang_masuk ".
			  	"			FROM tbl_barang_masuk_details ".
			  	"			GROUP BY kode_produk ".	
				"			) b ".
				"ON a.kode = b.kode_produk ".
				"LEFT JOIN (SELECT c.kode_produk ,sum(c.quantity) as barang_keluar ".
			  	"			FROM tbl_trans_details c ".
			  	"			LEFT JOIN tbl_trans_header d ".
			  	"			ON c.id_trans = d.id ".
			  	"			WHERE d.`status` = 'PROCESSING' or d.`status` = 'COMPLETE' ".
			  	"			GROUP BY c.kode_produk ".			  	
			  	"			) e ".
				"ON a.kode = e.kode_produk ";	


		if(isset($aktif)){

			$sql .= "WHERE a.aktif = ? ".
					"GROUP BY a.kode ".
					"ORDER BY $this->sort $this->order ".
					"LIMIT $this->offset,$this->limit";
			$rs = $this->db->query($sql,array($aktif));		

		}else{
			$sql .=	"GROUP BY a.kode ".
					"ORDER BY $this->sort $this->order ".
					"LIMIT $this->offset,$this->limit";
			$rs = $this->db->query($sql);				
		}	

		$rs = $this->db->query($sql);
		return $rs;
	}

	function get_num($aktif=NULL){

		$sql = "SELECT * FROM tbl_produk";

		if(isset($aktif)){
			
			$sql .= "WHERE aktif = ? ";
			$rs = $this->db->query($sql,array($aktif));		

		}else{

			$rs = $this->db->query($sql);				

		}

		return $rs->num_rows();
	}

	function get_where($slug){
		
		$sql = 	"SELECT a.kode,a.nama,a.slug,b.barang_masuk as barang_masuk,IF(e.barang_keluar is not null,e.barang_keluar,0) as barang_keluar, (b.barang_masuk - IF(e.barang_keluar is not null,e.barang_keluar,0)) as stok ".
				"FROM tbl_produk a ".
				"LEFT JOIN (SELECT kode_produk,sum(jumlah) as barang_masuk ".
			  	"			FROM tbl_barang_masuk_details ".
			  	"			GROUP BY kode_produk ".	
				"			) b ".
				"ON a.kode = b.kode_produk ".
				"LEFT JOIN (SELECT c.kode_produk ,sum(c.quantity) as barang_keluar ".
			  	"			FROM tbl_trans_details c ".
			  	"			LEFT JOIN tbl_trans_header d ".
			  	"			ON c.id_trans = d.id ".
			  	"			WHERE d.`status` = 'PROCESSING' or d.`status` = 'COMPLETE' ".
			  	"			GROUP BY c.kode_produk ".			  	
			  	"			) e ".
				"ON a.kode = e.kode_produk ".
				"WHERE a.slug = '$slug' ".			  	
				"GROUP BY a.kode";

		$rs = $this->db->query($sql);
		return $rs;
	}


}