<?php

function get_conteudo_site($categoria) {
	$cond = array('categoria' => $categoria);
	$conteudo = db_get('conteudo_site', $cond);
	return $conteudo;
}