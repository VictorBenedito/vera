<?php
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);

	$array = array(1, "ola", 1, "mundo", "ola");
	array_unique($array);
?>