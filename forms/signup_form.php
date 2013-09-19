<?php

	class signup_form  {
			
		public function getform(){

			$options =array('eg' => 'Egypt', 
        'fr' => 'France'   ,
        'us' => 'United States' );

        $form = new form('form-horizontal','signup');
        
        $form->configure(false);
        $form->addElement('dropdown','test' ,array('id'=>'testA') ,$options  );
        $form->addElement('radio','test2' ,array('id'=>'testb') ,null ,'testb' ,'t1','group');
        $form->addElement('radio','test2' ,array('id'=>'testC') ,null ,'tests' , 't2','group');
        $form->addElement('submit','test44' ,array('id'=>'testV','cols'=>'8' ,'rows'=>'4')  ,null ,'testz' );
        $form->setValidatorsforElement('test',array('required' => 'required', 'custom'=>array( 'equals'=>'pass1' ,'text' ,'url' )));

       	return $form ;
		}

	}

 ?>