<?php

if (isset($_POST['salvar'])) {
	
	$cod = filter_input(INPUT_POST, 'cod', FILTER_VALIDATE_INT);
	$gols = filter_input(INPUT_POST, 'gols', FILTER_VALIDATE_INT);

	$dados = array(
		'gols' => $gols
	);	

	if ($cod != 0) {
		editar_artilheiro($dados, $cod);
		header('Location: ' . PAG_ARTILHARIA);
		exit();
	}
}

if (isset($_GET['cod'])) {
	
	$cod = filter_input(INPUT_GET, 'cod', FILTER_VALIDATE_INT);
	
	if ($cod != 0) {

		$artilheiro = dados_artilharia($cod);
		$codigo = $artilheiro['cod_art'];
		$campeonato = $artilheiro['campeonato'];
		$time = $artilheiro['time'];
		$aluno = $artilheiro['aluno'];
		$gols = $artilheiro['gols'];

		$titulo = 'Editar artilheiro';
		include './template/components/header.html';
		include './template/pages/form-editar-artilharia.html';
		include './template/components/footer.html';
	}
} else {
	header('Location: ' . PAG_CATEGORIAS);
}