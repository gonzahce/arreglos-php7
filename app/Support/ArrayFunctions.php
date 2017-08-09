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

	#retrieving the las item function
	public static function last($array, $callback = null, $default = null){
		#check if callback exists
		if(is_null($callback)){
			#if array is empty return $default
			if(empty($array)){
				return $default;
			}
			return end($array);
		}
		#convert last item in the first
		#parametro TRUE to switch keys too
		#dd(array_reverse($array, true));

		return self::first(array_reverse($array, true), $callback, $default);
	}

	#retorna una array dependiendo de una condicional
	public static function where($array, $callback){

		return array_filter($array, $callback, ARRAY_FILTER_USE_BOTH);

	}

	#retorna una array dependiendo de una condicional
	public static function only($array, $key){

		return array_intersect_key($array, (array_flip((array) $key)));

	}

	public static function has($array, $key){

		if (is_null($key)){
			return false;
		}

		$keys = (array) $key;

		if($keys == []){
			return false;
		}

		foreach ($keys as $key) {
			# code...
		}

	}

}
