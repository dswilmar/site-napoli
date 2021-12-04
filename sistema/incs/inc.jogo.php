<?php

function listar_jogos() {
	$sql = "SELECT * FROM jogo";
	$jogos = selecionar_dados($sql);
	return $jogos;
}

function listar_jogos_rodada($cod_rodada) {
	$params = array('cod_rodada' => $cod_rodada);
	$sql = 'SELECT
				cod_jogo,
				cod_rodada,
				time1.nome as time1,
				escola1.img as logo1,
				time2.nome as time2,
				escola2.img as logo2,
				gols_time1,
				gols_time2
			FROM jogo 
				INNER JOIN time time1 ON
				time1.cod_time = jogo.cod_time1
				INNER JOIN escola escola1 ON
				time1.cod_escola = escola1.cod_escola
				INNER JOIN time time2 ON
				time2.cod_time = jogo.cod_time2
				INNER JOIN escola escola2 ON
				time2.cod_escola = escola2.cod_escola
			WHERE cod_rodada = :cod_rodada';
	$jogos = selecionar_dados($sql, $params);
	return $jogos;
}

function inserir_jogo($dados) {
	db_insert('jogo', $dados);
}

function ultimo_jogo_lancado($cod_time1, $cod_time2, $cod_rodada) {
	$sql = 'SELECT 
				cod_jogo FROM jogo 
			WHERE cod_time1 = :cod_time1
			AND cod_time2 = :cod_time2
			AND cod_rodada = :cod_rodada
			ORDER BY cod_jogo DESC LIMIT 1';
	
	$params = array(
		'cod_time1' => $cod_time1,
		'cod_time2' => $cod_time2,
		'cod_rodada' => $cod_rodada
	);

	$jogo = selecionar_dados($sql, $params);
	if (count($jogo) > 0) {
		return $jogo[0]['cod_jogo'];
	} else {
		return 0;
	}
}

function dados_jogo($cod) {
	$cond = array('cod_jogo' => $cod);
	$jogo = db_get('jogo', $cond);
	return $jogo[0];
}

function atualizar_dados_jogo($dados, $cod) {
	$cond = array('cod_jogo' => $cod);
	db_update('jogo', $dados, $cond);
}

function excluir_jogo($cod) {
	$cond = array('cod_jogo' => $cod);
	db_delete('jogo', $cond);
}

function excluir_movimentaoca_jogo($cod) {
	$cond = array('cod_jogo' => $cod);
	db_delete('mov_time', $cond);
}