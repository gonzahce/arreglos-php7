<?php

	require '../vendor/autoload.php';
	/*
	$usuario = [
		['nombre' => 'Jose', 'score' => 55],
		['nombre' => 'Luis', 'score' => 100],
		['nombre' => 'Carlos', 'score' => 400],
		['nombre' => 'Daniel', 'score' => 1],
	];
	*/

	#dd(array_last($usuario));

	/*
	#getting the callback to reverse
	dd(array_last($usuario, function($usuario, $key){
		return array_get($usuario, 'score') == 55;
	}));
	

	dd(array_where($usuario, function($usuario, $key){
		return array_get($usuario, 'score') >= 20;
	}));
	*/

	$usuario = [
		'nombre' => 'carlos',
		'temas' => [
			['title' => 'tema uno'],
			['title' => 'tema dos'],
		],
		'pais' => [
			'nombre' => 'vzla',
			'bandera' => [
				'url' => 'ruta.png',
				'tamano' => 32
			]
		]
	];

	dd(array_only($usuario, ['nombre', 'pais']));

?>
