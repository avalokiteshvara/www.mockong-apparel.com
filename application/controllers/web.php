<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Web extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
                'rangeharga_model',
                'data_model',
                'produk_model',
                'gambar_produk_model',
                'review_model',
                'user_model',
                'trans_header_model',
                'trans_details_model',
                'trans_konfirmasi_model',
                'produk_viewed_model', 'stok_model', ));
    }

    // Function to get the client ip address
    public function _get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $ipaddress = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ipaddress = getenv('HTTP_FORWARDED');
        } elseif (getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        } else {
            $ipaddress = 'UNKNOWN';
        }

        return $ipaddress;
    }

    public function _generate_view($data)
    {
        $data['menu_cowok'] = $this->db->get_where('tbl_kategori', array('gender' => 'L'));
        $data['menu_cewek'] = $this->db->get_where('tbl_kategori', array('gender' => 'P'));
        $data['menu_rangeharga'] = $this->rangeharga_model->get();

        $this->load->view('view_index', $data);
    }

/*index*/
    public function index()
    {
        $data = array();
        $data['page_title'] = 'Home';
        $data['page_name'] = 'home';
        // $data['welcome_greets'] = $this->data_model->get_where('kode','welcome_greets');

        //slide
        $this->produk_model->limit = 5;
        $this->produk_model->offset = 0;
        $this->produk_model->sort = '';
        $this->produk_model->order = 'RAND()';
        $data['slides'] = $this->produk_model->get();

        //latest product
        $this->produk_model->limit = 6;
        $this->produk_model->offset = 0;
        $this->produk_model->sort = 'tgl_update';
        $this->produk_model->order = 'DESC';
        $data['latest_products'] = $this->produk_model->get_terbaru();

        //best-seller
        $this->trans_header_model->limit = 6;
        $this->trans_header_model->offset = 0;
        $this->trans_header_model->sort = 'jml_jual';
        $this->trans_header_model->order = 'DESC';
        $data['best_seller_product'] = $this->trans_header_model->get_penjualan();

        $this->_generate_view($data);
    }
