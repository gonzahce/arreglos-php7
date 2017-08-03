<?php

	require '../vendor/autoload.php';

	$usuario = [
		['nombre' => 'Jose', 'score' => 55],
		['nombre' => 'Luis', 'score' => 100],
		['nombre' => 'Carlos', 'score' => 400],
		['nombre' => 'Daniel', 'score' => 1],
	];

	dd(array_first($usuario, function($usuario, $key){
		return array_get($usuario, 'score') > 200;
	}));

?>
