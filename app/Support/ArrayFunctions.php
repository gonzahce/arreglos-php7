<?php

namespace App\Support;

use ArrayAccess;

class ArrayFunctions{

	public static function accessible($value)
	{
		return is_array($value) ||$value instanceof ArrayAccess;
	}

	public static function exists($array, $key){
		if($array instanceof ArrayAccess){
			return $array->offsetExists($key);
		}
		return array_key_exists($key, $array);
	}

	public static function get($array, $key, $default = null){

		if(!self::accessible($array)){
			return $default;
		}

		if(is_null($key)){
			return $array;
		}

		if(self::exists($array, $key)){
			return $array[$key];
		}

		foreach (explode('.', $key) as $segment) {
			if(self::accessible($array) && self::exists($array, $segment)){
				$array = $array[$segment];
			}else{
				return $default;
			}
		}
		return $array;
	}
}
