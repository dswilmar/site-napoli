<?php

include '../conf/config.php';
include '../incs/includes.php';

$json_times = array();
$time = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
$times = listar_times_por_nome($time);

foreach ($times as $t) {
	$aluno = array(
		'value' => $t['cod_time'],
		'text' => $t['nome']
	);

	array_push($json_times, $aluno);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($json_times);