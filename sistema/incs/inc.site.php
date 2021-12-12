<?php

function get_conteudo_site($categoria) {
	$cond = array('categoria' => $categoria, 'ativo' => 'S');
	$conteudo = db_get('conteudo_site', $cond);
	return $conteudo;
}

function list_conteudo_site($categoria) {
	$cond = array('categoria' => $categoria);
	$sql = 'SELECT cod_conteudo, titulo, img FROM conteudo_site WHERE categoria= :categoria';
	$conteudo = selecionar_dados($sql, $cond);
	return $conteudo;	
}

function dados_conteudo($cod) {
	$cond = array('cod_conteudo' => $cod);
	$conteudo = db_get('conteudo_site', $cond);
	return $conteudo[0];
}

function inserir_conteudo_site($dados) {
	db_insert('conteudo_site', $dados);
}

function atualizar_conteudo_site($dados, $cod) {
	$cond = array('cod_conteudo' => $cod);
	db_update('conteudo_site', $dados, $cond);
}

function excluir_conteudo_site($cod) {
	$cond = array('cod_conteudo' => $cod);
	db_delete('conteudo_site', $cond);
}