<?php

$titulo = array(
	'text' => 'Artilharia',
	'icon' => 'fa fa-futbol-o'
);

$links = array(
	array(
		'label' => 'Novo artilheiro',
		'href' => PAG_NOVO_ARTILHEIRO,
		'icon' => 'fa fa-plus'
	)
);

$dados = listar_artilheiros();

$grid = array(
	'cols' => array(
		'Cód. Artilharia',
		'Aluno',
		'Time',
		'Cameponato',
		'Gols',		
		'Opções'
	),
	'rows' => $dados,
	'options' => array(
		array(
			'text' => 'Editar',
			'icon' => 'fa fa-edit',
			'class' => 'btn btn-success',
			'href' => PAG_EDT_ARTILHEIRO,
			'param' => 'echo $linha["cod_art"];'
		),
		array(
			'text' => 'Excluir',
			'icon' => 'fa fa-trash',
			'class' => 'btn btn-danger del',
			'href' => PAG_DEL_ARTILHEIRO,
			'param' => 'echo $linha["cod_art"];'
		)
	)
);

include './template/components/header.html';
include './template/components/list.html';
include './template/components/footer.html';