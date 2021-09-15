<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */
$route['default_controller']   = 'main';
$route['404_override']         = 'Detect/not_found';
$route['translate_uri_dashes'] = false;

$route['transfer-to-wallet'] = 'transfer/towallet';
$route['transfer-to-game']   = 'transfer/togame';

$route['aff/(:any)'] = 'Authentication/aff/$1';
$route['register']        = 'Authentication/register';
$route['register/(:any)']        = 'Authentication/register/$1';
$route['login']           = 'Authentication/login';
$route['forgot-password'] = 'Authentication/forgotpassword';
$route['logout']          = 'Authentication/logout';
$route['try-play']        = 'Tryplay/index';


$route['service/action/login']       = 'Authentication/ajax_login';
$route['service/action/register']    = 'Authentication/ajax_register';
$route['service/action/forgot']      = 'Authentication/ajax_forgotpassword';
$route['service/action/get-otp']     = 'Authentication/ajax_send_otp';
$route['service/action/checkbank']   = 'Authentication/ajax_check_dup_bank';
$route['service/action/confirm-otp'] = 'Authentication/ajax_confirm_otp';

$route['service/action/thailotto']       = 'Lotto/request/1';

$route['browser-not-allow'] = 'Detect';

// Modified for Update Theme
$route['service/action/thailottonew']       = 'Lottonew/request/1'; 
$route['service/active/lottosave']       = 'Lottonew/ajax_save/1';
$route['service/active/cls']       = 'Lottonew/cls/1';

$route['service/active/lottosetsave']       = 'Lottonew/ajax_setnum_save/1';
$route['service/active/lottosetdelete/(:any)']       = 'Lottonew/ajax_setnum_delete/$1';
$route['service/active/cls_listsetnum/(:any)']       = 'Lottonew/cls_listsetnum/$1';
// End modified for Update Theme