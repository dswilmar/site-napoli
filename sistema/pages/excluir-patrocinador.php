<?php
if (isset($_GET['cod'])) {
	$cod = filter_input(INPUT_GET, 'cod', FILTER_VALIDATE_INT);
	if ($cod != 0) {
		excluir_conteudo_site($cod);
		header('Location: ' . PAG_APOIO_PATROCINADORES);
	}
} else {
	header('Location: ' . PAG_APOIO_PATROCINADORES);
}