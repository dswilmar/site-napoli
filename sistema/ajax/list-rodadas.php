<?php

include '../conf/config.php';
include '../incs/includes.php';

$json_rodadas = array();
$cod_campeonato = filter_input(INPUT_GET, 'cod_campeonato', FILTER_VALIDATE_INT);
$rodadas = listar_rodadas_campeonato($cod_campeonato);

foreach ($rodadas as $r) {
	$rodada = array(
		'value' => $r['cod_rodada'],
		'text' => $r['descr']
	);

	array_push($json_rodadas, $rodada);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($json_rodadas);