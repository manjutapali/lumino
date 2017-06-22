<?php
	
	class Helpers
	{
		public static function Redirect($url, $statuscode = 303)
		{
			header('Location: ' . $url, true, $statusCode);
   			die();
		}
	}
?>