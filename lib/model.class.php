<?php
/**
 * Created by PhpStorm.
 * User: SuperUser
 * Date: 30.06.2017
 * Time: 13:14
 */
class Model{
    protected $db;

    public function __construct()
    {
        $this->db = App::$db;
    }
}