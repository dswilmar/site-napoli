<?php

$titulo = array(
	'text' => 'Alunos',
	'icon' => 'fa fa-user'
);

$links = array(
	array(
		'label' => 'Novo aluno',
		'href' => PAG_NOVO_ALUNO,
		'icon' => 'fa fa-plus'
	)
);

$dados = listar_alunos();

$grid = array(
	'cols' => array(
		'Cód. Aluno',
		'Foto',
		'Nome',
		'Inscrição',
		'Opções'
	),
	'rows' => $dados,
	'options' => array(
		array(
			'text' => 'Editar',
			'icon' => 'fa fa-edit',
			'class' => 'btn btn-success',
			'href' => PAG_EDT_ALUNO,
			'param' => 'echo $linha["cod_aluno"];'
		),
		array(
			'text' => 'Excluir',
			'icon' => 'fa fa-trash',
			'class' => 'btn btn-danger del',
			'href' => PAG_DEL_ALUNO,
			'param' => 'echo $linha["cod_aluno"];'
		)
	)
);

include './template/components/header.html';
include './template/pages/list-alunos.html';
include './template/components/footer.html';