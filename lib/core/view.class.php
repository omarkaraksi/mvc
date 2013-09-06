<?php 


	class view {

        private $_data =array() ;
        private $_layout;
		

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

		public function render()
		{	
			$data = array();
			$data =$this->_data ;
			require_once(SERVER_ROOT .'/views/layouts/'.$this->getLayout().'.phtml');
			require_once(SERVER_ROOT .'/views/'.$this->getViewFolder().'/'.$this->getViewFile().'.phtml');
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