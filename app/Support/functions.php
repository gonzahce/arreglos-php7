<?php

use App\Support\ArrayFunctions;

function array_get($array, $key, $default = null){

	return ArrayFunctions::get($array, $key, $default);

}

function array_first($array, $callback = null, $default = null){
	return ArrayFunctions::first($array, $callback, $default);
}

function array_last($array, $callback = null, $default = null){
	return ArrayFunctions::last($array, $callback, $default);
}

function array_where($array, $callback){
	return ArrayFunctions::where($array, $callback);
}

function array_only($array, $key){
	return ArrayFunctions::only($array, $key);
}

function array_has($array, $key){
	return ArrayFunctions::has($array, $key);
}
