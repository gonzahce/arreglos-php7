<?php

use App\Support\ArrayFunctions;

function array_get($array, $key, $default = null){

	return ArrayFunctions::get($array, $key, $default);

}

function array_first($array, $callback = null, $default = null){
	return ArrayFunctions::first($array, $callback, $default);
}
