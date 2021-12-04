<?php

$titulo = array(
	'text' => 'Campeonatos',
	'icon' => 'fa fa-trophy'
);

$links = array(
	array(
		'label' => 'Novo campeonato',
		'href' => PAG_NOVO_CAMPEONATO,
		'icon' => 'fa fa-plus'
	)
);

$dados = listar_campeonatos();

$grid = array(
	'cols' => array(
		'Cód. Campeonato',
		'Nome',		
		'Opções'
	),
	'rows' => $dados,
	'options' => array(
		array(
			'text' => 'Editar',
			'icon' => 'fa fa-edit',
			'class' => 'btn btn-success',
			'href' => PAG_EDT_CAMPEONATO,
			'param' => 'echo $linha["cod_campeonato"];'
		),
		array(
			'text' => 'Excluir',
			'icon' => 'fa fa-trash',
			'class' => 'btn btn-danger del',
			'href' => PAG_DEL_CAMPEONATO,
			'param' => 'echo $linha["cod_campeonato"];'
		)
	)
);

include './template/components/header.html';
include './template/components/list.html';
include './template/components/footer.html';