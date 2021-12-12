<?php

$titulo = array(
	'text' => 'Apoio/Patrocinadores',
	'icon' => 'fa fa-handshake-o'
);

$links = array(
	array(
		'label' => 'Novo patrocinador',
		'href' => PAG_NOVO_PATROCINADOR,
		'icon' => 'fa fa-plus'
	)
);

$dados = list_conteudo_site('patrocinador');

$grid = array(
	'cols' => array(
		'Cód.',
		'Título',
		'Imagem',
		'Opções'
	),
	'rows' => $dados,
	'options' => array(
		array(
			'text' => 'Editar',
			'icon' => 'fa fa-edit',
			'class' => 'btn btn-success',
			'href' => PAG_EDT_PATROCINADOR,
			'param' => 'echo $linha["cod_conteudo"];'
		),
		array(
			'text' => 'Excluir',
			'icon' => 'fa fa-trash',
			'class' => 'btn btn-danger del',
			'href' => PAG_DEL_PATROCINADOR,
			'param' => 'echo $linha["cod_conteudo"];'
		)
	)
);

include './template/components/header.html';
include './template/components/list.html';
include './template/components/footer.html';