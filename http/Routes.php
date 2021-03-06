<?php
	
	include 'Routers.class.php';

	$url = $_SERVER['REQUEST_URI'];

	// Spliting the url to get controller, function and parameter
	$url_split = explode("/", $url);

	// 3rd index holds the controller name
	//print_r($url_split);
	//exit();
	
	if(isset($url_split[1]) && $url_split[1] === "user" && isset($url_split[2]))
	{

		switch ($url_split[2]) 
		{
			case 'listUsers':
				isset($url_split[2]) ? Router::get('user', $url_split[2]) : Router::get('user');
				break;
			case 'create':
				isset($url_split[2]) ? Router::post('user', $url_split[2]) : Router::post('user');
				break;
			case 'details':
				isset($url_split[2]) ? Router::get('user', $url_split[2], $url_split[3]) : Router::get('user');
			case 'edit':
				(isset($url_split[2]) &&isset($url_split[3])) ? Router::post('user', $url_split[2], $url_split[3]) : Router::post('user', $url_split[2]);
			default:
				
				break;
		}
			
	}
	elseif ($url_split[1] == "ris" && isset($url_split[2])) {
		
		switch ($url_split[2]) {
			case 'create':
				isset($url_split[2]) ? Router::post('ris', $url_split[2]): Router::post('ris');
			break;
			case 'listRIS':
				isset($url_split[2]) ? Router::get('ris', $url_split[2]): Router::get('ris');
				break;
			default:
				
				break;
		}
	}
?>