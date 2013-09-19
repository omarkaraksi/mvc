<?php 
 class index_controller extends controller{

 	public function main()
 	{	

 		
         $myform = new signup_form();
        // $form = new Form();
         $form =$myform->getForm();

         
         $contact = new Album();
 		 $query = $this->db->createQueryBuilder()
                        ->select("count(a)")
                        ->from("Category", "a")
                        ->getQuery();
        $count= $query->getSingleScalarResult();

 		$this->_renderer->assign('form',$form);


 	   
 		$this->_renderer->render();

 		
 	}

 	public function addAlbum($data)
 	{

		       
        $contact->setName($data["name"]);
        $contact->setEmail($data["email"]);
        $contact->setSubject($data["subject"]);
        $contact->setMessage($data["message"]);
         
        try {
            //save to database
            $this->em->persist($contact);
            $this->em->flush();
            return TRUE;
        }
        catch(Exception $err){
            return FALSE;
        }
        return true;        

 	}



 }


?>