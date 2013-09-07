<?php 
	

	

    
    define('SITE_ROOT','http://locaLhost');
    define('SERVER_ROOT',$_SERVER['DOCUMENT_ROOT'].'/'.'mvc');
    define('WEB_FOLDER','mvc');
    define('PUBLIC_F','/'.WEB_FOLDER.'/public/assets/' );
    define('LAYOUT','layout');


    //DB Configurtion 

    define('DB_DRIVER' , 'pdo_mysql' ); 
    define('HOST' , 'locahost'); 
    define('DATABASE' , 'albums' ); 
    define('USER' , 'karaksi'); 
    define('PASS' , '123456'); 

	$request = $_SERVER['REQUEST_URI'];

  ;	
    
	$parsed  =  parse_url( $request, PHP_URL_PATH);  //explode('/',$request);

	
	require_once(SERVER_ROOT . '/lib/' . 'application.class.php');
	
	$app = new application();

	$router = new router($parsed);
	// var_dump($router);
	

 
//autoloading


?>