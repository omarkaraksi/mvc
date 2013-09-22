<?php


class autoloader {

    public static $loader;
    public $paths ;
    public static $customClasses;
    public static function init()
    {
        if (self::$loader == NULL)
            self::$loader = new self();

        return self::$loader;
    }
    public function __construct()
    {	
    	require_once('autoload_config.php');
    	$this->paths =$AUTOLOAD_CLASS;
    	 
        // spl_autoload_register(array($this,'model'));
        // spl_autoload_register(array($this,'helper'));
        // spl_autoload_register(array($this,'controller'));
        // spl_autoload_register(array($this,'library'));
        spl_autoload_register(array($this,'config'));
       // spl_autoload_register(array($this,'custom'))
    }
    public static function custom_loader($custom_class){
    	self::$customClasses = $custom_class;

        spl_autoload_register(array(self,'custom'));

    }
    public static function custom($class)
    {		

    	//self::init();
		$directories = self::$customClasses;
    	
    	$include_paths= implode(';', $directories);
    	set_include_path(get_include_path().PATH_SEPARATOR.$include_paths);
    	
        spl_autoload_extensions('.php');

       // var_dump(get_include_path());
        spl_autoload($class);


    }
    public  function config($class){
    	$directories = $this->paths;
    	//var_dump($this->paths);
    	$include_paths= implode(';', $directories);
    	set_include_path(PATH_SEPARATOR.$include_paths);
    	
        spl_autoload_extensions('.class.php , .php');
        spl_autoload($class);
    }
    public function library($class)
    {
        set_include_path(get_include_path().PATH_SEPARATOR.'/lib/');
        spl_autoload_extensions('.library.php');
        spl_autoload($class);
    }

    public function controller($class)
    {
        $class = preg_replace('/_controller$/ui','',$class);
        
        set_include_path(get_include_path().PATH_SEPARATOR.'/controller/');
        spl_autoload_extensions('.controller.php');
        spl_autoload($class);
    }

    public function model($class)
    {
        $class = preg_replace('/_model$/ui','',$class);
        
        set_include_path(get_include_path().PATH_SEPARATOR.'/model/');
        spl_autoload_extensions('.model.php');
        spl_autoload($class);
    }

    public function helper($class)
    {
        $class = preg_replace('/_helper$/ui','',$class);

        set_include_path(get_include_path().PATH_SEPARATOR.'/helper/');
        spl_autoload_extensions('.helper.php');
        spl_autoload($class);
    }

}
 autoloader::init() ;
?>