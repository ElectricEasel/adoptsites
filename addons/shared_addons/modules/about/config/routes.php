<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$route['about'] = 'about/index';
$route['about/admin/streams(:any)'] = 'admin_streams$1';