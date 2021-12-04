<?php

if (isset($_GET['cod_campeonato'])) {
	$cod_campeonato = filter_input(INPUT_GET, 'cod_campeonato', FILTER_VALIDATE_INT);
	if ($cod_campeonato != 0) {

		if (isset($_POST['cod_rodada'])) {
			$cod_rodada = filter_input(INPUT_POST, 'cod_rodada', FILTER_VALIDATE_INT);
		} else {
			$cod_rodada = cod_ultima_rodada($cod_campeonato);
		}
		
		$pos = 0;
		$campeonato = dados_campeonato($cod_campeonato);
		$dados = dados_tabela_campeonato($cod_campeonato);
		$rodadas = listar_rodadas_campeonato($cod_campeonato);
		$jogos = listar_jogos_rodada($cod_rodada);
		$artilheiros = listar_artilheiros_campeonato($cod_campeonato);

		include './template/components/header.html';
		include './template/pages/tabela.html';
		include './template/components/footer.html';
	}
} else {
	header('Location: ' . PAG_CAMPEONATOS);
	exit();
}