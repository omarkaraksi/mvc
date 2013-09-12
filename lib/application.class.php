<?php 

	
	class application {

		public function __construct(){
		require('autoload_config.php');
			// var_dump($AUTOLOAD_CLASS);
						
					$path = __DIR__.'/lib/';

					$paths = set_include_path('.;'.implode(';', $AUTOLOAD_CLASS));

					spl_autoload_extensions(".class.php,.php");
					
					//$this->autoload_all($paths,$AUTOLOAD_CLASS_RECURSIVE);
					spl_autoload_register();
					
		}
		
}

?>