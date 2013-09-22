<?php 
	require_once('config.php');
	

	$request = $_SERVER['REQUEST_URI'];

   
    


	$parsed  = $_SERVER['REQUEST_URI'] ;  //explode('/',$request);
	require_once(SERVER_ROOT .'/'.'lib/core'.'/'.'autoloader.class.php');
	//new application();
	
	//new application();
	//die(s);
	//require_once(SERVER_ROOT . '/lib/' . 'application.class.php');
	 
	//$app = new application();

	//die();


 		autoloader::custom_loader(array( 

					SERVER_ROOT.'/'.'lib/Form/',
					SERVER_ROOT.'/'.'/views/',
					SERVER_ROOT.'/'.'/views/layouts/',

				   
				    ));

	

	$router = new router($parsed);
	$runner =new dispatcher($router);
	$runner->init();
	
	// var_dump($router);
	

 
//autoloading


?>