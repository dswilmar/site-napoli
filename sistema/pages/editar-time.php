<?php

if (isset($_POST['salvar'])) {
	$cod = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$professor = filter_input(INPUT_POST, 'professor', FILTER_SANITIZE_STRING);
	$cod_escola = filter_input(INPUT_POST, 'cod_escola', FILTER_VALIDATE_INT);
	$cod_categoria = filter_input(INPUT_POST, 'cod_categoria', FILTER_VALIDATE_INT);

	$dados = array(
		'nome' => $nome,
		'professor' => $professor,
		'cod_escola' => $cod_escola,
		'cod_categoria' => $cod_categoria
	);

	if ($cod != 0) {
		atualizar_dados_time($dados, $cod);
		header('Location: ' . PAG_TIMES);
		exit();
	}
}

if (isset($_GET['cod'])) {
	
	$cod = filter_input(INPUT_GET, 'cod', FILTER_VALIDATE_INT);
	
	if ($cod != 0) {

		$time = dados_time($cod);
		$codigo = $time['cod_time'];
		$nome = $time['nome'];
		$professor = $time['professor'];
		$cod_categoria = $time['cod_categoria'];
		$cod_escola = $time['cod_escola'];

		$escolas = listar_escolas();
		$categorias = listar_categorias();

		$titulo = 'Editar time';
		include './template/components/header.html';
		include './template/pages/form-time.html';
		include './template/components/footer.html';
	}
} else {
	header('Location: ' . PAG_TIMES);
}