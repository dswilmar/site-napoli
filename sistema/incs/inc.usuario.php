<?php

function listar_usuarios() {
	$sql = "SELECT cod_usuario, nome, login FROM usuario";
	$usuarios = selecionar_dados($sql);
	return $usuarios;
}

function autenticar_usuario($login, $senha) {

	if (exists("usuario", "ativo= 'S' and login= '".$login."' and senha= '".$senha."'")) {
		return true;
	} else {
		return false;
	}
}

function carrega_sessao_usuario($login) {

	$dados = array();
	$cond = array('login' => $login);
	$dados = db_get('usuario', $cond);

	foreach ($dados as $u) {
		$_SESSION['USUARIO']['COD'] = $u['cod_usuario'];
		$_SESSION['USUARIO']['NOME'] = $u['nome'];
		//$_SESSION['USUARIO']['EMAIL'] = $u['email'];
	}

	header('Location: index.php');
}

function get_login($cod_usuario) {
	$cond = array('cod_usuario' => $cod_usuario);
	$dados = db_get('usuario', $cond);
	return $dados[0]['login'];
}

function inserir_usuario($dados) {
	db_insert('usuario', $dados);
}

function atualizar_dados_usuario($dados, $cod) {
	$cond = array('cod_usuario' => $cod);
	db_update('usuario', $dados, $cond);
} 

function dados_usuario($cod) {
	$cond = array('cod_usuario' => $cod);
	$dados = db_get('usuario', $cond);
	return $dados[0];
}