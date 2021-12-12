<?php

if (isset($_POST['salvar'])) {
	
	$cod_campeonato = filter_input(INPUT_POST, 'cod_campeonato', FILTER_VALIDATE_INT);
	$cod_time = filter_input(INPUT_POST, 'cod_time', FILTER_VALIDATE_INT);
	$artilheiro = filter_input(INPUT_POST, 'artilheiro', FILTER_SANITIZE_STRING);
	$gols = filter_input(INPUT_POST, 'gols', FILTER_VALIDATE_INT);
	
	$dados = array(
		'cod_campeonato' => $cod_campeonato,
		'cod_time' => $cod_time,
		'artilheiro' => $artilheiro,
		'gols' => $gols
	);	

	inserir_artilheiro($dados);
	header('Location: ' . PAG_ARTILHARIA);
	exit();
}

$cod_campeonato = 0;
$cod_time = 0;
$artilheiro = '';
$gols = 0;

$campeonatos = listar_campeonatos_ativos();

$titulo = 'Novo artilheiro';
include './template/components/header.html';
include './template/pages/form-artilharia.html';
include './template/components/footer.html';