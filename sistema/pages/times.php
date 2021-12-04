<?php

$titulo = array(
	'text' => 'Times',
	'icon' => 'fa fa-users'
);

$links = array(
	array(
		'label' => 'Novo time',
		'href' => PAG_NOVO_TIME,
		'icon' => 'fa fa-plus'
	)
);

$dados = listar_times();

$grid = array(
	'cols' => array(
		'Cód. Time',
		'Nome',
		'Professor',
		'Opções'
	),
	'rows' => $dados,
	'options' => array(
		array(
			'text' => 'Editar',
			'icon' => 'fa fa-edit',
			'class' => 'btn btn-success',
			'href' => PAG_EDT_TIME,
			'param' => 'echo $linha["cod_time"];'
		),
		array(
			'text' => 'Excluir',
			'icon' => 'fa fa-trash',
			'class' => 'btn btn-danger del',
			'href' => PAG_DEL_TIME,
			'param' => 'echo $linha["cod_time"];'
		)
	)
);

include './template/components/header.html';
include './template/components/list.html';
include './template/components/footer.html';