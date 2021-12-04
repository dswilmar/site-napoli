<?php

if (isset($_POST['salvar'])) {
	$cod = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

	$dados = array('nome' => $nome);

	if ($cod != 0) {
		atualizar_dados_categoria($dados, $cod);
		header('Location: ' . PAG_CAMPEONATOS);
		exit();
	}
}

if (isset($_GET['cod'])) {
	
	$codigo = filter_input(INPUT_GET, 'cod', FILTER_VALIDATE_INT);
	
	if ($codigo != 0) {

		$jogo = dados_jogo($codigo);
		$titulo = 'Editar jogo';

		$cod_time1 = $jogo['cod_time1'];
		$cod_time2 = $jogo['cod_time2'];

		$dados_time1 = dados_time($cod_time1);
		$dados_time2 = dados_time($cod_time2);

		$time1 = $dados_time1['nome'];
		$time2 = $dados_time2['nome'];

		$gols_time1 = $jogo['gols_time1'];
		$gols_time2 = $jogo['gols_time2'];
		$local = $jogo['local'];
		$data = $jogo['data'];
		$hora = $jogo['hora'];

		include './template/components/header.html';
		include './template/pages/form-jogo.html';
		include './template/components/footer.html';
	}
} else {
	header('Location: ' . PAG_CAMPEONATOS);
}