<?php

date_default_timezone_set('America/Sao_Paulo');

session_start();

include './conf/config.php';
include './incs/includes.php';

if (isset($_SESSION['USUARIO'])) {

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
		redirect(PAG_404);
	}

} else {

	header('Location: login.php');
}