<?php

class dispatcher {

	private $_route ;	
	public  $router ;
	public function __construct($router)
	{	
		$this->router=$router;
		$this->setRoute($router->getRoute());


		
	}
	public function validateRoute()
	{	$router=$this->router;

		$route =$this->getRoute();
		$file =SERVER_ROOT . '/controllers/' . $route['controller'] .'_controller'. '.php' ;
		$class =  $route['controller'] .'_controller';
		$method = $router->getAction(); ;
		
		if(file_exists($file)){
			include_once($file);
			//var_dump($router);
			$tester= new ReflectionClass($class);
			//var_dump($tester->hasMethod($method));
				if(file_exists( $file) && class_exists( $class) && $tester->hasMethod($method) ){
					
					$router->setController($class);
					$router->setAction($method);
					//print 'Done';
					return true;

				}elseif(file_exists(  $file) && class_exists( $class) && !$tester->hasMethod($method)){
					
					$router->setController($class);

					$router->setAction('main');
					$method = $router->getAction();

					if($this->validateRoute())
					{
						return true	;
					}else{
						print "Page Doesn't Exist";
						return false ;
					
					}
					//return false;
				}elseif(file_exists(  $file) && !class_exists( $class) ){

						print "Page Handler Doesn't Exist";

						return false ;
				}else{

						print "File Doesnt Exist";
		;					return false ;
				}



		}else{
			print "File Doesnt Existss";
;					return false ;
		}

		
	} 
   private function setRoute($route)
   {
   		$this->_route=$route;
   }
   function getRoute(){

   		return $this->_route;
   }

	public function init()
	{	$router=$this->router;
		if($this->validateRoute()){

			$action = $router->getAction();
			
			
			$controller = $router->getController() ;
			

			
			//var_dump($controller);

			
			//var_dump($p);
			$controller =new $controller($router);
			$controller->$action();
			
		}
		
		//print_r($this);
		// print_r($this->getParam('param2'));
		

		
	}

}
 ?>