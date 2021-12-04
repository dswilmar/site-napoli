<?php

$titulo = array(
	'text' => 'Categorias',
	'icon' => 'fa fa-tags'
);

$links = array(
	array(
		'label' => 'Nova categoria',
		'href' => PAG_NOVA_CATEGORIA,
		'icon' => 'fa fa-plus'
	)
);

$dados = listar_categorias();

$grid = array(
	'cols' => array(
		'Cód. Categoria',
		'Nome',		
		'Opções'
	),
	'rows' => $dados,
	'options' => array(
		array(
			'text' => 'Editar',
			'icon' => 'fa fa-edit',
			'class' => 'btn btn-success',
			'href' => PAG_EDT_CATEGORIA,
			'param' => 'echo $linha["cod_categoria"];'
		),
		array(
			'text' => 'Excluir',
			'icon' => 'fa fa-trash',
			'class' => 'btn btn-danger del',
			'href' => PAG_DEL_CATEGORIA,
			'param' => 'echo $linha["cod_categoria"];'
		)
	)
);

include './template/components/header.html';
include './template/components/list.html';
include './template/components/footer.html';