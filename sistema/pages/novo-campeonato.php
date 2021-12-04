<?php

if (isset($_POST['salvar'])) {
	
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$data_ini = filter_input(INPUT_POST, 'data_ini', FILTER_SANITIZE_STRING);
	$data_fim = filter_input(INPUT_POST, 'data_fim', FILTER_SANITIZE_STRING);
	$regulamento = filter_input(INPUT_POST, 'regulamento', FILTER_SANITIZE_STRING);
	$exibir = filter_input(INPUT_POST, 'exibir', FILTER_SANITIZE_STRING);
	$cod_categoria = filter_input(INPUT_POST, 'cod_categoria', FILTER_VALIDATE_INT);

	$dados = array(
		'nome' => $nome,
		'data_ini' => $data_ini,
		'data_fim' => $data_fim,
		'regulamento' => $regulamento,
		'exibir' => $exibir,
		'cod_categoria' => $cod_categoria
	);

	inserir_campeonato($dados);
	header('Location: ' . PAG_CAMPEONATOS);
	exit();
}

$codigo = 0;
$nome = '';
$data_ini = '';
$data_fim = '';
$regulamento = '';
$exibir = '';
$cod_categoria = 0;

$categorias = listar_categorias();

$titulo = 'Novo campeonato';
include './template/components/header.html';
include './template/pages/form-campeonato.html';
include './template/components/footer.html';