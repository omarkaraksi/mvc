<?php 
	
    define('SITE_ROOT','http://locahost');
    define('SERVER_ROOT',$_SERVER['DOCUMENT_ROOT'].'/'.'mvc');
    define('WEB_FOLDER','mvc');
    define('LAYOUT','layout');
	$request = $_SERVER['REQUEST_URI'];

  ;	
    
	$parsed  =  parse_url( $request, PHP_URL_PATH);  //explode('/',$request);

	
	require_once(SERVER_ROOT . '/lib/' . 'application.class.php');
	
	$app = new application();

	$router = new router($parsed);
	// var_dump($router);
	 
				

?>