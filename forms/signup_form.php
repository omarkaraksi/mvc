<?php

	class signup_form extends Form {
			
		public function getform(){

			 $form = new Form('inline') ;
        	 $form->configure(array(
            "prevent" => array("bootstrap", "jQuery", "focus"),
            "view" => new View_Inline,
            "labelToPlaceholder" => 1,
            "method"=>'get',
            "action"=> 'index'
            ));
        	 
 			 $form->addElement(new Element_Hidden("form", "form-elements"));
	    	 $form->addElement(new Element_HTML('<legend>Standard</legend>'));
             $form->addElement(new Element_Textbox("Textbox:", "Textbox"));
       		 $form->addElement(new Element_Password("Password:", "Password"));

       	 	$form->addElement(new Element_Button("Submit", "submit"));
       	 	
       	 	
       	 	return $form ;
		}

	}

 ?>