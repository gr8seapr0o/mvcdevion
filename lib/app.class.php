<?php
/**
 * Created by PhpStorm.
 * User: SuperUser
 * Date: 26.06.2017
 * Time: 16:06
 */
class App
{

    protected static $router;

    public static $db;

    /**
     * @return mixed
     */
    public static function getRouter()
    {
        return self::$router;
    }

    public static function run($uri)
    {
        self::$router = new Router($uri);

        self::$db = new DB(Config::get('db_host'), Config::get('db_user'), Config::get('db_password'), Config::get('db_name'));

        Lang::load(self::$router->getLanguage());

        $controller_class = ucfirst(self::$router->getController()).'Controller';
        $controller_method = strtolower(self::$router->getMethodPrefix().self::$router->getAction());

        $layout = self::$router->getRoute();
        if ( $layout == 'admin' && Session::get('role') != 'admin' ){
            if ( $controller_method != 'admin_login' ){
                Router::redirect('/admin/users/login');
            }
        }


        //Calling controller`s method
        $controller_object = new $controller_class();
        if ( method_exists($controller_object, $controller_method)) {
            //$result = $controller_object->$controller_method();
            //Controllers`s action may return a view path
            $view_path = $controller_object->$controller_method();
            $view_object = new View($controller_object->getData(), $view_path);
            $content = $view_object->render();
        }else {
            throw new Exception('Method '.$controller_method.' of class '.$controller_class.' does not exist.');
        }
        $layout = self::$router->getRoute();
        $layout_path = VIEWS_PATH.DS.$layout.'.html';
        $layout_view_object = new View(compact('content'), $layout_path);
        echo $layout_view_object->render();
    }
}