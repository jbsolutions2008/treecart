<?php


// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

// Ensure library/ is on include_path
// TODO:  either move doctrine libs to project libs or add the doctrine path to the configs
set_include_path(implode(PATH_SEPARATOR, array(
    'C:\wamp\www\doctrine-1.1.4\lib',
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));


require_once 'Zend/Loader/Autoloader.php';
require_once 'Zend/Application.php';

$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH.'/config/store.ini'
);
$application->bootstrap();
$application->run();