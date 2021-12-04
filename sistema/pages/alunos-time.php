<?php

if (isset($_POST['adicionar_aluno'])) {
	$cod_aluno = filter_input(INPUT_POST, 'cod_aluno', FILTER_VALIDATE_INT);
	$cod_time = filter_input(INPUT_POST, 'cod_time', FILTER_VALIDATE_INT);
	

	if (($cod_aluno !== 0) && ($cod_time !== 0)) {
		inserir_aluno_time($cod_aluno, $cod_time);		
	}
}

if (isset($_GET['cod_time'])) {
	
	$cod_time = filter_input(INPUT_GET, 'cod_time', FILTER_VALIDATE_INT);
	
	if ($cod_time != 0) {

		$time = dados_time($cod_time);
		$alunos = listar_alunos_time($cod_time);
		$categoria = dados_categoria($time['cod_categoria']);		
		
		include './template/components/header.html';
		include './template/pages/alunos-time.html';
		include './template/components/footer.html';
	}
} else {
	header('Location: ' . PAG_TIMES);
}