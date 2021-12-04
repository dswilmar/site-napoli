<?php

if (isset($_POST['salvar'])) {
	$cod = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

	$dados = array('nome' => $nome);

	if ($cod != 0) {
		atualizar_dados_categoria($dados, $cod);
		header('Location: ' . PAG_CATEGORIAS);
		exit();
	}
}

if (isset($_GET['cod'])) {
	
	$cod = filter_input(INPUT_GET, 'cod', FILTER_VALIDATE_INT);
	
	if ($cod != 0) {

		$categoria = dados_categoria($cod);
		$codigo = $categoria['cod_categoria'];
		$nome = $categoria['nome'];

		$titulo = 'Editar categoria';
		include './template/components/header.html';
		include './template/pages/form-categoria.html';
		include './template/components/footer.html';
	}
} else {
	header('Location: ' . PAG_CATEGORIAS);
}