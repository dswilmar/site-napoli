<?php

if (isset($_POST['salvar'])) {
	
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$img = filter_input(INPUT_POST, 'img', FILTER_SANITIZE_STRING);
	
	$dados = array(
		'nome' => $nome,
		'img' => $img
	);
	
	inserir_escola($dados);
	header('Location: ' . PAG_ESCOLAS);
	exit();
}

$cod_escola = 0;
$nome = '';
$img = '';

$titulo = 'Nova escola';
include './template/components/header.html';
include './template/pages/form-escola.html';
include './template/components/footer.html';