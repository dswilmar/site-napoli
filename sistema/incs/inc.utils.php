<?php

function alert($icon, $titulo, $tipo, $msg, $link) {

    include './template/components/header.html';
    include './template/components/msg.html';
    include './template/components/footer.html';

}

function format_cpf_cnpj($cpfCnpj) {
	$cpfCnpj = str_replace('.', '', $cpfCnpj);
	$cpfCnpj = str_replace('-', '', $cpfCnpj);
	$cpfCnpj = str_replace('/', '', $cpfCnpj);
	return str_pad($cpfCnpj, 14, '0', STR_PAD_LEFT);
}

function limpa_str($str) {
	$str = str_replace('.', '', $str);
	$str = str_replace('-', '', $str);
	$str = str_replace('/', '', $str);
	return $str;	
}

function redirect($pag) {
	header('Location: ' . $pag);
}

function start_exec() {
	$time = microtime(TRUE);
	return $time;
}

function end_exec($startTime) {
	$finalTime = microtime(TRUE);
	$execTime = $finalTime - $startTime;
	echo number_format($execTime, 6) . ' s';
}