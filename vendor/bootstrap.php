<?php
    use Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager,
    Doctrine\ORM\Configuration,
    Doctrine\Common\Cache\ArrayCache as Cache,
    Doctrine\Common\Annotations\AnnotationRegistry,
    Doctrine\Common\Annotations\AnnotationReader,
    Doctrine\Common\ClassLoader;
 

    // define('DB_DRIVER' , 'pdo_mysql' ); 
    // define('HOST' , 'localhost'); 
    // define('DATABASE' , 'albums' ); 
    // define('USER' , 'karaksi'); 
    // define('PASS' , '123456'); 
require_once __DIR__ . '/autoload.php';
$loader = new ClassLoader('Entity', __DIR__ . '/library');
$loader->register();
$loader = new ClassLoader('EntityProxy', __DIR__ . '/library');
$loader->register();
 

//configuration
$config = new Configuration();
$cache = new Cache();
$config->setQueryCacheImpl($cache);
$config->setProxyDir(__DIR__ . '/library/EntityProxy');
$config->setProxyNamespace('EntityProxy');
$config->setAutoGenerateProxyClasses(true);
 


AnnotationRegistry::registerFile(__DIR__ . "/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php");
$reader = new AnnotationReader();
$driverImpl = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($reader, array(__DIR__ . "/models/entities"));
$config->setMetadataDriverImpl($driverImpl);



//mapping (example uses annotations, could be any of XML/YAML or plain PHP)
// AnnotationRegistry::registerFile(__DIR__ . '/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');
// $driver = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(
//     new Doctrine\Common\Annotations\AnnotationReader(),
//     array(__DIR__ . '/library/Entity')
// );
//$config->setMetadataDriverImpl($driver);
$config->setMetadataCacheImpl($cache);
 $connectionOptions = array(
  'driver' =>   DB_DRIVER,
  'host' => HOST,
  'dbname' => DATABASE,
  'user' => USER,
  'password' => PASS);

$em = EntityManager::create(
    $connectionOptions ,
    $config
);
$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);

