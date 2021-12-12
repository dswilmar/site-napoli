<?php

if (isset($_POST['salvar'])) {
	
	$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
	$img = filter_input(INPUT_POST, 'img', FILTER_SANITIZE_STRING);
	$link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_STRING);
	
	$dados = array(
		'titulo' => $titulo,
		'img' => $img,
		'link' => $link,
		'categoria' => 'patrocinador',
		'autor' => $_SESSION['USUARIO']['NOME']		
	);
	
	inserir_conteudo_site($dados);
	header('Location: ' . PAG_APOIO_PATROCINADORES);
	exit();
}

$cod_conteudo = 0;
$titulo = '';
$img = '';
$link = '';

$titulo = 'Novo patrocinador';
include './template/components/header.html';
include './template/pages/form-patrocinador.html';
include './template/components/footer.html';