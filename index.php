<?php 
	
    define('SITE_ROOT','http://locahost');
    define('SERVER_ROOT','/var/www/mvc');
    define('WEB_FOLDER','mvc/');
	$request = $_GET['page'];

  
    
	$parsed  =  parse_url( SITE_ROOT . '/' . WEB_FOLDER .'/'.$request, PHP_URL_PATH);  //explode('/',$request);


	require_once(SERVER_ROOT . '/lib/' . 'router.php');
	


?>