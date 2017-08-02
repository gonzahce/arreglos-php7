<?php

use App\Support\ArrayFunctions;

function array_get($array, $key, $default = null){

	return ArrayFunctions::get($array, $key, $default);

}
