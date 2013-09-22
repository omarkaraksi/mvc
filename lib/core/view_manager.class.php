<?php 


	class view_manager {

        private $_data =array() ;
        private $_layout;
		private $_zones =array();

		public function setData($data)
		{
			
			$this->_data = $data ;

		}
		public function getData()
		{
			return $this->_data;
		}
		public function assign($var,$cntn)
		{
			$this->_data[$var]=$cntn;
			
			
		}
		public function loadZones($data)
		{
			$layout =$this->getLayout();
			$PATH = (SERVER_ROOT .'/views/layouts/zones/'.$layout.'/');
			$WEBPATH = SITE_ROOT.'/'. WEB_FOLDER .'/views/layouts/zones/'.$layout.'/' ;
			$zones =scandir($PATH);
		    $zone =array();	
		   
		   

		    foreach ($zones as $key => $value) {
		    	ob_start();
		    	
		    if($value !='.' && $value !='..'){
		      include($PATH.basename($value, ".phtml").'.phtml');
		        extract($data);
   				$zone[basename($value, ".phtml")]= ob_get_contents();
   				ob_end_clean();
   				}
   			}
       		

       		$this->_zones=$zone;
       		return $zone;

		}
		public function renderView()
		{	
			$data = array();
			$data =$this->_data ;
			require_once(SERVER_ROOT .'/views/'.$this->getViewFolder().'/'.$this->getViewFile().'.phtml');
		}
		public function render()
		{	
			$data = array();
			$data =$this->_data ;
			$zones =$this->loadZones($data);
		    $view =$this->loadView($data);

			require_once(SERVER_ROOT .'/views/layouts/'.$this->getLayout().'.phtml');
			//require_once(SERVER_ROOT .'/views/'.$this->getViewFolder().'/'.$this->getViewFile().'.phtml');
		}
		// public function render()
		// {	
		// 	$data = array();
		// 	$data =$this->_data ;
		// 	require_once(SERVER_ROOT .'views/layouts/'.$this->getLayout());
		// }
		public function getLayout()
		{
			return $this->_layout;
		}
		public function setLayout($layout)
		{
				$this->_layout=$layout ;
		}
		public function getView()
		{
			return $this->_view ;
 		}
 		public function loadView($data)
		{	
			ob_start();
			
			include SERVER_ROOT .'/views/'.$this->getViewFolder().'/'.$this->getViewFile().'.phtml';
			extract($data);
			$view = ob_get_contents();
			ob_end_clean();
			//$view = (SITE_ROOT.'/'. WEB_FOLDER .'/views/'.$this->getViewFolder().'/'.$this->getViewFile().'.phtml');
			return $view;
			
 		}
 		
		public function setView($view)
		{
			$this->_view=$view ;
		}
		public function getViewFolder()
		{
			return $this->_viewFolder ;
 		}
		public function setViewFolder($viewFolder)
		{
			$this->_viewFolder=$viewFolder ;
		}
		public function getViewfile()
		{
			return $this->_viewFile ;
 		}
		public function setViewfile($viewFile)
		{
			$this->_viewFile=$viewFile ;
		}


	}


?>