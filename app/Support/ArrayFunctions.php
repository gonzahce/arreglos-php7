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

	public static function first($array, $callback = null, $default = null){
		#check if callback exists
		if(is_null($callback)){
			#if array is empty return $default
			if(empty($array)){
				return $default;
			}
			foreach ($array as $item) {
				return $item;
			}
		}

		foreach ($array as $key => $value) {
			if(call_user_func($callback, $value, $key)){
				return $value;
			}
		}
		return $default;
	}
}
