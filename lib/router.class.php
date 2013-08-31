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

		foreach ($request as $argument)
		{
		    //split GET vars along '=' symbol to separate variable, values
		   

		    $getVars[] = $argument;
		}

		

		 $this->setController($getVars[2]) ;
		 $this->setAction($getVars[3]);
		 $this->setRoute( $getVars) ;

		return $this->getRoute();
	}
	private function setAction($action)
	{
		$this->_action = $action; 
	} 
	
	public function getAction()
	{
		return $this->_action; 
	} 
	private function setController($controller)
	{
		$this->_controller = $controller; 
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
  		
  		$route['controller']=$this->getController();
  		$route['action']=$this->getAction() ;
		$this->_route =$route ;
	}

	public function init()
	{
		$action = $this->getAction();
		$controller= $this->getController(). '_controller';
		//print_r($this);
		
		$controller =new $controller($this);

		$controller->$action();
	}

}





 ?> 