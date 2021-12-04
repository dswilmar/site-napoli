<?php

function listar_alunos() {
	$sql = "SELECT cod_aluno, foto, nome, rg FROM aluno";
	$alunos = selecionar_dados($sql);
	return $alunos;
}

function listar_alunos_por_nome($nome) {
	$sql = "SELECT cod_aluno, nome, rg FROM aluno WHERE nome LIKE '%".$nome."%'";
	$alunos = selecionar_dados($sql);
	return $alunos;
}

function listar_alunos_time($cod_time) {
	$sql = "SELECT 
				aluno.cod_aluno, cod_aluno_time, nome, rg 
			FROM aluno_time
			INNER JOIN aluno ON
			aluno.cod_aluno = aluno_time.cod_aluno
			WHERE aluno_time.cod_time= :cod_time";
	$params = array('cod_time' => $cod_time);
	$alunos = selecionar_dados($sql, $params);
	return $alunos;
}

function inserir_aluno($dados) {
	db_insert('aluno', $dados);
}

function dados_aluno($cod) {
	$cond = array('cod_aluno' => $cod);
	$aluno = db_get('aluno', $cond);
	return $aluno[0];
}

function atualizar_dados_aluno($dados, $cod) {
	$cond = array('cod_aluno' => $cod);
	db_update('aluno', $dados, $cond);
}

function excluir_aluno($cod) {
	$cond = array('cod_aluno' => $cod);
	db_delete('aluno', $cond);
}

function inserir_aluno_time($cod_aluno, $cod_time) {
	$dados = array(
		'cod_aluno' => $cod_aluno,
		'cod_time' => $cod_time
	);
	db_insert('aluno_time', $dados);
}

function dados_aluno_time($cod_aluno_time) {
	$cond = array('cod_aluno_time' => $cod_aluno_time);
	$dados = db_get('aluno_time', $cond);
	return $dados[0];
}

function excluir_aluno_time($cod_aluno_time) {
	$cond = array('cod_aluno_time' => $cod_aluno_time);
	db_delete('aluno_time', $cond);
}

function listar_artilheiros() {
	$sql = 'SELECT 
				cod_art, 
				aluno.nome as aluno,
				time.nome as time,
				campeonato.nome as campeonato,								
				gols
			FROM artilharia
			INNER JOIN campeonato ON
			campeonato.cod_campeonato = artilharia.cod_campeonato
			INNER JOIN aluno ON
			aluno.cod_aluno = artilharia.cod_aluno
			INNER JOIN time ON
			time.cod_time = artilharia.cod_time
			ORDER BY gols DESC, campeonato';
	$dados = selecionar_dados($sql);
	return $dados;
}

function listar_artilheiros_campeonato($cod_campeonato) {
	$sql = 'SELECT 
				cod_art, 
				aluno.nome as aluno,
				aluno.foto as foto,
				time.nome as time,
				gols
			FROM artilharia
			INNER JOIN campeonato ON
			campeonato.cod_campeonato = artilharia.cod_campeonato
			INNER JOIN aluno ON
			aluno.cod_aluno = artilharia.cod_aluno
			INNER JOIN time ON
			time.cod_time = artilharia.cod_time
			WHERE campeonato.cod_campeonato = :cod_campeonato
			ORDER BY gols DESC';
	$params = array('cod_campeonato' => $cod_campeonato);
	$dados = selecionar_dados($sql, $params);
	return $dados;	
}

function dados_artilharia($cod) {
	$sql = 'SELECT 
				cod_art, 
				aluno.nome as aluno,
				time.nome as time,
				campeonato.nome as campeonato,								
				gols
			FROM artilharia
			INNER JOIN campeonato ON
			campeonato.cod_campeonato = artilharia.cod_campeonato
			INNER JOIN aluno ON
			aluno.cod_aluno = artilharia.cod_aluno
			INNER JOIN time ON
			time.cod_time = artilharia.cod_time
			WHERE artilharia.cod_art = :cod_art';
	$cond = array('cod_art' => $cod);
	$dados = selecionar_dados($sql, $cond);
	return $dados[0];
}

function inserir_artilheiro($dados) {
	db_insert('artilharia', $dados);
}

function editar_artilheiro($dados, $cod) {
	$cond = array('cod_art' => $cod);
	db_update('artilharia', $dados, $cond);
}

function excluir_artilheiro($cod) {
	$cond = array('cod_art' => $cod);
	db_delete('artilharia', $cond);
}