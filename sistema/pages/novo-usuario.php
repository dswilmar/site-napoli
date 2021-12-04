<?php

if (isset($_POST['salvar'])) {
	
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
	$senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));	
	$ativo = filter_input(INPUT_POST, 'ativo', FILTER_SANITIZE_STRING);
	
	$dados = array(
		'nome' => $nome,
		'login' => $login,
		'senha' => $senha,
		'ativo' => $ativo		
	);	

	inserir_usuario($dados);
	header('Location: ' . PAG_USUARIOS);
	exit();
}

$codigo = 0;
$nome = '';
$login = '';
$senha = '';
$ativo = 'S';

$titulo = 'Novo usuário';
include './template/components/header.html';
include './template/pages/form-usuario.html';
include './template/components/footer.html';