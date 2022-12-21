<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/


//details
$route['produk/(:any)'] = 'web/produk_details/$1';

$route['kategori/(:any)'] = 'web/show_based_on/$1';
// $route['bahan/(:any)'] = 'web/show_based_on/bahan/$1';
// $route['jenis/(:any)'] = 'web/show_based_on/jenis/$1';
// $route['motif/(:any)'] = 'web/show_based_on/motif/$1';


//range harga
$route['range/(:any)'] = 'web/range/$1';

//produk terbaru
$route['produk-terbaru'] = 'web/produk_terbaru';

//sorting
$route['sort/nama-asc'] = 'web/sort/nama-asc';
$route['sort/nama-desc'] = 'web/sort/nama-desc';

$route['sort/harga-asc'] = 'web/sort/harga-asc';
$route['sort/harga-desc'] = 'web/sort/harga-desc';

$route['sort/rating-asc'] = 'web/sort/rating-asc';
$route['sort/rating-desc'] = 'web/sort/rating-desc';

//web-view
$route['grid'] = 'web/grid_view';
$route['list'] = 'web/list_view';


//advanced Images Lib
$route['assets/web/images/foto_produk/(:any)'] = 'media/resize/$1';

/* cart */
$route['add-cart'] = 'web/shopping_cart/add';
$route['shopping-cart'] = 'web/shopping_cart';
$route['update-cart'] = 'web/shopping_cart/update';
$route['delete-cart/(:any)'] = 'web/delete_cart/$1';
/*end cart*/


/*members area*/
$route['member/beranda'] = 'member/index';
$route['member/konfirmasi'] = 'member/konfirmasi';
$route['member/konfirmasi/(:num)'] = 'member/konfirmasi/$1';
$route['member/send-konfirmasi'] = 'member/do_konfirmasi';
$route['member/trans/histori'] = 'member/histori_transaksi';
$route['member/trans/histori/(:any)'] = 'member/histori_transaksi/$1';
$route['member/trans/detail/(:num)'] = 'member/detail_transaksi/$1';
$route['member/profile'] = 'member/profile';
$route['member/password'] = 'member/password';
$route['member/checkout'] = 'member/checkout';
$route['member/checkout/details/(:num)'] = 'web/checkout_details/$1';
$route['member/trans/batal/(:num)'] = 'member/batal_transaksi/$1';

//checkout
$route['checkout'] = 'web/checkout';
$route['checkout/details/(:num)'] = 'web/checkout_details/$1';

//guest konfirmation
$route['send-konfirmasi'] = 'web/do_konfirmasi';
$route['konfirmasi'] = 'web/konfirmasi';

$route['kirim-review'] = 'web/kirim_review';
$route['tentang-kami'] = 'web/tentang_kami';
$route['cara-belanja'] = 'web/cara_belanja';

$route['member/login'] = 'web/member_login';
$route['member/logout'] = 'web/member_logout';

/**********ADMIN AREA **********/
//admin-beranda
$route['admin/beranda/(:num)'] = 'admin/index/$1';
$route['admin/beranda'] = 'admin/index';

//admin-login/logout
$route['admin-login'] = 'admin/login';
$route['login'] = 'admin/login';
$route['admin-logout'] = 'admin/logout';

//admin-profile
$route['admin/profile'] = 'admin/profile';

//admin-trans
$route['admin/trans/detail/(:num)'] = 'admin/trans_detail/$1';

////admin-barang-masuk
$route['admin/barang-masuk/add'] = 'admin/barang_masuk_add';
$route['admin/barang-masuk/delete/(:num)'] = 'admin/barang_masuk_delete/$1';
$route['admin/barang-masuk/details/delete/(:num)'] = 'admin/barang_masuk_details_delete/$1';
$route['admin/barang-masuk/details/(:any)'] = 'admin/barang_masuk_details/$1';
$route['admin/barang-masuk/(:num)'] = 'admin/barang_masuk/$1';
$route['admin/barang-masuk'] = 'admin/barang_masuk';

$route['admin/barang-keluar'] = 'admin/barang_keluar';

//admin-produk

$route['admin/produk/edit/(:any)'] = 'admin/produk_edit/$1';
$route['admin/produk/delete/(:any)'] = 'admin/produk_delete/$1';
$route['admin/produk/add'] = 'admin/produk_add';
$route['admin/produk'] = 'admin/produk';
$route['admin/produk/(:num)'] = 'admin/produk/$1';

// $route['admin/bahan/delete/(:num)'] = 'admin/bahan_delete/$1';
// $route['admin/jenis/delete/(:num)'] = 'admin/jenis_delete/$1';
// $route['admin/motif/delete/(:num)'] = 'admin/motif_delete/$1';


//review
$route['admin/produk/review/accepted/(:num)'] = 'admin/review_accepted/$1';
$route['admin/produk/review/delete/(:num)'] = 'admin/review_deleted/$1';
$route['admin/produk/review/(:num)']  = 'admin/produk_review/$1';
$route['admin/produk/review']  = 'admin/produk_review';



$route['admin/produk/images/add/(:any)'] = 'admin/produk_images_add/$1';
$route['admin/produk/images/delete/(:any)'] = 'admin/produk_images_delete/$1';
$route['admin/produk/images/(:any)'] = 'admin/produk_images/$1';


$route['signup'] = 'web/signup';
$route['do-signup'] = 'web/do_signup';
$route['default_controller'] = "web";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
