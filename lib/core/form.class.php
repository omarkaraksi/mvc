<?php

	class form {

		private $_name; 
		private $_attrs =array(); 
		private $_elements ;
		private $_view ='inline';
		private $_valid ;
		private $_validSide; 
		private $_configuration ;
		private $_method ='get';
		private $_action ='' ;
		public $_formHtml ;
		public $bootstrap =true;
		public $id ;

		public function __construct($view,$id='Myform')
		{	
			$this->id=$id;
			$name =$this->getName();
			$attr= $this->getAttr();
			$action= $this->getAction();
			$class=$this->getView();
			$method=$this->getMethod();	
			$formstr="<form action='".$action."' class='".$class."'  method='".$method."' id='".$this->id."' >";
			$this->_formHtml['header']= $formstr;	
			$this->_formHtml['footer']= "</form>";
			$this->_configuration['_form_view']= $view ;
			$this->_view = $view ;
			
		}
		public function renderFormHeader()
		{
			print $this->_formHtml['header'];
		}

		
		public  function addElement($type , $name ,$attr ,$options=null ,$validators = null ,$id=null ,$group =null)
		{
			$type  = 	( $type != '' ) ? $type : 'text' ;
			
					$elements=$this->getElements();
					$element['_name'] = ( $elements[$name] !='') ? $id  : $name  ;
					$element['_id']   = $id ;
					$element['_attr'] = $attr ;
					$element['_type'] = $type ;
					$element['_options'] = $options ;
					$element['_validators'] = $validators ;
					$element['_validators_client'] = '' ;
					$element['_group'] = $group;
					
					$element['_label'] = ($attr['label'] == '')  ? ucfirst($name)  : $attr['label'] ; 
					$this->_appendToElementsArray($element,$group);
					
				
				

 
		}
		
		/*array('required' => 'required', 'custom'=>array( 'email'  ))
		array('required' => 'required', 'custom'=>array( 'equals'=>'pass1' ,'rule'=> text' )) ;*/
		public function setValidatorsforElement($element , $validators) {
			$custom = $validators['custom'] ; 
			$required = ($validators['required']!=''  ) ? 'required,' : '' ;
			//$custom = '['.implode(',', $custom).']' ;
			if(isset($custom ) && $custom!=null ) {
				$customStr ='custom[' ;
					foreach ($custom as  $key=>$val) {
					$customStr.=	 (!is_numeric($key))  ? $key.'['.$val.'],' : $val.',' ;
					}
				$customStr =rtrim($customStr, ",");
				$customStr.=']';
				$validatorStr= 'validate['.$required.$customStr.']' ;
				// var_dump($validatorStr);
				$this->_elements[$element]['_validators'] =$validators;
				$this->_elements[$element]['_validators_client'] =$validatorStr;
			}	
		}



		private function _appendToElementsArray($element,$group){
				if($group!=''){
				$this->_elements[$element['_id']] = $element ;
				$this->_elements[$group][] = $element ;
					}else{
				$this->_elements[$element['_name']] = $element ;		
					}

		}	
		
 			
		public  function getElement($name)
		{
				return $this->_elements[$name];

		}


		public function getElements()
		{

				return $this->_elements ;

		}

		public function configure($bootstrap)
			{
			$this->bootstrap = 	($bootstrap) ?  true :false ; 
;				
			}

		public function  setName($name)
		{
				$this->_name =$name;
		} 	
		public function  getName()
		{
			return $this->_name;
		} 

		public function  setView($view)
		{
			$this->view ;
		} 	
				public function  getView()
		{
			return $this->_view;
		} 
		public function  setAttr($attr)
		{
			 $this->_attr =$attr; 
		} 	
		public function  getAttr()
		{
			return $this->_attr;
		} 
		public function  setValid($valid)
		{
			
		} 
		public function setAction($action)
		{
				$this->_action=$action ;
		}
		public function  getAction()
		{
			return $this->_action ;
		}
        public function setMethod($method)
		{
				$this->_method=$method ;
		}
		public function  getMethod()
		{
			return $this->_method ;
		}


		public function addElementGroupPrefix($prefix, $group)
		{
		
				
					$this->_elements[$group]['_prefix'] = $prefix;
		
		
			

		}

		public function addElementGroupSuffix($suffix, $group)
		{
			
					$this->_elements[$group]['_suffix'] = $suffix;
			
		}
		public function addElementPrefix($prefix, $element=false)
		{
			if($element!='' && $element){
				$this->_elements[$element]['_prefix'] = $prefix;
			}else{
				foreach ($this->_elements as $key => $element) {
					$this->_elements[$element]['_prefix'] = $prefix;
				}
			}
			

		}

		public function addElementSuffix($suffix, $element)
		{
				if($element){
				$this->_elements[$element]['_suffix'] = $suffix;
			}else{
				foreach ($this->_elements as $key => $element) {
					$this->_elements[$element]['_suffix'] = $suffix;
				}
			}
			
		}
		
		public function renderGroup($group)
		{		$str='';
				
				$groupPrefix =(isset($this->_elements[$group]['_suffix'])) ? $this->_elements[$group]['_prefix'] :'' ;
				$groupSuffix =(isset($this->_elements[$group]['_prefix'])) ? $this->_elements[$group]['_suffix'] :'' ;
				$str.=$groupPrefix;
				//var_dump($this->_elements[$group]);
					foreach ($this->_elements[$group] as $key => $element) {
					if($element['_group']!= null  && ($element!=$groupPrefix && $element!=$groupSuffix ))
						{
							
					
						$elmHeader=$this->_elements[$element['_name']]['_prefix'];
						$elmFooter=$this->_elements[$element['_name']]['_suffix'];
						$str.=$elmHeader;
						var_dump($elmHeader);
					
			;							$name=$element['_name'] ;
				 						$type=$element['_type'];
				 						$attr=$element['_attr'];
				 						$atr='';
				 						if(is_array($attr)){


				 						foreach ($attr as $key => $value) {
				 							$atr.="  $key={$value}  " ;
				 						}
				 					}

				 					$str.="<input  name=$name   type=$type  $atr $class   />"	;
				 				$str.=$elmFooter;
				 	}
				 }
				 $str.=$groupSuffix;	

				print $str;
				return $str ;	 				
		}	
		public function render(){

				echo $this->_formHtml['footer'];

		}
		public function renderElement($element){
			 //;if($this->_elements[$element]['_type'];)
				
				$str = '';
				$elmHeader='';
					if($this->_elements[$element]['_group']){
							$element = $this->_elements[$element]['_id'];
					}


				$type = $this->_elements[$element]['_type'];
				$id = $this->_elements[$element]['_name'];
				$label = $this->_elements[$element]['_label'];
				$bootstrap =$this->bootstrap;
				// ($bootstrap==true) ? $elmHeader="<div class='control-group'>
				// 							<label class='control-label' for='".$id."'>".$label."</label>
				// 							<div class='controls'>" :'';
				// ($bootstrap==true) ? $elmFooter ="</div></div>": '';
				$vstr=$this->_elements[$element]['_validators_client'];

				$elmHeader=$this->_elements[$element]['_prefix'];
				$elmFooter=$this->_elements[$element]['_suffix'];
				// $groupPrefix =(isset($this->_elements[$element]['_group'])) ? $this->_elements[$element][$this->_elements[$element]['_group']]['_prefix'] :'' ;
				// $groupSuffix =(isset($this->_elements[$element]['_group'])) ? $this->_elements[$element][$this->_elements[$element]['_group']]['_suffix'] :'' ;
				$class = ($vstr!='') ? "class='". $vstr ."'" :'';
				$str = '	';							
				
			switch ($type){
					case 'dropdown':
							$name =	$this->_elements[$element]['_name'] ;
							$name = "name="."$name" ;   	

							$options = $this->_elements[$element]['_options'];
							$opts ='';	
							foreach ($options as $key => $value) {
									$opt.="<option value={$key}> $value</option>";
								}	
									$str.="<select   $name $class >$opt</select>";
									
								break ;	
					case      ("textarea"): 
				    					
										$atr='';
										$name=$this->_elements[$element]['_name'] ;
				 						$type=$this->_elements[$element]['_type'];
				 						$attr=$this->_elements[$element]['_attr'];
				 							
				 						foreach ($attr as $key => $value) {
				 							$atr.="  $key={$value}  " ;
				 						}	
										$str.="<textarea  name=$name   $atr  $class > </textarea>"  ;
										//return $str;	
									  break;
									
				 	case    ('checkbox' || "text" || 'file'):
				 						if($this->_elements[$element]['_group']){

				 						}else{

				 						};
				 						$name=$this->_elements[$element]['_name'] ;
				 						$type=$this->_elements[$element]['_type'];
				 						$attr=$this->_elements[$element]['_attr'];
				 						$atr='';
				 						foreach ($attr as $key => $value) {
				 							$atr.="  $key={$value}  " ;
				 						}
				 					
				 					$str.="<input  name=$name   type=$type  $atr $class />\n"	;break;
				 					//return $str;
				 	case     ("radio"): 
				 						$name=$this->_elements[$element]['_name'] ;
				 						$type=$this->_elements[$element]['_type'];
				 						$attr=$this->_elements[$element]['_attr'];
				 						$atr='';
				 						foreach ($attr as $key => $value) {
				 							$atr.="  $key={$value}  " ;
				 						}

				 					$str.="<input  name=$name   type=$type  $atr $class   />"	;
				 					break;				
				    	
									}
									

									// if(!$next  ){

									// 				$str.=$this->_formHtml['footer'];
													
									// 			};

									
									
					print $str =  $elmHeader.$str.$elmFooter;					
					return $str;				  	
									
				// case :
				// case 'text':
				// case 'textarea':
				// case 'timermepic':
				// case 'datepicker':
				// case 'label':
				// case 'html' :
				// case 'file' : 
				// case 'wysiwyg' :
				// case 'captcha' :
				
		
										
									}
	}
/*
$options =array('eg' => 'Egypt', 
				'fr' => 'France'   ,
				'us' => 'United States'	);

$form = new form('inline');
$form->renderFormHeader();



$form->addElement('dropdown','test' ,array('id'=>'testA') ,$options  );
$form->addElement('radio','test2' ,array('id'=>'testb') ,null ,'testb' ,'t1','group');
$form->addElement('radio','test2' ,array('id'=>'testC') ,null ,'tests' , 't2','group');
$form->addElement('submit','test44' ,array('id'=>'testV','cols'=>'8' ,'rows'=>'4')  ,null ,'testz' );
$form->setValidatorsforElement('test',array('required' => 'required', 'custom'=>array( 'equals'=>'pass1' ,'text' ,'url' )));

$form->addElementPrefix('  ElmPrefixTestB	','test2');
$form->addElementPrefix('  ElmPrefixTestB	','test44');
$form->addElementPrefix('AAElmPrefixAA','test');
$form->addElementGroupSuffix('TestSuffix',"group");
$form->addElementGroupPrefix('TestPrefix',"group");
$form->renderGroup('group');


$form->renderElement('test44');
*/
//var_dump($form->getElements());


//$form->render()


 ?>