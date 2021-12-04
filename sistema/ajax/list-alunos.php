<?php

include '../conf/config.php';
include '../incs/includes.php';

$json_alunos = array();
$nome = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
$alunos = listar_alunos_por_nome($nome);

foreach ($alunos as $a) {
	$aluno = array(
		'value' => $a['cod_aluno'],
		'text' => $a['nome']
	);

	array_push($json_alunos, $aluno);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($json_alunos);