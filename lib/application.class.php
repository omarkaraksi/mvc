<?php 
	class application {

		public function __construct(){


			 $path =array( 
			        SERVER_ROOT.'/'.'models', 
			        SERVER_ROOT.'/'.'views',
				    SERVER_ROOT.'/'.'/lib/core'
				 	
			    );
	
						
					set_include_path('.;'.implode(';', $path));

					spl_autoload_extensions(".class.php,.php");
					spl_autoload_register();
	
		}
		

}

?>