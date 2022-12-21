<?php

class Member extends CI_Controller{

	function __construct(){

		parent::__construct();

		if($this->session->userdata('sudah_login') != 1) {
			redirect(base_url(),'refresh');
		}

		$this->load->model(array(			
				'rangeharga_model',
				'produk_model',
				'gambar_produk_model',
				'user_model',
				'trans_header_model',
				'trans_details_model',
				'trans_konfirmasi_model')
		);
	}

	function _generate_view($data){

		//best-seller
		$this->trans_header_model->limit = 12;
		$this->trans_header_model->offset = 0;
		$this->trans_header_model->sort = 'jml_jual';
		$this->trans_header_model->order = 'DESC';
		$data['best_seller_product'] = $this->trans_header_model->get_penjualan();

		$data['menu_cowok'] = $this->db->get_where('tbl_kategori',array('gender' => 'L'));
		$data['menu_cewek'] = $this->db->get_where('tbl_kategori',array('gender' => 'P'));
		$data['menu_rangeharga'] = $this->rangeharga_model->get();


		$this->load->view('view_index',$data);
	}

	function index(){

		// echo 'lol';
		// $data = array();
		// $data['page_name'] = 'beranda';
		// $data['page_title'] =  'Beranda - Member';

		// $this->_generate_view($data);

		$this->histori_transaksi();


	}

	function do_konfirmasi(){

		$this->form_validation->set_rules('id_trans', 'ID Transaksi', 'xss_clean|required');
		$this->form_validation->set_rules('tgl_setor', 'Tanggal Setor', 'xss_clean|required');
		$this->form_validation->set_rules('bank', 'Bank', 'xss_clean|required');
		$this->form_validation->set_rules('metode_bayar', 'metode_bayar', 'xss_clean|required');
		$this->form_validation->set_rules('jml_transfer', 'Jumlah Transfer', 'xss_clean|required|numeric');
		$this->form_validation->set_rules('nama_penyetor', 'Nama Penyetor', 'xss_clean|required');
		$this->form_validation->set_rules('metode_kirim', 'Motode Kirim', 'xss_clean|required');
		$this->form_validation->set_rules('pesan', 'Pesan', 'xss_clean|strip_tags');

		if ($this->form_validation->run() == TRUE)
        {
        // 	$data['id_trans'] = intval( $this->input->post('id_trans') );
        // 	$data['tgl_setor'] = $this->input->post('tgl_setor');

        // 	$data['metode_bayar'] = $this->input->post('metode_bayar');
        // 	$data['nama_penyetor'] = $this->input->post('nama_penyetor');
        // 	$data['bank'] = $this->input->post('bank');
        // 	$data['jml_transfer'] = $this->input->post('jml_transfer');
        // 	$data['metode_kirim'] = $this->input->post('metode_kirim');
        // 	$data['pesan'] = $this->input->post('pesan');


        // 	$this->trans_konfirmasi->insert($data);
        // 	//update header trans
        // 	$data_update = array('status'=> 'PAYMENT_CONFIRMED');
        // 	$this->trans_header_model->update($data['id_trans'],$data_update);
        // 	echo 'OK';

        // }else{

        // 	echo 'Error:'.validation_errors();
        // }

        	$check_trans = $this->trans_header_model->check_trans(intval( $this->input->post('id_trans')));
        	if($check_trans == 0){
        		echo 'ERROR: Nomor Transaksi ini tidak ditemukan!';

        	}else{

        		$check_already_confirm = $this->trans_header_model->check_already_confirm(intval( $this->input->post('id_trans')));

        		if($check_already_confirm != 0){
	        		echo 'ERROR: Nomor Transaksi ini sudah melakukan konfirmasi!';
	        	}else{
	        		$data['id_trans'] = intval( $this->input->post('id_trans') );
		        	$data['tgl_setor'] = $this->input->post('tgl_setor');

		        	$data['metode_bayar'] = $this->input->post('metode_bayar');
		        	$data['nama_penyetor'] = $this->input->post('nama_penyetor');
		        	$data['bank'] = $this->input->post('bank');
		        	$data['jml_transfer'] = $this->input->post('jml_transfer');
		        	$data['metode_kirim'] = $this->input->post('metode_kirim');
		        	$data['pesan'] = $this->input->post('pesan');


		        	$this->trans_konfirmasi_model->insert($data);
		        	//update header trans
		        	$data_update = array('status'=> 'PAYMENT_CONFIRMED');
		        	$this->trans_header_model->update($data['id_trans'],$data_update);
		        	echo 'OK';
	        	}
        	}

        }else{

        	echo 'Error:'.validation_errors();
        }
	}