/*end index*/

    // $route['customer-login'] = 'web/customer_login';
    public function member_login()
    {
        $data = array();
        $data['page_title'] = 'Customer Login';

        if (!empty($_POST)) {
            //$route['beranda'] = 'member/beranda';

            if ($this->session->userdata('sudah_login') == 1) {
                redirect(base_url().'member-beranda');
            }

            $this->form_validation->set_rules('email', 'Email', 'xss_clean|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'xss_clean|required');

            if ($this->form_validation->run() == true) {
                $data['email'] = $this->input->post('email');
                $data['password'] = $this->input->post('password');

                $result = $this->user_model->login($data);

                echo $result;

                return;
            } else {
                echo 'ERROR:'.validation_errors();

                return;
            }
        }

        $data['page_name'] = 'member_login';
        $this->_generate_view($data);
    }

    public function member_logout()
    {
        $this->session->unset_userdata('sudah_login');
        redirect(base_url(), 'refresh');
    }

    public function do_signup()
    {

          // username,
          // password,
          // password_confirm,
          // nama_lengkap,
          // email,
          // alamat,
          // telp,
          // propinsi,
          // kota,
          // kode_pos


        // $this->form_validation->set_rules('username', 'User Name', 'xss_clean|required|min_length[6]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'xss_clean|required|min_length[6]');
        $this->form_validation->set_rules('email', 'Email', 'xss_clean|required|valid_email|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('password', 'Password', 'xss_clean|required|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirm', 'xss_clean|required|matches[password]|min_length[6]');
        $this->form_validation->set_rules('telp', 'Nomor Telephon', 'xss_clean|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'xss_clean|required');
        $this->form_validation->set_rules('propinsi', 'Propinsi', 'xss_clean|required');
        $this->form_validation->set_rules('kota', 'Kota', 'xss_clean|required');
        $this->form_validation->set_rules('kode_pos', 'Kode POS', 'xss_clean|required|numeric');

        if ($this->form_validation->run() == true) {
            $data['nama_lengkap'] = $this->input->post('nama_lengkap');
            $data['password'] = md5($this->input->post('password'));
            $data['email'] = $this->input->post('email');
            $data['alamat'] = $this->input->post('alamat');
            $data['telp'] = $this->input->post('telp');
            $data['propinsi'] = $this->input->post('propinsi');
            $data['kota'] = $this->input->post('kota');
            $data['kode_pos'] = $this->input->post('kode_pos');
            $data['kode_aktivasi'] = generateRandomString();

            $this->user_model->insert($data);
            echo 'OK';
        } else {
            echo 'Error:'.validation_errors();
        }
    }

    public function signup()
    {

        // echo $this->input->post('register_grup');
        $tipe_sign = $this->input->post('register_grup');

        if (empty($tipe_sign)) {
            $tipe_sign = 'register';
        }

        if ($tipe_sign === 'register') {
            $data = array();
            $data['page_title'] = 'Signup';
            $data['page_name'] = 'signup';

            $this->_generate_view($data);
        } else {
            redirect(base_url().'checkout', 'refresh');
        }
    }

    public function checkout()
    {
        $data = array();

        if (!empty($_POST)) {
            $this->form_validation->set_rules('nama', 'Nama', 'xss_clean|required|min_length[6]');
            $this->form_validation->set_rules('email', 'Email', 'xss_clean|required|valid_email');
            $this->form_validation->set_rules('telp', 'Nomor Telephon', 'xss_clean|required');
            $this->form_validation->set_rules('pesan', 'Pesan', 'xss_clean|strip_tags');

            $this->form_validation->set_rules('propinsi', 'Propinsi', 'xss_clean|required');
            $this->form_validation->set_rules('kota', 'Kota', 'xss_clean|required');
            $this->form_validation->set_rules('kode_pos', 'Kode POS', 'xss_clean|required|numeric');
            $this->form_validation->set_rules('alamat', 'Alamat', 'xss_clean|required|strip_tags');

            if ($this->form_validation->run() == true) {
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
            } else {
                echo 'Error:'.validation_errors();
            }
        } else {
            $data['page_name'] = 'checkout';
            $data['page_title'] = 'Guest Checkout';

            $this->_generate_view($data);
        }
    }

    // $route['checkout/details/(:num)'] = 'web/checkout_details/$1';

    public function checkout_details($id_trans = null)
    {
        $data = array();
        $data['page_title'] = 'Checkout Details';
        $data['page_name'] = 'details_checkout';

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

/*produk details*/
    public function produk_details($slug)
    {
        // echo $slug;

        $data = array();

        $ip = $this->_get_client_ip();
        $current_date = date('Y-m-d');

        $this->produk_viewed_model->viewing($ip, $slug, $current_date);

        $data['page_title'] = 'Produk > '.ucwords(str_replace('-', ' ', $slug));

        //get_details
        $data['stok'] = $this->stok_model->get_where($slug)->row()->stok;
        $data['data_produk'] = $this->produk_model->get_details($slug);
        $data['breadcrumbs'] = 'Produk > '.ucwords(str_replace('-', ' ', $slug));

        //best-seller
        $this->trans_header_model->limit = 6;
        $this->trans_header_model->offset = 0;
        $this->trans_header_model->sort = 'jml_jual';
        $this->trans_header_model->order = 'DESC';
        $data['best_seller_product'] = $this->trans_header_model->get_penjualan();

        //random produk
        $this->produk_model->limit = 4;
        $this->produk_model->offset = 0;
        $this->produk_model->sort = 'RAND()';
        $this->produk_model->order = '';
        $data['random_produk'] = $this->produk_model->get_random($slug);

        //images
        $this->gambar_produk_model->limit = 99;
        $this->gambar_produk_model->offset = 0;
        $this->gambar_produk_model->sort = 'nama';
        $this->gambar_produk_model->order = 'ASC';
        $data['images'] = $this->gambar_produk_model->get($slug);

        //review
        $url = base_url().'produk/'.$slug.'/';
        $res = $this->review_model->get_num_where($slug);
        $data['tot_review'] = $res;
        $per_page = 3;
        $config = paginate($url, $res, $per_page, 3);
        $this->pagination->initialize($config);

        $this->review_model->limit = $per_page;
        if ($this->uri->segment(3) == true) {
            $this->review_model->offset = $this->uri->segment(3);
        } else {
            $this->review_model->offset = 0;
        }

        $this->review_model->sort = 'update_at';
        $this->review_model->order = 'DESC';

        $data['reviews'] = $this->review_model->get_where($slug);

        if ($this->input->post('ajax')) {
            $this->load->view('review_ajax', $data);
        } else {
            $data['page_name'] = 'produk_details';
            $this->_generate_view($data);
        }
    }
/*end produk details*/

    public function range($slug)
    {

        //lets set default session values if not set
        if (!$this->session->userdata('view_tipe')) {
            $this->session->set_userdata('view_tipe', 'grid');
        }

        if (!$this->session->userdata('sort')) {
            $this->session->set_userdata('sort', 'nama');
        }

        if (!$this->session->userdata('order')) {
            $this->session->set_userdata('order', 'ASC');
        }

        $vt = $this->session->userdata('view_tipe');
        $sort = $this->session->userdata('sort');
        $order = $this->session->userdata('order');

        $data = array();

        $url = base_url().'range/'.$slug.'/';

        $range = explode('-', $slug);

        $min_range = $range[0];
        $max_range = $range[1];

        $res = $this->produk_model->num_page_get_range($min_range, $max_range);

        //grid = 12
        //list = 6

        $per_page = ($vt === 'grid') ? 12 : 6;

        $config = paginate($url, $res, $per_page, 2);
        $this->pagination->initialize($config);

        $this->produk_model->limit = $per_page;
        if ($this->uri->segment(3) == true) {
            $this->produk_model->offset = $this->uri->segment(3);
        } else {
            $this->produk_model->offset = 0;
        }

        $this->produk_model->sort = $sort;
        $this->produk_model->order = $order;

        $data['products'] = $this->produk_model->get_based_range($min_range, $max_range);
        $data['breadcrumbs'] = 'Range Harga > '.ucwords(str_replace('-', ' s/d ', $slug));

        //best-seller
        $this->trans_header_model->limit = 12;
        $this->trans_header_model->offset = 0;
        $this->trans_header_model->sort = 'jml_jual';
        $this->trans_header_model->order = 'DESC';
        $data['best_seller_product'] = $this->trans_header_model->get_penjualan();
        $data['sort_order'] = $this->session->userdata('sort-order');

        if ($vt === 'grid') {
            if ($this->input->post('ajax')) {
                $data['page_title'] = 'Range - '.ucwords(str_replace('-', ' s/d ', $slug));
                $this->load->view('produk_grid_ajax', $data);
            } else {
                $data['page_name'] = 'produk_grid';
                $data['page_title'] = 'Range - '.ucwords(str_replace('-', ' s/d ', $slug));
                $this->_generate_view($data);
            }
        } else {
            if ($this->input->post('ajax')) {
                $data['page_title'] = 'Range - '.ucwords(str_replace('-', ' s/d ', $slug));
                $this->load->view('produk_list_ajax', $data);
            } else {
                $data['page_name'] = 'produk_list';
                $data['page_title'] = 'Range - '.ucwords(str_replace('-', ' s/d ', $slug));
                $this->_generate_view($data);
            }
        }
    }

    //bahan,jenis,motif
    public function show_based_on($slug)
    {

        //lets set default session values if not set
        if (!$this->session->userdata('view_tipe')) {
            $this->session->set_userdata('view_tipe', 'grid');
        }

        if (!$this->session->userdata('sort')) {
            $this->session->set_userdata('sort', 'nama');
        }

        if (!$this->session->userdata('order')) {
            $this->session->set_userdata('order', 'ASC');
        }

        $vt = $this->session->userdata('view_tipe');
        $sort = $this->session->userdata('sort');
        $order = $this->session->userdata('order');

        $data = array();

        $url = base_url().'kategori/'.$slug.'/';
        $res = $this->produk_model->num_page_get_based_on($slug);

        //grid = 12
        //list = 6

        $per_page = ($vt === 'grid') ? 12 : 6;

        $config = paginate($url, $res, $per_page, 3);
        $this->pagination->initialize($config);

        $this->produk_model->limit = $per_page;
        if ($this->uri->segment(3) == true) {
            $this->produk_model->offset = $this->uri->segment(3);
        } else {
            $this->produk_model->offset = 0;
        }

        $this->produk_model->sort = $sort;
        $this->produk_model->order = $order;

        $data['products'] = $this->produk_model->get_based_on($slug);
        $data['breadcrumbs'] = 'Kategori > '.ucwords(str_replace('-', ' ', $slug));

        //best-seller
        $this->trans_header_model->limit = 12;
        $this->trans_header_model->offset = 0;
        $this->trans_header_model->sort = 'jml_jual';
        $this->trans_header_model->order = 'DESC';
        $data['best_seller_product'] = $this->trans_header_model->get_penjualan();
        $data['sort_order'] = $this->session->userdata('sort-order');

        if ($vt === 'grid') {
            if ($this->input->post('ajax')) {
                $data['page_title'] = ucwords(str_replace('-', ' ', $slug));
                $this->load->view('produk_grid_ajax', $data);
            } else {
                $data['page_name'] = 'produk_grid';
                $data['page_title'] = ucwords(str_replace('-', ' ', $slug));
                $this->_generate_view($data);
            }
        } else {
            if ($this->input->post('ajax')) {
                $data['page_title'] = ucwords(str_replace('-', ' ', $slug));
                $this->load->view('produk_list_ajax', $data);
            } else {
                $data['page_name'] = 'produk_list';
                $data['page_title'] = ucwords(str_replace('-', ' ', $slug));
                $this->_generate_view($data);
            }
        }
    }

    public function grid_view()
    {
        $this->session->set_userdata('view_tipe', 'grid');
        echo 'OK';
    }

    public function list_view()
    {
        $this->session->set_userdata('view_tipe', 'list');
        echo 'OK';
    }

    public function sort($sort_by)
    {
        switch ($sort_by) {
            case 'nama-asc':
                $this->session->set_userdata('sort', 'nama');
                $this->session->set_userdata('order', 'ASC');
                $this->session->set_userdata('sort-order', 'nama-asc');
                break;

            case 'nama-desc':
                $this->session->set_userdata('sort', 'nama');
                $this->session->set_userdata('order', 'DESC');
                $this->session->set_userdata('sort-order', 'nama-desc');
                break;

            case 'harga-asc':
                $this->session->set_userdata('sort', 'harga');
                $this->session->set_userdata('order', 'ASC');
                $this->session->set_userdata('sort-order', 'harga-asc');
                break;

            case 'harga-desc':
                $this->session->set_userdata('sort', 'harga');
                $this->session->set_userdata('order', 'DESC');
                $this->session->set_userdata('sort-order', 'harga-desc');
                break;

            case 'rating-asc':
                $this->session->set_userdata('sort', 'average_rating');
                $this->session->set_userdata('order', 'ASC');
                $this->session->set_userdata('sort-order', 'rating-asc');
                break;

            case 'rating-desc':
                $this->session->set_userdata('sort', 'average_rating');
                $this->session->set_userdata('order', 'DESC');
                $this->session->set_userdata('sort-order', 'nama-desc');
                break;

            default:

                break;
        }

        echo 'OK';
    }

    public function produk_terbaru()
    {

        //lets set default session values if not set
        if (!$this->session->userdata('view_tipe')) {
            $this->session->set_userdata('view_tipe', 'grid');
        }

        if (!$this->session->userdata('sort')) {
            $this->session->set_userdata('sort', 'nama');
        }

        if (!$this->session->userdata('order')) {
            $this->session->set_userdata('order', 'ASC');
        }

        $vt = $this->session->userdata('view_tipe');
        $sort = $this->session->userdata('sort');
        $order = $this->session->userdata('order');

        $data = array();

        $url = base_url().'produk-terbaru/';
        $res = $this->produk_model->num_page_terbaru();

        //grid = 12
        //list = 6

        $per_page = ($vt === 'grid') ? 12 : 6;

        $config = paginate($url, $res, $per_page, 2);
        $this->pagination->initialize($config);

        $this->produk_model->limit = $per_page;
        if ($this->uri->segment(2) == true) {
            $this->produk_model->offset = $this->uri->segment(2);
        } else {
            $this->produk_model->offset = 0;
        }

        $this->produk_model->sort = $sort;
        $this->produk_model->order = $order;

        $data['products'] = $this->produk_model->get_terbaru();
        $data['breadcrumbs'] = 'Produk Terbaru';

        //best-seller
        $this->trans_header_model->limit = 12;
        $this->trans_header_model->offset = 0;
        $this->trans_header_model->sort = 'jml_jual';
        $this->trans_header_model->order = 'DESC';
        $data['best_seller_product'] = $this->trans_header_model->get_penjualan();
        $data['sort_order'] = $this->session->userdata('sort-order');

        if ($vt === 'grid') {
            if ($this->input->post('ajax')) {
                $data['page_title'] = 'Produk Terbaru';
                $this->load->view('produk_grid_ajax', $data);
            } else {
                $data['page_name'] = 'produk_grid';
                $data['page_title'] = 'Produk Terbaru';
                $this->_generate_view($data);
            }
        } else {
            if ($this->input->post('ajax')) {
                $data['page_title'] = 'Produk Terbaru';
                $this->load->view('produk_list_ajax', $data);
            } else {
                $data['page_name'] = 'produk_list';
                $data['page_title'] = 'Produk Terbaru';
                $this->_generate_view($data);
            }
        }
    }

    public function addcart()
    {
        $data = array(
            'id' => $this->input->post('kode_produk'),
            'qty' => $this->input->post('banyak'),
            'price' => $this->input->post('harga'),
            'name' => $this->input->post('nama_produk'),
            'gambar' => $this->input->post('gambar'),
        );

        $this->cart->insert($data);

        // echo 'OK';
        redirect(base_url().'shopping-cart', 'refresh');
    }

    public function delete_cart($rowid)
    {
        $data = array(
            'rowid' => $rowid,
            'qty' => 0, );

        $this->cart->update($data);

        echo 'OK';
    }

    public function update_cart()
    {
        echo 'OK';
    }

    //tampilkan shopping cart
    public function shopping_cart($operation = null)
    {

        //add,update
        if (!empty($_POST)) {
            if ($operation === 'add') {
                $data = array(
                        'id' => $this->input->post('kode_produk'),
                        'qty' => $this->input->post('banyak'),
                        'price' => $this->input->post('harga'),
                        'name' => $this->input->post('nama_produk'),
                        'gambar' => $this->input->post('gambar'),
                        'slug' => $this->input->post('slug'),
                    );

                $this->cart->insert($data);
            }

            if ($operation === 'update') {
                $total = count($this->cart->contents());
                $item = $this->input->post('rowid');
                $qty = $this->input->post('qty');

                for ($i = 0;$i < $total;++$i) {
                    $data = array(
                        'rowid' => $item[$i],
                        'qty' => $qty[$i], );
                    $this->cart->update($data);
                }
            }
        }

        $data = array();

        if (!$this->cart->contents()) {
            //best-seller
            $this->trans_header_model->limit = 6;
            $this->trans_header_model->offset = 0;
            $this->trans_header_model->sort = 'jml_jual';
            $this->trans_header_model->order = 'DESC';
            $data['best_seller_product'] = $this->trans_header_model->get_penjualan();

            //latest product
            $this->produk_model->limit = 6;
            $this->produk_model->offset = 0;
            $this->produk_model->sort = 'tgl_update';
            $this->produk_model->order = 'DESC';
            $data['latest_products'] = $this->produk_model->get_terbaru();
        }

        $data['page_title'] = 'Keranjang Belanja';
        $data['page_name'] = 'shopping_cart';

        $this->_generate_view($data);
    }
/*end cart part*/

    public function tentang_kami()
    {
        $data['page_title'] = 'Tentang Kami';
        $data['page_name'] = 'about_us';

        $this->_generate_view($data);
    }

    public function cara_belanja()
    {
        $data['page_title'] = 'Cara Belanja';
        $data['page_name'] = 'cara_belanja';

        $this->_generate_view($data);
    }

    public function kirim_review()
    {
        $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'xss_clean|required');
        $this->form_validation->set_rules('nama', 'Nama', 'xss_clean|required');
        $this->form_validation->set_rules('email', 'Email', 'xss_clean|required|valid_email');
        $this->form_validation->set_rules('rating', 'Rating', 'xss_clean');
        $this->form_validation->set_rules('isi', 'Isi', 'xss_clean|required|strip_tags');

        if ($this->form_validation->run() == true) {
            $data['kode_produk'] = $this->input->post('kode_produk');
            $data['nama'] = $this->input->post('nama');
            $data['email'] = $this->input->post('email');

            if (empty($_POST['rating'])) {
                $data['rating'] = 1;
            } else {
                $data['rating'] = $this->input->post('rating');
            }

            $data['isi'] = $this->input->post('isi');

            $this->review_model->insert($data);
            //$this->session->set_flashdata('result', 'Terimakasih atas review anda');
            echo 'OK';
        } else {

            //$this->session->set_flashdata('result', 'ERROR:'.validation_errors());
            echo 'Error:'.validation_errors();
        }

        //redirect(base_url() . 'produk/' . $this->input->post('slug'));
        //$this->produk_details($this->input->post('slug'));
    }

    // $route['konfirmasi'] = 'web/konfirmasi';
    public function konfirmasi()
    {
        $data = array();
        $data['page_title'] = 'Konfirmasi Pembayaran';
        $data['page_name'] = 'konfirmasi';

        //best-seller
        $this->trans_header_model->limit = 6;
        $this->trans_header_model->offset = 0;
        $this->trans_header_model->sort = 'jml_jual';
        $this->trans_header_model->order = 'DESC';
        $data['best_seller_product'] = $this->trans_header_model->get_penjualan();

        $this->_generate_view($data);
    }

    // $route['send-konfirmasi'] = 'web/do_konfirmasi';
    public function do_konfirmasi()
    {
        $this->form_validation->set_rules('id_trans', 'ID Transaksi', 'xss_clean|required');
        $this->form_validation->set_rules('tgl_setor', 'Tanggal Setor', 'xss_clean|required');
        $this->form_validation->set_rules('bank', 'Bank', 'xss_clean|required');
        $this->form_validation->set_rules('metode_bayar', 'metode_bayar', 'xss_clean|required');
        $this->form_validation->set_rules('jml_transfer', 'Jumlah Transfer', 'xss_clean|required|numeric');
        $this->form_validation->set_rules('nama_penyetor', 'Nama Penyetor', 'xss_clean|required');
        $this->form_validation->set_rules('metode_kirim', 'Motode Kirim', 'xss_clean|required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'xss_clean|strip_tags');

        if ($this->form_validation->run() == true) {
            $check_trans = $this->trans_header_model->check_trans(intval($this->input->post('id_trans')));
            if ($check_trans == 0) {
                echo 'ERROR: Nomor Transaksi ini tidak ditemukan!';
            } else {
                $check_already_confirm = $this->trans_header_model->check_already_confirm(intval($this->input->post('id_trans')));

                if ($check_already_confirm != 0) {
                    echo 'ERROR: Nomor Transaksi ini sudah melakukan konfirmasi!';
                } else {
                    $data['id_trans'] = intval($this->input->post('id_trans'));
                    $data['tgl_setor'] = $this->input->post('tgl_setor');

                    $data['metode_bayar'] = $this->input->post('metode_bayar');
                    $data['nama_penyetor'] = $this->input->post('nama_penyetor');
                    $data['bank'] = $this->input->post('bank');
                    $data['jml_transfer'] = $this->input->post('jml_transfer');
                    $data['metode_kirim'] = $this->input->post('metode_kirim');
                    $data['pesan'] = $this->input->post('pesan');

                    $this->trans_konfirmasi_model->insert($data);
                    //update header trans
                    $data_update = array('status' => 'PAYMENT_CONFIRMED');
                    $this->trans_header_model->update($data['id_trans'], $data_update);
                    echo 'OK';
                }
            }
        } else {
            echo 'Error:'.validation_errors();
        }
    }
}
