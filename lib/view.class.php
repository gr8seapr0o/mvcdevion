<?php
/**
 * Created by PhpStorm.
 * User: SuperUser
 * Date: 26.06.2017
 * Time: 20:54
 */
class View{
    protected $data;

    protected $path;

    protected static function getDefaultViewPath() {
        $router = App::getRouter();
        if (!$router ) {
            return false;
        }
        $controller_dir = $router->getController();
        $template_name = $router->getMethodPrefix().$router->getAction().'.html';

         return VIEWS_PATH.DS.$controller_dir.DS.$template_name;
    }
    public function __construct($data = array(), $path = null)
    {
        if ( !$path ) {
            //$path = DEFAULT PATH ...
            $path = self::getDefaultViewPath();
        }
        if ( !file_exists($path) ) {
            throw new Exception('Temolate file is not valid: '.$path);
        }
        $this->path = $path;
        $this->data = $data;

    }

    public function render() {
        $data = $this->data;

        ob_start();
        include($this->path);
        $content = ob_get_clean();

        return $content;
    }
}