	//TODO: jika $trans_id bukan milik user, maka -> home
	// $route['member/konfirmasi/(:num)'] = 'member/konfirmasi/$1';
	function konfirmasi($trans_id=NULL){

		$data = array();
		// if(is_null($trans_id)){
		// 	$data['page_name'] = 'member/general_konfirmasi';
		// }else{
		$data['page_name'] = 'member/konfirmasi';
		$data['trans_id'] = $trans_id;
		// }

		$data['page_title'] =  'Konfirmasi - Member';
		$this->_generate_view($data);
	}

	//$route['member-histori-transaksi'] = 'member/histori_transaksi';
	function histori_transaksi(){

		$id_member = $this->session->userdata('id');

		$data = array();

		$data['page_title'] =  'Beranda - Member';

		$url = base_url() . 'member/trans/histori/';
		$res = $this->trans_header_model->get_num_histori_where($id_member);
		$per_page = 7;
		$config = paginate($url,$res,$per_page,4);
		$this->pagination->initialize($config);

		$this->trans_header_model->limit = $per_page;
		if($this->uri->segment(4) == TRUE){

			$this->trans_header_model->offset = $this->uri->segment(4);

		}else{

			$this->trans_header_model->offset = 0;

		}

		// echo $this->pagination->create_links();
		// return;

		$data['pagination'] = $this->pagination->create_links();

		$this->trans_header_model->sort = 'created_at';
		$this->trans_header_model->order = 'DESC';

		$data['histori_transaksi'] = $this->trans_header_model->get_histori_where($id_member);

		if ($this->input->post('ajax')) {
			$this->load->view('member/histori_transaksi_ajax',$data);
		}else{
			$data['page_name'] = 'member/histori_transaksi';
			$this->_generate_view($data);
		}
	}

	// $route['member/trans/detail/(:num)'] = 'member/detail_transaksi/$1';
	function detail_transaksi($trans_id){

		$data = array();
		$data['page_name'] = 'member/transaksi_details';
		$data['page_title'] = 'Details Transaksi';
		$data['trans_detail'] = $this->trans_details_model->get_details($trans_id);

		$this->_generate_view($data);

	}


