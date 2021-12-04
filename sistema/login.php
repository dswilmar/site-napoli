<?php

//escoladefutebolnapoli.com.br/cpanel/
//login: efutebolnapoli
//senha: @$acessoescola

session_start();

include './conf/config.php';
include './incs/includes.php';

if (isset($_POST['logar'])) {

	$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
	$senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
	
	if (autenticar_usuario($login, $senha)) {		
		carrega_sessao_usuario($login);
	} else {		
		$alert = array(
			'tipo' => 'danger',
			'msg' => 'Ops! Login ou senha inválidos.'
		);
	}

}

include './template/pages/login.html';