<?php

if (isset($_POST['salvar'])) {
	$cod = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
	//$senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));	
	$ativo = filter_input(INPUT_POST, 'ativo', FILTER_SANITIZE_STRING);

	$dados = array(
		'nome' => $nome,
		'login' => $login,		
		'ativo' => $ativo		
	);

	if ($cod != 0) {
		atualizar_dados_usuario($dados, $cod);
		header('Location: ' . PAG_USUARIOS);
		exit();
	}
}

if (isset($_GET['cod'])) {
	
	$cod = filter_input(INPUT_GET, 'cod', FILTER_VALIDATE_INT);
	
	if ($cod != 0) {

		$usuario = dados_usuario($cod);
		$codigo = $usuario['cod_usuario'];
		$nome = $usuario['nome'];
		$login = $usuario['login'];		
		$ativo = $usuario['ativo'];

		$titulo = 'Editar usuário';
		include './template/components/header.html';
		include './template/pages/form-usuario.html';
		include './template/components/footer.html';
	}
} else {
	header('Location: ' . PAG_USUARIOS);
}