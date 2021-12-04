<?php

function listar_rodadas() {
	$sql = "SELECT * FROM rodada";
	$rodadas = selecionar_dados($sql);
	return $rodadas;
}

function listar_rodadas_campeonato($cod_campeonato) {
	$cond = array('cod_campeonato' => $cod_campeonato);
	$rodadas = db_get('rodada', $cond);
	return $rodadas;
}

function numero_ultima_rodada($cod_campeonato) {
	$sql = 'SELECT numero FROM rodada WHERE cod_campeonato= :cod_campeonato ORDER BY numero DESC LIMIT 1';
	$cond = array('cod_campeonato' => $cod_campeonato);
	$dados = selecionar_dados($sql, $cond);
	if (count($dados) > 0) {
		return $dados[0]['numero'];
	} else {
		return 0;
	}
}

function cod_ultima_rodada($cod_campeonato) {
	$sql = 'SELECT cod_rodada FROM rodada WHERE cod_campeonato= :cod_campeonato ORDER BY cod_rodada DESC LIMIT 1';
	$cond = array('cod_campeonato' => $cod_campeonato);
	$dados = selecionar_dados($sql, $cond);
	if (count($dados) > 0) {
		return $dados[0]['cod_rodada'];
	} else {
		return 0;
	}
}

function inserir_rodada($dados) {
	db_insert('rodada', $dados);
}

function dados_rodada($cod) {
	$cond = array('cod_rodada' => $cod);
	$rodada = db_get('rodada', $cond);
	return $rodada[0];
}

function atualizar_dados_rodada($dados, $cod) {
	$cond = array('cod_rodada' => $cod);
	db_update('rodada', $dados, $cond);
}

function excluir_rodada($cod) {
	$cond = array('cod_rodada' => $cod);
	db_delete('rodada', $cond);
}