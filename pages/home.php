<?php

$campeonatos = listar_campeonatos_ativos();
$patrocinadores = get_conteudo_site('patrocinador');

include './template/header.html';
include './template/home.html';
include './template/footer.html';