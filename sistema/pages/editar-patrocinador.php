<?php

if (isset($_POST['salvar'])) {
	
	$cod = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT);
	$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
	$img = filter_input(INPUT_POST, 'img', FILTER_SANITIZE_STRING);
	$link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_STRING);

	$dados = array(
		'titulo' => $titulo,
		'img' => $img,
		'link' => $link,
		'categoria' => 'patrocinador',
		'autor' => $_SESSION['USUARIO']['NOME']		
	);

	if ($cod != 0) {
		atualizar_conteudo_site($dados, $cod);
		header('Location: ' . PAG_APOIO_PATROCINADORES);
		exit();
	}
}

if (isset($_GET['cod'])) {
	
	$cod = filter_input(INPUT_GET, 'cod', FILTER_VALIDATE_INT);
	
	if ($cod != 0) {

		$patrocinador = dados_conteudo($cod);
		$codigo = $patrocinador['cod_conteudo'];
		$titulo = $patrocinador['titulo'];
		$img = $patrocinador['img'];
		$link = $patrocinador['link'];

		$titulo = 'Editar patrocinador';
		include './template/components/header.html';
		include './template/pages/form-patrocinador.html';
		include './template/components/footer.html';
	}
} else {
	header('Location: ' . PAG_APOIO_PATROCINADORES);
}