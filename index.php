<?php

date_default_timezone_set('America/Sao_Paulo');

include './config/config.php';
include SYS_FOLDER . '/conf/config.php';
include SYS_FOLDER . '/incs/includes.php';

$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_SPECIAL_CHARS);
$arr_url = explode('/', $url);

if (isset($arr_url[0]) && ($arr_url[0] != '')) {

	$page = $arr_url[0];

} else {

	$page = 'home';
}

if (file_exists('./pages/' . $page . '.php')) {
	include './pages/' . $page . '.php';
} else {
	http_response_code(404);	
}

