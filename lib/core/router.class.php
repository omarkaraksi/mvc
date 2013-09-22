<?php


class router {

	private $_request ;
    private $_controller ;
    private $_route ;
    private $_action ;
    private $_params ;
    private $_url ;

 	public function __construct($request){
  		$parsed = parse_url( $request, PHP_URL_PATH);

		$this->setRequest($parsed);
		$this->setUrl($request);
		$this->route();
		

	}
	private function route()
	{	
		
		$request = $this->getRequest();


		$getVars= array();

		// 
		 $url=str_replace( '&', '/', str_replace('?', '/', str_replace('=', '/', $this->getUrl())));
	
		$request=rtrim(trim($url,'/') ,'/');
		//var_dump($request);
		$request=explode('/', $request);
		
		foreach ($request as $argument)
		{

		    $getVars[] = $argument;
		}
		

		 //str_replace( '&', '/', str_replace('?', '/', str_replace('=', '/', $_GET))) 
		 $this->setController($getVars[1]) ;
		 $this->setAction($getVars[2]);
			
		 $this->setParams(array_slice($request,3));
		 			
		
		
		 $this->setRoute( $getVars) ;
		// var_dump($this->getRoute());
		 //$this->init();
		  //return $this->getRoute();
		// $target = SERVER_ROOT . '/controllers/' . $this->getController() .'_controller'. '.php' ;
		
				//get target
				// if (file_exists($target))
				// {
				//     include_once($target);

				//     //modify page to fit naming convention
				//     $class =  $this->getController() . '_controller';

				//     //instantiate the appropriate class
				//     if (class_exists($class))
				//     {	$parent =get_parent_class($class);

				//     	if(method_exists($class, $this->getAction())){
				// 				$this->init();
				//     		}
				//     		else{
				//     			;
				//     		}
				       
				       
				//     }
				//     else
				//     {
				//         //did we name our class correctly?

				//         die('class does not exist!');
				//     }
				// }
				// else
				// {
				// 	$this->setController('main');

				//     //can't find the file in 'controllers'! 
				//     die('page does not exist!');
				// }
;
		 return $this->getRoute();
	}
	public function setAction($action)
	{	
		$method = ( $action == '') ? 'main' : $action ;
		$this->_action = $method; 
	} 
	
	public function getAction()
	{	 
		return $this->_action; 
	} 

	public function setController($controller)
	{	

		 $cntr = ( $controller == '') ? 'index' : $controller ;
		
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

	public function getUrl()
	{
		return $this->_url; 
	}

	private function setUrl($req)
	{		
		$this->_url =$req ;
	}

	public function getRoute()
	{
		return $this->_route; 
	}
	public function setParams($params=array()){

		for($i=0;$i<count($params);$i++){
			
			$this->_params[$params[$i]]=$params[$i+1] ;
			if(!$params[$i++]!='' ){
				break;
			}
		}
		
	}
	public function setParam($param,$value){
		$this->_params[$param]=$value ;
	}


	public function getParams(){
		return $this->_params;
	}
	public function getParam($param){
		return $this->_params[$param];
	}
	private function setRoute($route)
	{	
		$route=array();
  		
  		$route['controller']= $this->getController() ;
  		$route['action']=$this->getAction() ;
  		$route['params']=$this->getParams();
		$this->_route =$route ;
	}

	// public function init()
	// {	
	// 	$dispatcher = new dispatcher($this->getRoute());

	// 	$dispatcher->
	// 	var_dump($dispatcher->getRoute());
	// 	$action = $this->getAction();
	// 	$controller= $this->getController(). '_controller' ;
	// 	//print_r($this);
	// 	// print_r($this->getParam('param2'));
	// 	$controller =new $controller($this);

	// 	$controller->$action();
	// }

}





 ?> 