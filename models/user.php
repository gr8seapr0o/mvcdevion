<?php
/**
 * Created by PhpStorm.
 * User: SuperUser
 * Date: 01.07.2017
 * Time: 11:19
 */
class User extends Model {

    public function getByLogin($login){
        $login = $this->db->escape($login);
        $sql = "select * from users where login = '{$login}' limit 1";
        $result = $this->db->query($sql);
        if ( isset($result[0]) ){
            return $result[0];
        }
        return false;
    }
}