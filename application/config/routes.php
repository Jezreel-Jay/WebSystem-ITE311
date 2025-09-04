<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
| ...existing comments...
*/

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route for home page
$route['home'] = 'home/index';
// Route for contact page
$route['contact'] = 'home/contact';
// Route for about page
$route['about'] = 'home/about';

// Remove any $routes->get() lines, as they are for CodeIgniter