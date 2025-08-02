<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$route['default_controller'] = 'auth/login';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
