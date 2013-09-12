<?php 
	require_once('config.php');
	

	$request = $_SERVER['REQUEST_URI'];

   
    


	$parsed  =  parse_url( $request, PHP_URL_PATH);  //explode('/',$request);
	require_once(SERVER_ROOT .'/'.'lib/core'.'/'.'autoloader.class.php');
	//new application();
	
	//new application();
	//die(s);
	//require_once(SERVER_ROOT . '/lib/' . 'application.class.php');
	 
	//$app = new application();

	//die();


 		autoloader::custom_loader(array( 

					SERVER_ROOT.'/'.'lib/Form/'
				   
				    ));

	

	$router = new router($parsed);
	
	// var_dump($router);
	

 
//autoloading


?>