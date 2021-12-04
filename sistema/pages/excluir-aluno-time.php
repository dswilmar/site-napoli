<?php
if (isset($_GET['cod_aluno_time'])) {
	$cod_aluno_time = filter_input(INPUT_GET, 'cod_aluno_time', FILTER_VALIDATE_INT);
	if ($cod_aluno_time != 0) {
		$aluno_time = dados_aluno_time($cod_aluno_time);
		$cod_time = $aluno_time['cod_time'];
		excluir_aluno_time($cod_aluno_time);
		header('Location: ' . PAG_ALUNOS_TIME . $cod_time);
	}
} else {
	header('Location: ' . PAG_TIMES);
}