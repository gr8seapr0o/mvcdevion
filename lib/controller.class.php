<?php
/**
 * Created by PhpStorm.
 * User: SuperUser
 * Date: 26.06.2017
 * Time: 16:11
 */
class Controller {

    protected $data;

    protected $model;

    protected $params;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

     public function __construct($data = array())
     {
         $this->data = $data;
         $this->params = App::getRouter()->getParams();

     }

}