<?php

if (isset($_POST['salvar'])) {
	$cod = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$data_ini = filter_input(INPUT_POST, 'data_ini', FILTER_SANITIZE_STRING);
	$data_fim = filter_input(INPUT_POST, 'data_fim', FILTER_SANITIZE_STRING);
	$regulamento = filter_input(INPUT_POST, 'regulamento', FILTER_SANITIZE_STRING);
	$exibir = filter_input(INPUT_POST, 'exibir', FILTER_SANITIZE_STRING);
	$cod_categoria = filter_input(INPUT_POST, 'cod_categoria', FILTER_VALIDATE_INT);

	$dados = array(
		'nome' => $nome,
		'data_ini' => $data_ini,
		'data_fim' => $data_fim,
		'regulamento' => $regulamento,
		'exibir' => $exibir,
		'cod_categoria' => $cod_categoria
	);

	atualizar_dados_campeonato($dados, $cod);
	header('Location: ' . PAG_CAMPEONATOS);
	exit();
}

if (isset($_GET['cod'])) {
	
	$cod = filter_input(INPUT_GET, 'cod', FILTER_VALIDATE_INT);
	
	if ($cod != 0) {

		$categorias = listar_categorias();

		$campeonato = dados_campeonato($cod);
		$codigo = $campeonato['cod_campeonato'];
		$nome = $campeonato['nome'];
		$data_ini = $campeonato['data_ini'];
		$data_fim = $campeonato['data_fim'];
		$regulamento = $campeonato['regulamento'];
		$exibir = $campeonato['exibir'];
		$cod_categoria = $campeonato['cod_categoria'];

		$titulo = 'Editar campeonato';
		include './template/components/header.html';
		include './template/pages/form-campeonato.html';
		include './template/components/footer.html';
	}
} else {
	header('Location: ' . PAG_CATEGORIAS);
}