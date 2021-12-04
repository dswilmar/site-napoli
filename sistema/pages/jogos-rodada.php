<?php

if (isset($_POST['adicionar_jogo'])) {
	$cod_rodada = filter_input(INPUT_POST, 'cod_rodada', FILTER_VALIDATE_INT);
	$cod_time1 = filter_input(INPUT_POST, 'cod_time1', FILTER_VALIDATE_INT);
	$cod_time2 = filter_input(INPUT_POST, 'cod_time2', FILTER_VALIDATE_INT);
	$gols_time1 = filter_input(INPUT_POST, 'gols_time1', FILTER_VALIDATE_INT);
	$gols_time2 = filter_input(INPUT_POST, 'gols_time2', FILTER_VALIDATE_INT);
	$local = filter_input(INPUT_POST, 'local', FILTER_SANITIZE_STRING);
	$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
	$hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);

	$dados = array(
		'cod_rodada' => $cod_rodada,
		'cod_time1' => $cod_time1,		
		'cod_time2' => $cod_time2,
		'gols_time1' => $gols_time1,
		'gols_time2' => $gols_time2,
		'local' => $local,
		'data' => $data,
		'hora' => $hora		
	);

	inserir_jogo($dados);
	$cod_jogo = ultimo_jogo_lancado($cod_time1, $cod_time2, $cod_rodada);

	if ($cod_jogo > 0) {

		//Movimentacao do time 1
		$vitoria = 0;
		$derrota = 0;
		$empate = 0;

		if ($gols_time1 === $gols_time2) {
			$empate = 1;
		} else {
			if ($gols_time1 > $gols_time2) {
				$vitoria = 1;
			}

			if ($gols_time1 < $gols_time2) {
				$derrota = 1;
			}
		}

		$mov_time1 = array(
			'cod_time' => $cod_time1,
			'cod_jogo' => $cod_jogo,
			'vitoria' => $vitoria,
			'derrota' => $derrota,
			'empate' => $empate,
			'gols_feitos' => $gols_time1,
			'gols_sofridos' => $gols_time2
		);

		inserir_movimentacao_time($mov_time1);

		//Movimentacao do time 2
		$vitoria = 0;
		$derrota = 0;
		$empate = 0;

		if ($gols_time2 === $gols_time1) {
			$empate = 1;
		} else {
			if ($gols_time2 > $gols_time1) {
				$vitoria = 1;
			}

			if ($gols_time2 < $gols_time1) {
				$derrota = 1;
			}
		}

		$mov_time2 = array(
			'cod_time' => $cod_time2,
			'cod_jogo' => $cod_jogo,
			'vitoria' => $vitoria,
			'derrota' => $derrota,
			'empate' => $empate,
			'gols_feitos' => $gols_time2,
			'gols_sofridos' => $gols_time1
		);

		inserir_movimentacao_time($mov_time2);
	}
}

if (isset($_GET['cod_rodada'])) {
	
	$cod_rodada = filter_input(INPUT_GET, 'cod_rodada', FILTER_VALIDATE_INT);
	
	if ($cod_rodada != 0) {

		$rodada = dados_rodada($cod_rodada);
		$cod_campeonato = $rodada['cod_campeonato'];
		$campeonato = dados_campeonato($cod_campeonato);
		$jogos = listar_jogos_rodada($cod_rodada);
		$times = listar_times_campeonato($cod_campeonato);
		
		include './template/components/header.html';
		include './template/pages/jogos-rodada.html';
		include './template/components/footer.html';
	}
} else {
	header('Location: ' . PAG_HOME);
}