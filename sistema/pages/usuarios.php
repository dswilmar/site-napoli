<?php

$titulo = array(
	'text' => 'Usuários',
	'icon' => 'fa fa-user'
);

$links = array(
	array(
		'label' => 'Novo usuário',
		'href' => PAG_NOVO_USUARIO,
		'icon' => 'fa fa-plus'
	)
);

$dados = listar_usuarios();

$grid = array(
	'cols' => array(
		'Cód. Usuário',
		'Nome',
		'Login',
		'Opções'
	),
	'rows' => $dados,
	'options' => array(
		array(
			'text' => 'Editar',
			'icon' => 'fa fa-edit',
			'class' => 'btn btn-success',
			'href' => PAG_EDT_USUARIO,
			'param' => 'echo $linha["cod_usuario"];'
		),
		array(
			'text' => 'Trocar senha',
			'icon' => 'fa fa-key',
			'class' => 'btn btn-danger',
			'href' => PAG_SENHA_USUARIO,
			'param' => 'echo $linha["cod_usuario"];'
		)
	)
);

include './template/components/header.html';
include './template/components/list.html';
include './template/components/footer.html';