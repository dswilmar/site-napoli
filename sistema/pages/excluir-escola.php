<?php
if (isset($_GET['cod'])) {
	$cod = filter_input(INPUT_GET, 'cod', FILTER_VALIDATE_INT);
	if ($cod != 0) {
		excluir_escola($cod);
		header('Location: ' . PAG_ESCOLAS);
	}
} else {
	header('Location: ' . PAG_ESCOLAS);
}