<?php

function inserir_movimentacao_time($dados) {
	db_insert('mov_time', $dados);
}

function dados_tabela_campeonato($cod_campeonato) {
	$sql = 'select
				time.cod_time,
				time.nome,
				((sum(vitoria) * 3) + sum(empate)) as pontos,				
				sum(vitoria) as vitorias,
				sum(derrota) as derrotas,
				sum(empate) as empates,
				sum(gols_feitos) as gols_feitos,
				sum(gols_sofridos) as gols_sofridos,
				(sum(gols_feitos) - sum(gols_sofridos)) as saldo_gols
			from mov_time
				left join jogo on
				jogo.cod_jogo = mov_time.cod_jogo
				left join rodada on
				rodada.cod_rodada = jogo.cod_rodada
				left join campeonato on
				campeonato.cod_campeonato = rodada.cod_campeonato
				inner join time on
				time.cod_time = mov_time.cod_time and
				time.cod_categoria = campeonato.cod_categoria
			where campeonato.cod_campeonato = :cod_campeonato
			group by time.nome
			order by pontos desc, saldo_gols desc, gols_feitos desc, gols_sofridos desc';
	$params = array('cod_campeonato' => $cod_campeonato);
	$dados = selecionar_dados($sql, $params);
	return $dados;
}

function qtd_jogos_time_campeonato($cod_time, $cod_campeonato) {
	$sql = 'SELECT 
				COUNT(*) AS qtd 
			FROM mov_time 
				INNER JOIN jogo ON
				jogo.cod_jogo = mov_time.cod_jogo
				INNER JOIN rodada ON
				rodada.cod_rodada = jogo.cod_rodada
				INNER JOIN campeonato ON
				campeonato.cod_campeonato = rodada.cod_campeonato
			WHERE mov_time.cod_time = :cod_time 
			AND campeonato.cod_campeonato = :cod_campeonato';
	$params = array('cod_time' => $cod_time, 'cod_campeonato' => $cod_campeonato);
	$dados = selecionar_dados($sql, $params);
	if (count($dados) > 0) {
		return $dados[0]['qtd'];
	} else {
		return 0;
	}
}