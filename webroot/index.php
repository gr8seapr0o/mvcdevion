<?php
/**
 * Created by PhpStorm.
 * User: SuperUser
 * Date: 22.06.2017
 * Time: 20:09
 */
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DS.'views');
require_once (ROOT.DS.'lib'.DS.'init.php');

/*$router = new Router($_SERVER['REQUEST_URI']);

echo "<pre>";
print_r('Route: '.$router->getRoute().PHP_EOL);
print_r('Language: '.$router->getLanguage().PHP_EOL);
print_r('Controller '.$router->getController().PHP_EOL);
print_r('Action to be called: '.$router->getMethodPrefix().$router->getAction().PHP_EOL);
echo "Params: ";

print_r($router->getParams( ));*/

//Session::setFlash('Test flash message');


session_start();
App::run($_SERVER['REQUEST_URI']);
//$test = App::$db->query('select * from pages');
//echo "<pre>";
//print_r($test);