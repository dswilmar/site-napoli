<?php

if (isset($_POST['salvar'])) {
	$cod = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$img = filter_input(INPUT_POST, 'img', FILTER_SANITIZE_STRING);

	$dados = array(
		'nome' => $nome,
		'img' => $img
	);

	if ($cod != 0) {
		atualizar_dados_escola($dados, $cod);
		header('Location: ' . PAG_ESCOLAS);
		exit();
	}
}

if (isset($_GET['cod'])) {
	
	$cod = filter_input(INPUT_GET, 'cod', FILTER_VALIDATE_INT);
	
	if ($cod != 0) {

		$escola = dados_escola($cod);
		$codigo = $escola['cod_escola'];
		$nome = $escola['nome'];
		$img = $escola['img'];

		$titulo = 'Editar escola';
		include './template/components/header.html';
		include './template/pages/form-escola.html';
		include './template/components/footer.html';
	}
} else {
	header('Location: ' . PAG_ESCOLAS);
}