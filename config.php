<?php 
	

    
    define('SITE_ROOT','http://localhost');
    define('SERVER_ROOT',$_SERVER['DOCUMENT_ROOT'].'/'.'mvc');
    
    define('WEB_FOLDER','mvc');
    define('PUBLIC_F','/'.WEB_FOLDER.'/public/assets/' );
    define('LAYOUT','layout');


    //DB Configurtion 

    define('DB_DRIVER' , 'pdo_mysql' ); 
    define('HOST' , 'localhost'); 
    define('DATABASE' , 'albums' ); 
    define('USER' , 'karaksi'); 
    define('PASS' , '123456'); 
?>