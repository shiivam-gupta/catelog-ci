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
//$route['default_controller'] = 'MainController';

$route['test'] = 'ProductController/test';

$route['admin'] = function ($slug=null){
	return 'AdminLoginController/login';
};

$route['default_controller'] = 'HomeController';
$route['admin/login'] = 'AdminLoginController/login';
$route['admin/logout'] = 'AdminLoginController/logout';
$route['admin/dashboard'] = 'MainController';
$route['admin/supplier/list'] = 'MainController/supplierList';
$route['admin/supplier/add'] = 'MainController/addEditsupplier';
$route['admin/supplier/edit/(:num)'] = 'MainController/addEditsupplier/$1';
$route['admin/supplier/delete/(:num)'] = 'MainController/deletesupplier/$1';

$route['admin/products/list'] = 'ProductController/allSupplierProductList';
$route['admin/products/list/(:num)'] = 'ProductController/supplierProductList/$1';
$route['admin/products/add/(:num)'] = 'ProductController/addEditSupplierProductList/$1';
$route['admin/products/edit/(:num)/(:num)'] = 'ProductController/addEditSupplierProductList/$1/$2';
$route['admin/products/delete/(:num)/(:num)'] = 'ProductController/deleteSupplierProductList/$1/$2';
$route['admin/products/delete/(:num)'] = 'ProductController/deleteProductList/$1';

$route['admin/products/image/delete/(:num)'] = 'ProductController/deleteProductImage/$1';

$route['admin/orders/list'] = 'OrderController/allOrderList';
$route['admin/order/view/(:num)'] = 'OrderController/orderView/$1';
$route['admin/change/status'] = 'OrderController/statusUpdate';

$route['admin/settings'] = 'SettingController/allSetting';

$route['convert/currency/rate'] = 'ProductController/convertCurrency';

$route['admin/language/change/(:any)'] = 'MainController/changeAdminLanguage/$1';

//front url start from here
$route['temp-login'] = 'TempLoginController/index';

$route['home'] = 'HomeController/index';
$route['login'] = 'HomeController/userLogin';
$route['logout'] = 'HomeController/userLogout';
$route['register'] = 'HomeController/registerUser';
$route['cart'] = 'CartController/index';
$route['order/confirm'] = 'CartController/confirmOrder';
$route['order/list'] = 'CartController/orderDetails';


$route['product/filter'] = 'HomeController/productFilter';
$route['product/details/(:num)'] = 'HomeController/productDetails/$1';

$route['cart/add'] = 'CartController/addtocart';
$route['cart/remove'] = 'CartController/removeCartItem';
$route['cart/update'] = 'CartController/updateCart';
$route['cart/items/count'] = 'CartController/totalCartItems';

$route['front/language/change/(:any)'] = 'HomeController/changeUserLanguage/$1';

//Cron
$route['update/currency/rate'] = 'Cron/updateCurrencyRates';

//activity routes
$route['admin/buying-supplier'] = 'ActivityController/allSupplierProductOrderList';
$route['admin/get-skuproduct'] = 'ActivityController/getSkuProduct';
$route['admin/manufacturer-products/add'] = 'ActivityController/addEditSupplierProductList';
$route['admin/get-supplier-product'] = 'ActivityController/getSupplierProduct';
$route['admin/payment-supplier'] = 'ActivityController/getPaymentSupplier';
$route['admin/new-payment/add'] = 'ActivityController/addPaymentSupplier';
$route['admin/report'] = 'ActivityController/showReports';

/*Selling To customer*/
$route['admin/selling-to-buyer'] = 'SellerController/seller_to_buyerList';
$route['admin/selling-to-customer/add'] = 'SellerController/addEdit';
$route['admin/get-product-price/(:num)'] = 'SellerController/getProductPrice/$1';
$route['admin/recipts-from-buyer'] = 'SellerController/addReciptsFromBuyer';
$route['admin/recipts-from-buyer/list'] = 'SellerController/ReciptsListFromBuyer';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
