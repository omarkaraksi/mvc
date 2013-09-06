<?php


class router {

	private $_request ;
    private $_controller ;
    private $_route ;
    private $_action ;
	public function __construct($request){
  		
		$this->setRequest($request);
		$this->dispatch();
		

	}
	private function dispatch()
	{	
		
		$request = $this->getRequest();


		$getVars= array();
		$request=explode('/', $request);
		//var_dump($request);
		foreach ($request as $argument)
		{
		    //split GET vars along '=' symbol to separate variable, values
		   

		    $getVars[] = $argument;
		}

		

		 $this->setController($getVars[2]) ;
		 $this->setAction($getVars[3]);
		 $this->setRoute( $getVars) ;
		 //$this->init();
		  //return $this->getRoute();
		 $target = SERVER_ROOT . '/controllers/' . $this->getController() .'_controller'. '.php' ;
		
				//get target
				if (file_exists($target))
				{
				    include_once($target);

				    //modify page to fit naming convention
				    $class =  $this->getController() . '_controller';

				    //instantiate the appropriate class
				    if (class_exists($class))
				    {	$parent =get_parent_class($class);

				    	
				       $this->init();
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
;
		 return $this->getRoute();
	}
	private function setAction($action)
	{	
		$method = ( $action == '') ? 'main' : $action ;
		$this->_action = $method; 
	} 
	
	public function getAction()
	{	 
		return $this->_action; 
	} 
	private function setController($controller)
	{	 $cntr = ( $controller == '') ? 'index' : $controller ;
		
		$this->_controller = $cntr;
	} 
	
	public function getController()
	{
		return $this->_controller; 
	} 
	public function getRequest()
	{
		return $this->_request; 
	}

	private function setRequest($req)
	{		
		$this->_request =$req ;
	}

	public function getRoute()
	{
		return $this->_route; 
	}

	private function setRoute($route)
	{	
		$route=array();
  		
  		$route['controller']= $this->getController() ;
  		$route['action']=$this->getAction() ;
		$this->_route =$route ;
	}

	public function init()
	{
		$action = $this->getAction();
		$controller= $this->getController(). '_controller' ;
		//print_r($this);
		
		$controller =new $controller($this);

		$controller->$action();
	}

}





 ?> 