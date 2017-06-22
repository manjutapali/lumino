<?php

	include 'controllers/user.php';
	
	class Router
	{
		public static function get($controller, $function="", $param="")
		{

			//echo "Loading the ". $controller ." controller, calling " .$function. "<br>";

			$obj = new $controller;
			if(!empty($function))
			{

				empty($param) ? $obj->{$function}() : $obj->{$function}($param);
			}
		}

		public static function post($controller, $function, $param)
		{

		}

		public static function update($controller, $function, $param)
		{

		}
	}
?>