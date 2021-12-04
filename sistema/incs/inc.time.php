<?php

function listar_times() {
	$sql = "SELECT cod_time, nome, professor FROM time";
	$times = selecionar_dados($sql);
	return $times;
}

function listar_times_por_nome($nome) {
	$sql = "SELECT * FROM time WHERE nome LIKE '%".$nome."%'";
	$times = selecionar_dados($sql);
	return $times;
}

function listar_times_campeonato($cod_campeonato) {
	$sql = "SELECT cod_time, time.nome FROM time
			INNER JOIN campeonato ON
			campeonato.cod_categoria = time.cod_categoria
			WHERE campeonato.cod_campeonato = :cod_campeonato";
	$params = array('cod_campeonato' => $cod_campeonato);
	$times = selecionar_dados($sql, $params);
	return $times;
}

function inserir_time($dados) {
	db_insert('time', $dados);
}

function dados_time($cod) {
	$cond = array('cod_time' => $cod);
	$time = db_get('time', $cond);
	return $time[0];
}

function atualizar_dados_time($dados, $cod) {
	$cond = array('cod_time' => $cod);
	db_update('time', $dados, $cond);
}

function excluir_time($cod) {
	$cond = array('cod_time' => $cod);
	db_delete('time', $cond);
}