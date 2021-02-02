<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//halaman utama
$route['default_controller'] = 'beranda';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//API
$route['api/v1/login'] = 'api/UserController/login';
$route['api/v1/register'] = 'api/UserController/register';
$route['api/v1/update_alamat'] = 'api/UserController/update_alamat';

$route['api/v1/laundry_all'] = 'api/LaundryController/AllLaundry';
$route['api/v1/laundry_detail'] = 'api/LaundryController/detailLaundry';
$route['api/v1/input_pesanan'] = 'api/PesananController/inputCheckout';
$route['api/v1/history_pesanan'] = 'api/PesananController/historyPesanan';
$route['api/v1/detail_pesanan'] = 'api/PesananController/historyPesananDetail';
$route['api/v1/batalkan_pesanan'] = 'api/PesananController/batalkanPesanan';
$route['api/v1/promosi_all'] = 'api/PromosiController/AllPromosiLaundry';

//user
$route['login'] = 'user/login';
$route['CariProduk'] = 'Product/cari_produk';
$route['KategoriProduk/(:any)'] = 'Product/kategori_produk/$1';
$route['register'] = 'user/register';
$route['logout'] = 'user/logout';
$route['About'] = 'beranda/about';
$route['Konfirmasi/(:any)'] = 'Checkout/konfirmasi_pembayaran/$1';
$route['Thankyou'] = 'Checkout/thankyou';
$route['DaftarPesanan'] = 'Pemesanan/daftarpesanan';

//admin
$route['admin_login'] = 'admin/login';
$route['Pengguna'] = 'user/pengguna';
$route['access_denied'] = 'admin/access_denied';