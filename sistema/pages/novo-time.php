<?php

if (isset($_POST['salvar'])) {
	
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

	inserir_time($dados);
	header('Location: ' . PAG_TIMES);
	exit();
}

$cod_time = 0;
$nome = '';
$professor = '';
$cod_escola = 0;
$cod_categoria = 0;

$escolas = listar_escolas();
$categorias = listar_categorias();

$titulo = 'Novo time';
include './template/components/header.html';
include './template/pages/form-time.html';
include './template/components/footer.html';