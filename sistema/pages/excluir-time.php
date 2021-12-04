<?php
if (isset($_GET['cod'])) {
	$cod = filter_input(INPUT_GET, 'cod', FILTER_VALIDATE_INT);
	if ($cod != 0) {
		excluir_time($cod);
		header('Location: ' . PAG_TIMES);
	}
} else {
	header('Location: ' . PAG_TIMES);
}