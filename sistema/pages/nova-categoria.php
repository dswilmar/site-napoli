<?php

if (isset($_POST['salvar'])) {
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$dados = array('nome' => $nome);
	inserir_categoria($dados);
	header('Location: ' . PAG_CATEGORIAS);
	exit();
}

$cod_categoria = 0;
$nome = '';

$titulo = 'Nova categoria';
include './template/components/header.html';
include './template/pages/form-categoria.html';
include './template/components/footer.html';