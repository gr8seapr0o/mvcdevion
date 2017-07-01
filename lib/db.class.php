<?php
/**
 * Created by PhpStorm.
 * User: SuperUser
 * Date: 30.06.2017
 * Time: 12:02
 */
class DB{
    protected $connection;

    public function __construct($host, $password, $user, $db_name)
    {
        $this->connection = new mysqli($host, $password, $user, $db_name);

        if( mysqli_connect_error() ) {
            throw  new Exception('Could not connect to DB');
        }
    }
    public  function query($sql) {
        if (!$this->connection ){
            return false;
        }
        $result = $this->connection->query($sql);

        if (mysqli_error($this->connection) ){
            throw  new Exception(mysqli_error($this->connection));
        }
        if ( is_bool($result) ){
            return $result;
        }
        $data = array();
        while ( $row = mysqli_fetch_assoc($result) ){
            $data[] = $row;
        }
        return $data;
    }
    public function escape($str){
        return mysqli_escape_string($this->connection, $str);
    }
}