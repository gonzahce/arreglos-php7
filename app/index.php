<?php

	require '../vendor/autoload.php';

	$usuario = [
		'nombre' => 'Kiik',
		'temas' => [
			['title' => 'tema uno'],
			['title' => 'tema dos']
		],
		'pais' => [
			'nombre' => 'vzla',
			'bandera' => [
				'url' => 'ruta.png',
				'tamano' => 32
			]
		]
	];

	dd(array_get($usuario, 'pais.bandera.url'));

?>
