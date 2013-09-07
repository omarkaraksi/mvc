<?php
 use Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager,
    Doctrine\ORM\Configuration,
    Doctrine\Common\Cache\ArrayCache as Cache,
    Doctrine\Common\Annotations\AnnotationRegistry,
    Doctrine\Common\Annotations\AnnotationReader,
    Doctrine\Common\ClassLoader;
 
/**
 * CodeIgniter Smarty Class
 *
 * initializes basic doctrine settings and act as doctrine object
 *
 * @final   Doctrine
 * @category    Libraries
 * @author  Md. Ali Ahsan Rana
 * @link    http://codesamplez.com/
 */	  

class db {
 
  /**
   * @var EntityManager $em
   */
    public $em = null;
 
  /**
   * constructor
   */
		  public function __construct()
		  {
	

		    // define('DB_DRIVER' , 'pdo_mysql' ); 
		    // define('HOST' , 'localhost'); 
		    // define('DATABASE' , 'albums' ); 
		    // define('USER' , 'karaksi'); 
		    // define('PASS' , '123456'); 
		require_once SERVER_ROOT . '/vendor/autoload.php';
		$loader = new ClassLoader('Entity', SERVER_ROOT . '/vendor/library');
		$loader->register();
		$loader = new ClassLoader('EntityProxy', SERVER_ROOT . '/vendor/library');
		$loader->register();
		 

		//configuration
		$config = new Configuration();
		$cache = new Cache();
		$config->setQueryCacheImpl($cache);
		$config->setProxyDir(SERVER_ROOT . '/vendor/library/EntityProxy');
		$config->setProxyNamespace('EntityProxy');
		$config->setAutoGenerateProxyClasses(true);
		 


		AnnotationRegistry::registerFile(SERVER_ROOT . "/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php");
		$reader = new AnnotationReader();
		$driverImpl = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($reader, array(SERVER_ROOT . "/models/entities"));
		$config->setMetadataDriverImpl($driverImpl);



		//mapping (example uses annotations, could be any of XML/YAML or plain PHP)
		// AnnotationRegistry::registerFile(SERVER_ROOT . '/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');
		// $driver = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(
		//     new Doctrine\Common\Annotations\AnnotationReader(),
		//     array(SERVER_ROOT . '/library/Entity')
		// );
		//$config->setMetadataDriverImpl($driver);
		$config->setMetadataCacheImpl($cache);
		 $connectionOptions = array(
		  'driver' =>   DB_DRIVER,
		  'host' => HOST,
		  'dbname' => DATABASE,
		  'user' => USER,
		  'password' => PASS);

		// $em = EntityManager::create(
		//     $connectionOptions ,
		//     $config
		// );
		$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);

		$this->em =$em;
		     
		  }
}