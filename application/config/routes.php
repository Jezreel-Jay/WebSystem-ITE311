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

// Auth routes for registration and login (CodeIgniter 3 syntax)
$route['register'] = 'auth/register';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['dashboard'] = 'auth/dashboard';

// Admin Dashboard
$route['admin/dashboard']   = 'AdminController/dashboard';

// Teacher Dashboard
$route['teacher/dashboard'] = 'TeacherController/dashboard';

// Student Dashboard
$route['student/dashboard'] = 'StudentController/dashboard';


