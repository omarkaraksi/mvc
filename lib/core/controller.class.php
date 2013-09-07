<?php
	
	class controller {

		public $_router ;
		public $_model ;
		public $_view ;
		public $_layout ;
		public $_renderer ;
		public function __construct($router)
		{	//var_dump($router);
			$this->_router= $router;

			$this->setLayout(LAYOUT);
			$this->_view =$this->_router->getAction();
			$layout=$this->getLayout(); 
			$view =$this->_view;
			$renderObj=   new view();
			$renderObj->setLayout($this->_layout);
			$renderObj->setView($view);
			$renderObj->setViewFolder($this->_router->getController());
			$renderObj->setViewFile($this->_router->getAction());
			$this->_renderer =$renderObj;
			//new users_model();
			;


		}

		public function setLayout($layout)
		{	
			$this->_layout = $layout ;
		}
		public  function getLayout()
		{		
		   return $this->_layout  ;
		}
		
	}


 ?>