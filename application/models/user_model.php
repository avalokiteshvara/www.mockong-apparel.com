<?php

class User_Model extends CI_Model {

	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __construct(){

		parent::__construct();

	}


	function login($data){

		$query = $this->db->get_where('tbl_user', array(
            'email' => $data['email'],
            'password' => md5($data['password']),
            'aktif' => 'Y',
            'status' => 'MEMBER'
        ));

        if ($query->num_rows() > 0)
        {
        	$row = $query->row();
        	$this->session->set_userdata('sudah_login', 1);
        	$this->session->set_userdata('id', $row->id);
        	$this->session->set_userdata('nama_lengkap', $row->nama_lengkap);
        	$this->session->set_userdata('email', $row->email);
        	$this->session->set_userdata('status', $row->status);

        	return 'Login Sukses';
        }else{

        	return 'Email atau Password Salah!';

        }

	}
/*ADMIN LOGIN*/
	function admin_login($data){

		$query = $this->db->get_where('tbl_user', array(
            'email' => $data['email'],
            'password' => md5($data['password']),
            'aktif' => 'Y',
            'status' => 'ADMIN'
        ));

        if ($query->num_rows() > 0)
        {
        	$row = $query->row();
        	$this->session->set_userdata('sudah_login', 1);
        	$this->session->set_userdata('id', $row->id);
        	$this->session->set_userdata('nama_lengkap', $row->nama_lengkap);
        	$this->session->set_userdata('email', $row->email);
        	$this->session->set_userdata('status', $row->status);

        	return 'Login Sukses';
        }else{

        	return 'Email atau Password Salah!';

        }

	}
/*END ADMIN LOGIN*/

	function get(){		

		$sql = "SELECT * FROM tbl_user ".
			   "ORDER BY $this->sort $this->order ".
			   "LIMIT $this->offset,$this->limit";
		$rs = $this->db->query($sql);					

		return $rs;
	}

	function get_num(){
		$sql = 	"SELECT * ".
				"FROM tbl_user ";				
		$rs = $this->db->query($sql);					

		return $rs->num_rows();	
	}

	function get_where($id){

		$sql = "SELECT * FROM tbl_user WHERE id=$id";
		$rs = $this->db->query($sql);

		return $rs;
	}

	function insert($data){

		$this->db->insert('tbl_user',$data);
		
	}

	function update($id,$data){
		$this->db->where('id',$id);
		$this->db->update('tbl_user',$data);
	}

	function change_password($old_pass,$new_pass){
        
        $this->db->where('password',md5($old_pass));
        $this->db->where('id', $this->session->userdata('id'));
        $query = $this->db->get('tbl_user');
        
        if ($query->num_rows() > 0){
            $this->db->flush_cache();     
			
            $data['password'] = md5($new_pass);
            $this->db->where('id', $this->session->userdata('id'));
            $this->db->update('tbl_user', $data);
            
            return TRUE;
        }else{
            return FALSE;
        }
    }

}