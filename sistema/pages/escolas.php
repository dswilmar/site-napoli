<?php

$titulo = array(
	'text' => 'Escolas',
	'icon' => 'fa fa-flag'
);

$links = array(
	array(
		'label' => 'Nova escola',
		'href' => PAG_NOVA_ESCOLA,
		'icon' => 'fa fa-plus'
	)
);

$dados = listar_escolas();

$grid = array(
	'cols' => array(
		'Cód. Escola',
		'Nome',		
		'Opções'
	),
	'rows' => $dados,
	'options' => array(
		array(
			'text' => 'Editar',
			'icon' => 'fa fa-edit',
			'class' => 'btn btn-success',
			'href' => PAG_EDT_ESCOLA,
			'param' => 'echo $linha["cod_escola"];'
		),
		array(
			'text' => 'Excluir',
			'icon' => 'fa fa-trash',
			'class' => 'btn btn-danger del',
			'href' => PAG_DEL_ESCOLA,
			'param' => 'echo $linha["cod_escola"];'
		)
	)
);

include './template/components/header.html';
include './template/components/list.html';
include './template/components/footer.html';