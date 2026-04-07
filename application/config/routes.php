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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'WebController';

$route['dashboard'] = 'dashboard_controller/index';
$route['shop'] = 'WebController/shop';
$route['aboutus'] = 'WebController/aboutus';


$route['product-detail/(:num)'] = 'WebController/product_detail/$1';
$route['add-to-cart'] = 'WebController/add_to_cart';
$route['view-cart'] = 'WebController/view_cart';
$route['remove-cart-item/(:num)'] = 'WebController/remove_cart_item/$1';
$route['checkout'] = 'WebController/checkout';
$route['place-order'] = 'WebController/place_order';
$route['order-success'] = 'WebController/order_success';
$route['update-cart'] = 'WebController/update_cart';


$route['category/(:any)'] = 'WebController/category/$1';
$route['product/(:any)'] = 'webcontroller/product_details/$1';


$route['login'] = 'WebController/web_login_page'; 
$route['register'] = 'WebController/web_register_page'; 
$route['do_login'] = 'WebController/web_login';  
$route['do_register'] = 'WebController/web_register'; 
$route['logout'] = 'WebController/logout';
$route['web_login'] = 'WebController/web_login';


$route['homeafter'] = 'WebController/homeafter';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
