<?php
if (isset($_GET['cod'])) {
	$cod = filter_input(INPUT_GET, 'cod', FILTER_VALIDATE_INT);
	if ($cod != 0) {
		$jogo = dados_jogo($cod);
		$cod_rodada = $jogo['cod_rodada'];
		excluir_movimentaoca_jogo($cod);
		excluir_jogo($cod);
		header('Location: ' . PAG_JOGOS_RODADA . $cod_rodada);
	}
} else {
	header('Location: ' . PAG_CAMPEONATOS);
}