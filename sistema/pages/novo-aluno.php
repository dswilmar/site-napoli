<?php

if (isset($_POST['salvar'])) {
	
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
	
	inserir_aluno($dados);
	header('Location: ' . PAG_ALUNOS);
	exit();
}

$cod_escola = 0;
$nome = '';
$foto = '';
$rg = '';
$dt_nasc = '';
$sexo = '';
$nome_pai = '';
$nome_mae = '';
$cep = '';
$endereco = '';
$numero = '';
$bairro = '';
$numero = '';
$cidade = '';
$estado = '';
$telefone = '';
$celular = '';

$titulo = 'Novo aluno';
include './template/components/header.html';
include './template/pages/form-aluno.html';
include './template/components/footer.html';