<?php 
 class index_controller extends controller{

 	public function main()
 	{	
 		//$this->setLayout('layout_');
 		
 		// $this->_renderer->setLayout('layout');


 		 $query = $this->db->createQueryBuilder()
                        ->select("count(a)")
                        ->from("Category", "a")
                        ->getQuery();
        $count= $query->getSingleScalarResult();

 		$this->_renderer->assign('count' ,$count);
 		$this->_renderer->assign('name','oamr');
 		$this->_renderer->assign('age',array('d'));
 	
 		$this->_renderer->render();

 		
 	}

 }


?>