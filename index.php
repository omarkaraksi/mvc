<?php 
	
    define('SITE_ROOT','http://locahost');
    define('SERVER_ROOT',$_SERVER['DOCUMENT_ROOT'].'/'.'mvc');
    define('WEB_FOLDER','mvc');
	$request = $_GET['page'];

  
    
	$parsed  =  parse_url( SITE_ROOT . '/' . WEB_FOLDER .'/'.$request, PHP_URL_PATH);  //explode('/',$request);


	require_once(SERVER_ROOT . '/lib/' . 'router.class.php');
	require_once(SERVER_ROOT . '/lib/' . 'controller.class.php');
	
	$router = new router($parsed);
	///$router =$router->getRoute();
	// var_dump($router->getController());

	$target = SERVER_ROOT . '/controllers/' . $router->getController() .'_controller'. '.php';
	
				//get target
				if (file_exists($target))
				{
				    include_once($target);

				    //modify page to fit naming convention
				    $class =  $router->getController() . '_controller';

				    //instantiate the appropriate class
				    if (class_exists($class))
				    {	$parent =get_parent_class($class);

				    	
				       $router->init();
				    }
				    else
				    {
				        //did we name our class correctly?
				        die('class does not exist!');
				    }
				}
				else
				{
				    //can't find the file in 'controllers'! 
				    die('page does not exist!');
				}

				//once we have the controller instantiated, execute the default function
				//pass any GET varaibles to the main method
						//$action = $router->getAction();
						// $controller
				       // $controller->$action()


?>