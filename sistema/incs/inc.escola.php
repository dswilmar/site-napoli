<?php

function listar_escolas() {
	$sql = "SELECT cod_escola, nome FROM escola";
	$escolas = selecionar_dados($sql);
	return $escolas;
}

function inserir_escola($dados) {
	db_insert('escola', $dados);
}

function dados_escola($cod) {
	$cond = array('cod_escola' => $cod);
	$escola = db_get('escola', $cond);
	return $escola[0];
}

function atualizar_dados_escola($dados, $cod) {
	$cond = array('cod_escola' => $cod);
	db_update('escola', $dados, $cond);
}

function excluir_escola($cod) {
	$cond = array('cod_escola' => $cod);
	db_delete('escola', $cond);
}