	function profile(){
		$data = array();
		$data['page_title'] = 'Member Profile';

		if(! empty($_POST)){


			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'xss_clean|required|min_length[6]');
			$this->form_validation->set_rules('telp', 'Nomor Telephon', 'xss_clean|required');
			$this->form_validation->set_rules('propinsi', 'Propinsi', 'xss_clean|required');
			$this->form_validation->set_rules('kota', 'Kota', 'xss_clean|required');
			$this->form_validation->set_rules('kode_pos', 'Kode POS', 'xss_clean|required|numeric');
			$this->form_validation->set_rules('alamat', 'Alamat', 'xss_clean|required');

			if ($this->form_validation->run() == TRUE)
	        {
	        	$data_update['nama_lengkap'] = $this->input->post('nama_lengkap');
	        	$data_update['telp'] = $this->input->post('telp');
	        	$data_update['propinsi'] = $this->input->post('propinsi');
	        	$data_update['kota'] = $this->input->post('kota');
	        	$data_update['kode_pos'] = $this->input->post('kode_pos');
	        	$data_update['alamat'] = $this->input->post('alamat');


	        	$user_id = $this->session->userdata('id');
	        	$this->user_model->update($user_id,$data_update);
	        	echo 'OK';

	        }else{

	        	echo 'Error:'.validation_errors();
	        }

		}else{

			$data['page_name'] = 'member/profile';
			$data['member_info'] = $this->user_model->get_where($this->session->userdata('id'));

			$this->_generate_view($data);

		}
	}

	function password(){
		$data = array();
		$data['page_title'] = 'Member Password';

		if(! empty($_POST)){

			$this->form_validation->set_rules('old_pass', 'Password lama', 'xss_clean|required');
	        $this->form_validation->set_rules('new_pass', 'Password baru', 'xss_clean|required');
	        $this->form_validation->set_rules('repeat_pass', 'Repeat Password', 'xss_clean|required|matches[new_pass]');

	        if ($this->form_validation->run() == TRUE)
	        {
				$old_pass = $this->input->post('old_pass');
	            $new_pass = $this->input->post('new_pass');

	            $ret =  $this->user_model->change_password($old_pass, $new_pass);
				$msg= ($ret == TRUE) ? 'OK' : 'ERROR: Password lama salah!';

	        }else{
	            $msg = 'ERROR:'.validation_errors();
	        }

	        echo $msg;

		}else{

			$data['page_name'] = 'member/password';
			$this->_generate_view($data);

		}
	}

	//$route['member/trans/batal/(:num)'] 'member/batal_transaksi/$1';
	function batal_transaksi($id_trans){

		$data = array('status'=> 'CANCELED');
		$this->trans_header_model->update($id_trans,$data);
		echo 'OK';
	}

	// $route['member/checkout'] = 'member/checkout/member';
	function checkout(){
		$data = array();

		if(!empty($_POST)){

			$this->form_validation->set_rules('nama', 'Nama', 'xss_clean|required|min_length[6]');
			$this->form_validation->set_rules('email', 'Email', 'xss_clean|required|valid_email');
			$this->form_validation->set_rules('telp', 'Nomor Telephon', 'xss_clean|required');
			$this->form_validation->set_rules('pesan', 'Pesan', 'xss_clean|strip_tags');

			$this->form_validation->set_rules('propinsi', 'Propinsi', 'xss_clean|required');
			$this->form_validation->set_rules('kota', 'Kota', 'xss_clean|required');
			$this->form_validation->set_rules('kode_pos', 'Kode POS', 'xss_clean|required|numeric');
			$this->form_validation->set_rules('alamat', 'Alamat', 'xss_clean|required|strip_tags');

			if ($this->form_validation->run() == TRUE)
	        {
	        	$id_user = $this->session->userdata('id');
	        	$data['id_user'] = $id_user;
	        	$data['nama'] = $this->input->post('nama');
	        	$data['email'] = $this->input->post('email');
	        	$data['telp'] = $this->input->post('telp');
	        	$data['pesan'] = $this->input->post('pesan');

	        	$data['propinsi'] = $this->input->post('propinsi');
	        	$data['kota'] = $this->input->post('kota');
	        	$data['kode_pos'] = $this->input->post('kode_pos');
	        	$data['alamat'] = $this->input->post('alamat');
	        	$date_now = date('Y-m-d H:i:s');
	        	$data['created_at'] = $date_now;

	        	//insert header
	        	$last_inserted_id = $this->trans_header_model->insert($data);
	        	//insert details
	        	$this->trans_details_model->insert($last_inserted_id);
	        	//finally, destroy cart
	        	$this->cart->destroy();
	        	echo $last_inserted_id;

	        }else{

	        	echo 'Error:'.validation_errors();
	        }



		}else{

			$data['page_name'] = 'member/checkout';
			$data['page_title'] = 'Member Checkout';

			$user_id = $this->session->userdata('id');
			$data['user_profile'] = $this->user_model->get_where($user_id);

			$this->_generate_view($data);
		}
	}

	function checkout_details($id_trans = NULL){

		$data = array();
		$data['page_title'] = 'Checkout Details';
		$data['page_name'] = 'member/details_checkout';

		$data['details_checkout'] = $this->trans_header_model->get_where($id_trans);
		$data['trans_detail'] = $this->trans_details_model->get_details($id_trans);

		//best-seller
		$this->trans_header_model->limit = 6;
		$this->trans_header_model->offset = 0;
		$this->trans_header_model->sort = 'jml_jual';
		$this->trans_header_model->order = 'DESC';
		$data['best_seller_product'] = $this->trans_header_model->get_penjualan();

		$this->_generate_view($data);
	}


}
