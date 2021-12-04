<?php
if (isset($_GET['cod_rodada'])) {
	$cod_rodada = filter_input(INPUT_GET, 'cod_rodada', FILTER_VALIDATE_INT);
	if ($cod_rodada != 0) {
		$rodada = dados_rodada($cod_rodada);
		$cod_campeonato = $rodada['cod_campeonato'];
		excluir_rodada($cod_rodada);
		header('Location: ' . PAG_RODADAS_CAMPEONATO . $cod_campeonato);
	}
} else {
	header('Location: ' . PAG_CAMPEONATOS);
}