<?php

if (isset($_POST['adicionar_rodada'])) {
	$cod_campeonato = filter_input(INPUT_POST, 'cod_campeonato', FILTER_VALIDATE_INT);
	$numero = filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_INT);
	$descr = filter_input(INPUT_POST, 'descr', FILTER_SANITIZE_STRING);

	$dados = array(
		'numero' => $numero,
		'descr' => $descr,
		'cod_campeonato' => $cod_campeonato
	);

	if (($cod_campeonato !== 0) && ($numero !== 0)) {
		inserir_rodada($dados);		
	}
}

if (isset($_GET['cod_campeonato'])) {
	
	$cod_campeonato = filter_input(INPUT_GET, 'cod_campeonato', FILTER_VALIDATE_INT);
	
	if ($cod_campeonato != 0) {

		$campeonato = dados_campeonato($cod_campeonato);
		$rodadas = listar_rodadas_campeonato($cod_campeonato);
		$numero_ultima_rodada = numero_ultima_rodada($cod_campeonato);
		
		include './template/components/header.html';
		include './template/pages/rodadas-campeonato.html';
		include './template/components/footer.html';
	}
} else {
	header('Location: ' . PAG_CAMPEONATOS);
}