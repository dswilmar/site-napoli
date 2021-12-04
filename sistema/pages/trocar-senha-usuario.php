<?php

if (isset($_POST['salvar'])) {
	$cod = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT);
	$senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));		

	$dados = array(
		'senha' => $senha		
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
		$login = $usuario['login'];
		$nome = $usuario['nome'];
		
		$titulo = 'Trocar senha do usuário';
		include './template/components/header.html';
		include './template/pages/form-troca-senha.html';
		include './template/components/footer.html';
	}
} else {
	header('Location: ' . PAG_USUARIOS);
}