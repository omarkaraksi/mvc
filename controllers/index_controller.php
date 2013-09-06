<?php 
 class index_controller extends controller{

 	public function main()
 	{	
 		//$this->setLayout('layout_');
 		
 		// $this->_renderer->setLayout('layout');

 		$this->_renderer->assign('name','oamr');
 		$this->_renderer->assign('age',array('d'));
 	
 		$this->_renderer->render();

 		
 	}

 }


?>