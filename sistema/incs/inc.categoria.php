<?php

function listar_categorias() {
	$sql = "SELECT * FROM categoria";
	$categorias = selecionar_dados($sql);
	return $categorias;
}

function inserir_categoria($dados) {
	db_insert('categoria', $dados);
}

function dados_categoria($cod) {
	$cond = array('cod_categoria' => $cod);
	$categoria = db_get('categoria', $cond);
	return $categoria[0];
}

function atualizar_dados_categoria($dados, $cod) {
	$cond = array('cod_categoria' => $cod);
	db_update('categoria', $dados, $cond);
}

function excluir_categoria($cod) {
	$cond = array('cod_categoria' => $cod);
	db_delete('categoria', $cond);
}