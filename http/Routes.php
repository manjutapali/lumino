<?php
	
	include 'Routers.class.php';

	$url = $_SERVER['REQUEST_URI'];

	// Spliting the url to get controller, function and parameter
	$url_split = explode("/", $url);

	// 3rd index holds the controller name

	if(isset($url_split[4]))
	{
		switch ($url_split[4]) 
		{
			case 'listUsers':
				isset($url_split[4]) ? Router::get('user', $url_split[4]) : Router::get('user');
				break;
			case 'create':
				isset($url_split[4]) ? Router::post('user', $url_split[4]) : Router::post('user');
				break;
			case 'details':
				isset($url_split[4]) ? Router::get('user', $url_split[4], $url_split[5]) : Router::get('user');

			case 'edit':
				(isset($url_split[4]) &&isset($url_split[5])) ? Router::post('user', $url_split[4], $url_split[5]) : Router::post('user', $url_split[4]);
			default:
				
				break;
		}
	}
?>