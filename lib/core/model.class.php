<?php 
	
	class model{
		
		public  function __construct()
		{	
			 //spl_autoload_register(null ,false);
			 //spl_autoload_register( array( $this, 'loadModels'));
			// spl_autoload_register(null ,false);
		


		}
		public  function loadModels($className)
		{	

		    //parse out filename where class should be located
		    //list($filename , $suffix) = explode('.' , $className);
            //var_dump(dd);
		    //compose file name
		    $file = SERVER_ROOT . '/models/' . strtolower($className) . '.php';
		    var_dump($file);
		    //fetch file
		    if (file_exists($file))
		    {
		        //get file
		        include_once($file); 
		        spl_autoload($className)   ;  
		    }
		    else
		    {
		        //file does not exist!
		        die("Filesss '$filename' containing class '$className' not found.");    
		    }
		}

	}


?>