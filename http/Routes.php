<?php
	
	include 'Routers.class.php';

	$url = $_SERVER['REQUEST_URI'];

	// Spliting the url to get controller, function and parameter
	$url_split = explode("/", $url);

	// 3rd index holds the controller name

	if(isset($url_split[3]))
	{
		switch ($url_split[3]) 
		{
			case 'user':
				isset($url_split[4]) ? Router::get('user', $url_split[4]) : Router::get('user');
				break;
			
			default:
				
				break;
		}
	}
?>