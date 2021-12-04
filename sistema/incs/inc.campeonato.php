<?php

function listar_campeonatos() {
	$sql = "SELECT cod_campeonato, nome FROM campeonato";
	$campeonatos = selecionar_dados($sql);
	return $campeonatos;
}

function listar_campeonatos_ativos() {
	$sql = "SELECT 
				cod_campeonato, 
				campeonato.nome AS campeonato, 
				categoria.nome AS categoria 
			FROM campeonato 
				INNER JOIN categoria ON
				categoria.cod_categoria = campeonato.cod_categoria
			WHERE exibir = 'S'";
	$campeonatos = selecionar_dados($sql);
	return $campeonatos;
}

function inserir_campeonato($dados) {
	db_insert('campeonato', $dados);
}

function dados_campeonato($cod) {
	$cond = array('cod_campeonato' => $cod);
	$campeonato = db_get('campeonato', $cond);
	return $campeonato[0];
}

function atualizar_dados_campeonato($dados, $cod) {
	$cond = array('cod_campeonato' => $cod);
	db_update('campeonato', $dados, $cond);
}

function excluir_campeonato($cod) {
	$cond = array('cod_campeonato' => $cod);
	db_delete('campeonato', $cond);
}