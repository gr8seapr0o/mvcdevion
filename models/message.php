<?php
/**
 * Created by PhpStorm.
 * User: SuperUser
 * Date: 30.06.2017
 * Time: 14:13
 */
class  Message extends Model{

    public function save($data, $id = null) {
        if ( !isset($data['name']) || !isset($data['email']) || !isset($data['message']) ) {
            return false;
        }
        $id = (int)$id;
        $name = $this->db->escape($data['name']);
        $email = $this->db->escape($data['email']);
        $message = $this->db->escape($data['message']);

        if ( !$id ) { //Add new record
            $sql = "
                  insert into messages 
                       set name = '{$name}',
                             email = '{$email}',
                            messages = '{$message}'
            ";

        } else { //Update existing record
            $sql = "
                  update messages 
                       set name = '{$name}',
                             email = '{$email}',
                            messages = '{$message}'
                            where id = '{$id}'
            ";
        }
        return $this->db->query($sql);
    }
    public function getList(){
        $sql = "select * from messages where  id = 1";
        return $this->db->query($sql);
    }
}