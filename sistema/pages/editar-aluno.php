<?php

if (isset($_POST['salvar'])) {
	$cod = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$foto = filter_input(INPUT_POST, 'foto', FILTER_SANITIZE_STRING);
	$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
	$dt_nasc = filter_input(INPUT_POST, 'dt_nasc', FILTER_SANITIZE_STRING);
	$nome_pai = filter_input(INPUT_POST, 'nome_pai', FILTER_SANITIZE_STRING);
	$nome_mae = filter_input(INPUT_POST, 'nome_mae', FILTER_SANITIZE_STRING);
	$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
	$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
	$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
	$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
	$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
	$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
	$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
	$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);

	$dados = array(
		'nome' => $nome,
		'foto' => $foto,
		'dt_nasc' => $dt_nasc,
		'rg' => $rg,
		'nome_pai' => $nome_pai,
		'nome_mae' => $nome_mae,
		'sexo' => $sexo,
		'cep' => $cep,
		'endereco' => $endereco,
		'numero' => $numero,
		'bairro' => $bairro,
		'cidade' => $cidade,
		'estado' => $estado,
		'telefone' => $telefone,
		'celular' => $celular,
		'ativo' => 'S'
	);

	if ($cod != 0) {
		atualizar_dados_aluno($dados, $cod);
		header('Location: ' . PAG_ALUNOS);
		exit();
	}
}

if (isset($_GET['cod'])) {
	
	$cod = filter_input(INPUT_GET, 'cod', FILTER_VALIDATE_INT);
	
	if ($cod != 0) {
		$codigo = $cod;
		$aluno = dados_aluno($cod);		
		$nome = $aluno['nome'];
		$foto = $aluno['foto'];
		$rg = $aluno['rg'];
		$dt_nasc = $aluno['dt_nasc'];
		$sexo = $aluno['sexo'];
		$nome_pai = $aluno['nome_pai'];
		$nome_mae = $aluno['nome_mae'];
		$cep = $aluno['cep'];
		$endereco = $aluno['endereco'];
		$numero = $aluno['numero'];
		$bairro = $aluno['bairro'];
		$numero = $aluno['numero'];
		$cidade = $aluno['cidade'];
		$estado = $aluno['estado'];
		$telefone = $aluno['telefone'];
		$celular = $aluno['celular'];

		$titulo = 'Editar aluno';
		include './template/components/header.html';
		include './template/pages/form-aluno.html';
		include './template/components/footer.html';
	}
} else {
	header('Location: ' . PAG_CATEGORIAS);
}