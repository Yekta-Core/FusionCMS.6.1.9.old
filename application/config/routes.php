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
// CodeIgniter
$route['default_controller'] = "News";
$route['404_override'] = 'Errors';
$route['translate_uri_dashes'] = FALSE;

// News
$route['news/(:num)'] = "News/index/$1";

// Pages
$route['page/admin/(:any)'] = "Page/Admin/$1";
$route['page/admin'] = "Page/Admin/index";
$route['page/(:any)'] = "Page/index/$1";

// Comments
$route['news/comments/get/(:num)'] = "News/Comments/get/$1";
$route['news/comments/add/(:num)'] = "News/Comments/add/$1";

// Profile
$route['profile/(:any)'] = "Profile/index/$1";
$route['messages/page/(:any)'] = "Messages/index/$1";
$route['messages/read/(:num)'] = "Messages/Read/index/$1";
$route['messages/create/(:num)'] = "Messages/Create/index/$1";

// Armory
$route['character/(:num)/(:any)'] = "Character/index/$1/$2";
$route['guild/(:num)/(:num)'] = "Guild/index/$1/$2";
$route['tooltip/(:num)/(:num)'] = "Tooltip/index/$1/$2";
$route['item/(:num)/(:num)'] = "Item/index/$1/$2";

// Admin
$route['admin/edit/save/(:any)'] = "Admin/Edit/save/$1";
$route['admin/edit/saveSource/(:any)'] = "Admin/Edit/saveSource/$1";
$route['admin/edit/(:any)'] = "Admin/Edit/index/$1";

// Vote
$route['vote/callback/(:any)'] = "Vote/Callback/index/$1";
